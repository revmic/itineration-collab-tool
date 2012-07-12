<?php 

$page_title = 'Collaborators';
include('templates/header.php');
include('templates/nav.php');

echo "<h1>Collaborators</h1>";

$userlist = '../private/unencrypted.txt';
$users = file($userlist);

echo "<table>";
for($i = 0; $i < count($users); $i++) {
	$tmp = explode(', ', $users[$i]);
	echo "<tr><td><a href='profile.php?user=$tmp[1]'>$tmp[1]</a></td><td>aboutme or something</td></tr>";
}
echo "<table><br>";

include('templates/footer.php');

?>