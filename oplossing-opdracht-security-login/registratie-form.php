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

	if (isset($_SESSION['registratie'])) {
		
		$email = $_SESSION['registratie']['email'];
		$password = $_SESSION['registratie']['password'];
	}

	if (isset($_SESSION['notification']['registratie'])) {
		$msg['message'] = $_SESSION['notification']['registratie']['message'];
		$msg['type'] = $_SESSION['notification']['registratie']['type'];
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

		<h1>Registreren</h1>

		<?php if ($msg['message']): ?>
			<div class="<?= $msg['type'] ?>">
				<?php echo $msg['message'] ?>
			</div>
		<?php endif ?>

		<form action="registratie-process.php" method="POST">
			<ul>
				<li>
					<label for="email">e-mail: </label>
					<input type="text" name="email" id="email" value="<?= $email ?>">
				</li>
				<li>
					<label for="paswoord">paswoord</label>
					<input type="<?= ($password == '')? 'password' : 'text' ?>" name="password" id="password" value="<?= $password ?>">
					<button type="submit" name="genereerPaswoord">Genereer een paswoord</button>
				</li>
				<li>
					<button type="submit" name="registreer">Registreer</button>
				</li>
			</ul>
		</form>

		<pre>

			<?= var_dump($_SESSION) ?>

		</pre>

	</body>
</html>