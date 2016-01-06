<!DOCTYPE html>

<?php
	session_start();

	if (isset($_COOKIE['cookie'])) {
		header('location: dashboard.php');
	}

	$msg['message'] = "";
	$msg['type'] = "";
	$email = "";
	$password = "";

	if (isset($_SESSION['login'])) {
		
		$email = $_SESSION['login']['email'];
		$password = $_SESSION['login']['password'];
	}

	if (isset($_SESSION['notification']['login'])) {
		$msg['message'] = $_SESSION['notification']['login']['message'];
		$msg['type'] = $_SESSION['notification']['login']['type'];
	}


?>


<html>
	<head>

		<style>

			.error {
				background-color: #ff3232;
				width: 400px;
				border-radius: 5px;
				padding: 20px;
				text-align: center;
			}

		</style>

	</head>




	<body>

		<h1>Inloggen</h1>

		<?php if ($msg['message']): ?>
			<div class="<?= $msg['type'] ?>">
				<?php echo $msg['message'] ?>
			</div>
		<?php endif ?>


		<form action="login-process.php" method="POST">

			<ul>

				<li>

					<label for="email">e-mail: </label>
					<input type="text" name="email" id="email" value="<?= $email ?>">

				</li>
				<li>

					<label for="password">paswoord: </label>
					<input type="password" name="password" id="password" value="<?= $password ?>">

				</li>

				<li>

					<button type="submit" name="inloggen">Inloggen</button>

				</li>

			</ul>

			<p>Nog geen account? Maak er dan eentje aan op de <a href="registratie-form.php">registratiepagina</a></p>

		</form>

		<pre>

			<?= var_dump($_SESSION) ?>

		</pre>
	</body>
</html>