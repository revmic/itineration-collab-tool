<?php

// adapted from login.php of Basic Membership Site @ developphp.com
// and PHP Solutions Book by David Powers

// execute when Login is selected
if (isset($_POST['login'])) {

	$username = trim($_POST['username']);
	/***	plain text passwords    ***/
	$password = trim($_POST['pwd']);
	$userlist = '/Users/mhilema/Sites/collab-tool/private/unencrypted.txt';
	$found = false;


	if(!file_exists($userlist) || !is_readable($userlist))
		$error = 'Login facility unavailable. Please try later.';
	else {
	// read file into array called users
		$users = file($userlist);

		for($i = 0; $i < count($users); $i++) {
			// separate each element and store in a temporary array
			$tmp = explode(', ', $users[$i]);

			// check for a matching record
			if($tmp[1] == $username && rtrim($tmp[2]) == $password) {
				$found = true;
				$_SESSION['uid'] = $tmp[0];
				$_SESSION['username'] = $username;
				$_SESSION['start'] = time();
				session_regenerate_id();
				// redirect to users home page
				header("location: profile.php?user=$username");
				break;
			}
		}
		if(!$found)
			$error = 'Username or password incorrect';
	}
}

/* From PHP solutions
if (isset($_POST['login'])) {
	session_start();
	$username = trim($_POST['username']);
	
/***	hashed password ***
	$password = sha1($username . $_POST['pwd']);
	$userlist = '/Users/mhilema/Sites/collab-tool/private/encrypted.txt';

	require_once('includes/authenticate.inc.php');
*/
//	$redirect = 'http://localhost/~mhilema/collab-tool/projects.php';


/*
if(isset($_SESSION['authenticated'])) {
	header("Location: $redirect");
	exit;
} else {
	$error= 'Invalid username or password.';
}

	if ($error) 
		echo "<p>$error</p>";
	elseif (isset($_GET['expired']))
		echo "<p>Your session has expired. Please log in again.</p>";
*/
?>