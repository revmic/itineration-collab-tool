<?php 

$page_title = 'Profile';
include('templates/header.php');
include('templates/menu.php');

if (isset($_SESSION['username'])) {
	$active_user = $_SESSION['username'];
	$user = $_GET['user'];
	echo "<h1>$user's Profile.</h1>";
}
else
	header('location: index.php');

echo "<img src='images/blank.gif' width='300' height='250' alt='No Photo' />";

include('templates/footer.php');
?>