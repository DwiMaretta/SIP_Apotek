<?php
	$user = $_POST['user'];
	$pwd = $_POST['pwd'];

	setcookie('cookie_user', $user);
	setcookie('cookie_pass', $pwd);

	header("Location: hal.php");
?>