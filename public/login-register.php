<?php
$error = '';
if (isset($_POST['login'])) {
	session_start();
	$username = trim($_POST['username']);
	$password = sha1($username . $_POST['pwd']);
	$userlist = "/Users/mhilema/Sites/collab-tool/profile.php?uid=$username";
	$redirect = 'http://localhost/~mhilema/tutorials/phpsols/sessions/menu.php';
	require_once('../includes/authenticate.inc.php');
}
?>

	<?php 
	if ($error) 
		echo "<p>$error</p>";
	elseif (isset($_GET['expired']))
		echo "<p>Your session has expired. Please log in again.</p>";
	?>
