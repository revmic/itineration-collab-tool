<?php 

$page_title = 'Projects';
include('templates/header.php');
include('templates/nav_top.php');
?>

<h1>Projects</h1>
<form id="search_form" method="post" action="" alignment="center">
	<input type="text" name="search" id="search_text"></input>
	<input type="submit" name="search" id="search" value="Search Projects">
	<a href="">Advanced Search</a>
</form>
<br>
<ul>
	<li><a href="#">Itineration Collab Tool<a/></li>
	<li>Project One</li>
	<li>Project Two</li>
</ul>

<?php
include('templates/footer.php');
?>