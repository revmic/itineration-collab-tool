<?php
	require_once('../classes/Ps2/CheckPassword.php');

	$usernameMinChars = 6;
	$errors = array();

	if ((strlen($username)) < $usernameMinChars)
		$errors[] = "Username must be at least $usernameMinChars characters.";

	if (preg_match('/\s/', $username))
		$errors[] = "Username should not contain spaces.";

	$checkPwd = new Ps2_CheckPassword($password);
//	$checkPwd->requireMixedCase();
	$checkPwd->requireNumbers(1);
//	$checkPwd->requireSymbols();

	$passwordOK = $checkPwd->check();

	if(!$passwordOK)
		$errors = array_merge($errors, $checkPwd->getErrors());
	if ($password != $retyped)
		$errors[] = "Your passwords do not match.";
	if (!$errors) {
		// encrypt password using username as salt
		$password = sha1($username.$password);

		// open the file in append mode
		$file = fopen($userfile, 'a+');

		// if filesize is 0, no users exist yet,
		// so just write the username and password to file
		if (filesize($userfile) === 0) {
			fwrite($file, "$username, $password");
			$result = "$username registered successfully.";
		} else {
			// if filesize is greater than zero, check username first
			// move internal pointer to beginning of file
			rewind($file);

			while(!feof($file)) {
				$line = fgets($file);
				$tmp = explode(', ', $line);

				if ($tmp[0] == $username) {
					$result = "$username not available. Please choose a different username.";
					break;
				}
			}
			// if $result not set, username is available
			if (!isset($result)) {
				// insert line break followed by username, comma, and password
				fwrite($file, PHP_EOL . "$username, $password");
				$result = "$username registered successfully.";
			}
			fclose($file);
		}
	}
?>