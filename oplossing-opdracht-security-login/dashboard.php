<!DOCTYPE html>

<?php
	session_start();

	$cookieValidate = false;
	$data = array();

	if (isset($_COOKIE['cookie'])) {
		$dataOfUser = explode(',', $_COOKIE['cookie']);

		$emailUser = $dataOfUser[0];
		$hashUser = $dataOfUser[1];

		$db = new PDO('mysql:host=localhost;dbname=opdracht-security-login', 'root', '');

		$queryString = 'SELECT * FROM users
						WHERE email = :email';

		$statement = $db->prepare($queryString);

		$statement->bindValue(':email', $emailUser);

		$statement->execute();

		while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $row;
		}

		if (isset($data[0])) {

			$salt = $data[0]['salt'];

			$hashed_email = hash('sha512', $salt . $emailUser);

			if ($hashed_email == $hashUser) {
				$cookieValidate = true;
			}			
		}
	}

	if (!$cookieValidate) {
		unset($_SESSION['registratie']);

		setcookie('cookie', '', 0);

		header('location: login-form.php');
	}



?>


<html>
	<head>



	</head>




	<body>

		<h1>Dashboard</h1>


		<a href="logout.php">uitloggen</a>

	</body>
</html>