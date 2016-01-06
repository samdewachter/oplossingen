<!DOCTYPE html>

<?php
	session_start();

	$data = array();
	$emailUser = '';

	if (isset($_COOKIE['cookie'])) {
		$dataOfUser = explode(',', $_COOKIE['cookie']);

		$emailUser = $dataOfUser[0];
		$hashUser = $dataOfUser[1];

		$db = new PDO('mysql:host=localhost;dbname=opdracht-file-upload', 'root', '');

		$queryString = 'SELECT * FROM users
						WHERE email = :email';

		$statement = $db->prepare($queryString);

		$statement->bindValue(':email', $emailUser);

		$statement->execute();

		while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $row;
		}

		$emailUser = $data[0]['email'];
	}


?>

<html>
	<head>



	</head>




	<body>


		<p> <a href="dashboard.php">Terug naar dashboard</a> | ingelogd als <?= $_SESSION['login']['email'] ?> | <a href="logout.php">uitloggen</a> </p>

		<h1>Gegevens wijzigen</h1>

		<p>Profielfoto</p>

		<img src="<?= ($data[0]['profile_picture'] != '')? '' : 'img/placeholder.gif' ?>" alt="<?= $_SESSION['login']['email'] ?>">

		<form action="gegevens-bewerken.php" methode="POST" enctype="multipart/form-data">

			<ul>

				<li>
					<input type="file" name="profielfoto"><br />
					<button type="submit" name="upload">Upload</button>

				</li>

				<li>

					<label for="email">e-mail</label><br />
					<input type="text" name="email" id="email" value="<?= $emailUser ?>">

				</li>

				<li>

					<button type="submit" name="wijzigen">Gegevens wijzigen</button>

				</li>

			</ul>

		</form>

		<pre>

			<?= var_dump($data)  ?>

		</pre>

	</body>
</html>