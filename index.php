<?php
	
	/*
	 * This code serves to demonstrate a program running in a Docker container.
	 * Do not use it on the public internet.
	 */

	ini_set('display_errors', 'On');

	if (count($_POST)) {

		if (filesize('data/messages.html') > 1000000) {
			die('Data file reached its maximum size (1MB).');
		}

		$txt = '<p>' . date('c') . ' <strong>' . strip_tags($_POST['email']) . '</strong><br>' . strip_tags($_POST['message']) . '</p>';
		file_put_contents('data/messages.html', $txt . "\n",  FILE_APPEND);

		header('Location: /');
		exit();
	}
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>My little guestbook.</title>
</head>
<body>
	<h1>A very naive guestbook implementation.</h1>
	<?php
	    readfile('data/messages.html');
	?>
	<form method="post">
		<input name="email" type="text" placeholder="Your e-mail address"><br>
		<textarea name="message" placeholder="Your message"></textarea><br>
		<button>Submit</button>
	</form>
</body>
</html>
