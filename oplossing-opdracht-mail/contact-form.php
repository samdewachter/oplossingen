<!DOCTYPE html>

<?php

	session_start();
	$message = "";
	$kopie = "";

	if (isset($_SESSION['contact'])) {
		$email = $_SESSION['contact']['email'];
		$boodschap = $_SESSION['contact']['boodschap'];
		$kopie = $_SESSION['contact']['kopie'];
	}

	if (isset($_SESSION['message'])) {
		$message = $_SESSION['message'];
	}


?>


<html>
	<head>


	</head>



	<body>
		<h1>Contacteer ons</h1>

		<p><?= $message ?></p> 

		<form action="contact.php" method="POST">

			<ul>

				<li>

					<label for="email">E-mailadres</label><br />
					<input type="text" name="email" id="email" value="<?= (isset($email))? $email : '' ?>">

				</li>

				<li>

					<label for="boodschap">Boodschap</label><br />
					<textarea name="boodschap" id="boodschap" value="<?= (isset($boodschap))? $boodschap : '' ?>"></textarea>

				</li>

				<li>

					<input type="checkbox" name="kopie" id="kopie" <?= $kopie ?>><label for="kopie">Stuur een kopie naar mezelf</label>

				</li>

				<li>

					<input type="submit" name="submit">

				</li>

			</ul>

		</form>

		<pre>

			<?= var_dump($_SESSION) ?>

		</pre>



	</body>
</html>