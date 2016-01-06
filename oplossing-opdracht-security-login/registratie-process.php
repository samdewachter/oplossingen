<?php
	session_start();

	$data = array();

	function generatePassword($hoofdletters = false, $kleineLetters = false, $cijfers = false, $specialeTekens = false, $length = 8){
		$charactars = "";
		$password = "";

		if ($hoofdletters == true) {
			$charactars = $charactars . "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		}

		if ($kleineLetters == true) {
			$charactars = $charactars . "abcdefghiklmnopqrstuvwxyz";
		}

		if ($cijfers == true) {
			$charactars = $charactars . "0123456789";
		}

		if ($specialeTekens == true) {
			$charactars = $charactars . "&*-+/";
		}

		if ($hoofdletters == false && $kleineLetters == false && $cijfers == false && $specialeTekens == false) {
			$charactars = "abcdefghiklmnopqrstuvwxyz";
		}

		$count = strlen($charactars);

		for ($i=0; $i < $length; $i++) { 
			$index = rand(0, $count - 1);
			$password .= substr($charactars, $index, 1);
		}

		return $password;

	}

	if (isset($_POST['genereerPaswoord'])) {
		$gegenereerd = generatePassword(false, true, true, true, 10);

		$_SESSION['registratie']['email'] = $_POST['email'];
		$_SESSION['registratie']['password'] = $gegenereerd;

		header('location: registratie-form.php');
	}

	if (isset($_POST['registreer'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];

		$_SESSION['registratie']['email'] = $email;
		$_SESSION['registratie']['password'] = $password;

		
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$_SESSION['notification']['registratie']['type'] = "error";
			$_SESSION['notification']['registratie']['message'] = "Het email adres dat u hebt opgegeven is niet correct.";

			header('location: registratie-form.php');
		}

		if ($password == "") {
			$_SESSION['notification']['registratie']['type'] = "error";
			$_SESSION['notification']['registratie']['message'] = "Het paswoord dat u hebt opgegeven is niet correct.";
		}

		if (filter_var($email, FILTER_VALIDATE_EMAIL) && $password != "") {

			$db = new PDO('mysql:host=localhost;dbname=opdracht-security-login', 'root', '');

			$emailexists = 'SELECT * FROM users
							WHERE email = :email';

			$statement1 = $db->prepare($emailexists);

			$statement1->bindValue(':email', $email);

			$statement1->execute();

			while ($row = $statement1->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}

			if (isset($data[0])) {
				$_SESSION['notification']['registratie']['type'] = "error";
				$_SESSION['notification']['registratie']['message'] = "Het email adres dat u hebt opgegeven is reeds in gebruik.";

				header('location: registratie-form.php');
			}
			else {

				$salt = uniqid(mt_rand(), true);

				$hashed_password	=	hash( 'sha512', $salt . $password );

				$_SESSION['registratie']['salt'] = $salt;
				$_SESSION['registratie']['hashed_password'] = $hashed_password;

				$queryString = 'INSERT INTO users (email, hashed_password, last_login_time, salt)
								VALUES (:email, :hashed_password, NOW(), :salt )';

				$statement2 = $db->prepare($queryString);

				$statement2->bindValue(':email', $email);
				$statement2->bindValue(':hashed_password', $hashed_password);
				$statement2->bindValue(':salt', $salt);


				$statement2->execute();

				$hashed_email = hash('sha512', $salt . $email);
				$valueOfCookie = $email . "," . $hashed_email;

				setcookie('cookie', $valueOfCookie, time() + (60*60*24*30));

				header('location: dashboard.php');

			}
				
		}		
	}


?>