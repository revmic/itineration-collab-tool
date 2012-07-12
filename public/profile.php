<?php 

$page_title = 'Profile';
include('templates/header.php');
include('templates/nav.php');

if (isset($_SESSION['username'])) {
	$active_user = $_SESSION['username'];
	$user = $_GET['user'];
	echo "<div id='content'><h1>$user's Profile.</h1></div>";
}
else {
	header('location: index.php');
	exit;
}
?>
<div id="content">
	<div id="info" style='float:left'>
		<ul>
			<h2>Michael Hileman</h2>
			<p>Contact Info -</p>
			<li>mhilema@gmail.com</li>
			<li>618-946-1234</li>
		</ul>
		<ul>
			<p>Professional Affiliations -</p>
			<li>Southern Illinois University</li>
		</ul>
		<p>Biography -</p>
		<p>And so on...</p>
	</div>
	<div id="profile" style='float:right'>
		<img src='images/blank.gif' width='200' height='163' alt='No Photo' style='float:right' />
	</div>
</div>

<?php include('templates/footer.php'); ?>
