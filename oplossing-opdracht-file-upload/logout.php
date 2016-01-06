<?php

	session_unset();

	setcookie('cookie', '', 0);

	header('location: login-form.php');

?>