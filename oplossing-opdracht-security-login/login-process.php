<?php

	session_start();

	if (isset($_POST['inloggen'])) {
		$data = array();

		$db = new PDO('mysql:host=localhost;dbname=opdracht-security-login', 'root', '');

		$email = $_POST['email'];
		$password = $_POST['password'];

		$_SESSION['login']['email'] = $email;
		$_SESSION['login']['password'] = $password;

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$_SESSION['notification']['login']['type'] = "error";
			$_SESSION['notification']['login']['message'] = "Het email adres dat u hebt opgegeven is niet correct.";

			header('location: login-form.php');
		}

		if ($password == "") {
			$_SESSION['notification']['login']['type'] = "error";
			$_SESSION['notification']['login']['message'] = "Het paswoord dat u hebt opgegeven is niet correct.";

			header('location: login-form.php');
		}


		$queryString = 'SELECT * FROM users
						WHERE email = :email';

		$statement = $db->prepare($queryString);

		$statement->bindValue(':email', $email);

		$statement->execute();

		while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $row;
		}

		$userSalt = $data[0]['salt'];

		$paswoordHash = hash('sha512', $userSalt . $password);

		if ($paswoordHash == $data[0]['hashed_password']) {

			$hashed_email = hash('sha512', $userSalt . $email);
			$valueOfCookie = $email . "," . $hashed_email;

			setcookie('cookie', $valueOfCookie, time() + (60*60*24*30));

			header('location: dashboard.php');
		}
	}

	



?>