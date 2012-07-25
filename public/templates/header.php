<?php
session_start();
$error = '';
$top_right_form = '';

// adapted from index.php of Basic Membership Site
if (isset($_SESSION['uid'])) {
	// store session variables locally
	$userid = $_SESSION['uid'];
	$username = $_SESSION['username'];

// If there is an open session
// Display the username and Log Out Form
	$top_right_form = <<<FORM
<form id="authenticate" method="post" action="">
	<label>Welcome, $username!</label>
	<a href="profile.php?user=$username">Profile</a>
	<input type="submit" name="logout" id="logout" class="auth" value="Log Out">
</form>
FORM;
}
else {
// Otherwise, Display the login form
	$top_right_form = <<<FORM
<form id="login" method="post" action="">
	<label>Email: <input type="text" name="username" id="username"></label>
	<label>Password: <input type="password" name="pwd" id="pwd"></label>
	<input type="submit" name="login" id="login" class="auth" value="Log in">
	<a href="register.php">Sign Up</a>
</form>
FORM;
}
require_once("includes/authenticate.inc.php");
require_once("includes/logout.inc.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $page_title;?></title>	
	<link rel="shortcut icon" href="images/favicon.ico" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
</head>

<body>

<div id="head_container">
	<div id="header">
		<h1>Itinerate</h1>
<!--	causing funky reposition of 'Itinerate'
		<a href="index.php"><h1>Itinerate</h1></a>
			<h2>Collaboration Platform</h2> -->
		<?php 
		// prints form in top right of header and auth error if any.
		echo $top_right_form;
		if($error)
			echo "<form class='auth'><h3>".$error."</h3></form>"; 
		?>
	</div>
</div>