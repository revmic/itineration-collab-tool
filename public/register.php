<?php
$page_title = 'Register';
include('templates/header.php');
include('templates/nav_top.php');

//require_once('../includes/register_user_text.inc.php');

?>

<div id="content">
	<h1>Create an Account</h1>
	<?php
	if (isset($result) || isset($errors)) {
		echo '<ul>';
		if (!empty($errors)) {
			foreach ($errors as $item)
				echo "<li>$item</li>";
		} 
		else
			echo "<li>$result</li>";
		echo '</ul>';
	}
	?>
	<br>
	<div id='register'>
		<form id="register" name="register" method="post" action="">
			
		<fieldset>
			<label for='first' style='float:left'>Name</label><br>
			<input type='text' value='first' style="width:152px;float:left">
			<input type='text' value='last' style="width:152px;float:right">

			<label>Email </label><label class='small'>(This will be your username)</label>
			<input type='text' name='email' id='email' maxlength="50" />

			<label >Password</label>
			<input type='password' name='password' id='password' maxlength="50" />
			<label>Confirm Password</label>
			<input type='password' name='conf_pass' id='conf_pass' maxlength="50" />

			<input name="register" type="submit" id="register" value="Register">
		</fieldset>
		
		</form>
	</div>
	<!-- closing div misaligns footer, I think -->

<?php include('templates/footer.php'); ?>