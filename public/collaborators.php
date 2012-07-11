<?php 

$page_title = 'Collaborators';
include('templates/header.php');
include('templates/menu.php');

echo "<h1>Collaborators</h1>";

$userlist = '/Users/mhilema/Sites/collab-tool/private/unencrypted.txt';
$users = file($userlist);

echo "<table>";
for($i = 0; $i < count($users); $i++) {
	$tmp = explode(', ', $users[$i]);
	echo "<tr><td><a href='profile?user=$tmp[1]'>$tmp[1]</a></td><td>aboutme or something</td></tr>";
}
echo "<table>";

include('templates/footer.php');

?>