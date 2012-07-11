<?php
session_start();
ob_start();

$timelimit = 15;
$now = time();
$redirect = 'http://localhost/~mhilema/tutorials/phpsols/sessions/login.php';

// if session variable not set, or has wrong value,
// then redirect to login page
if(!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] != 'Jethro Tull') {
	header("Location: $redirect");
	exit;
}
elseif ($now > $_SESSION['start'] + $timelimit) {
// if time limit has expired, destroy session and redirect
	$_SESSION = array();
	if(isset($_COOKIE[session_name()]))
		setcookie(session_name(), '', time()-86400, '/');
	// end session and redirect with query string
	session_destroy();
	header("Location: {$redirect}?expired=yes");
	exit;
}
else // all is OK, update start time
	$_SESSION['start'] = time();
?>