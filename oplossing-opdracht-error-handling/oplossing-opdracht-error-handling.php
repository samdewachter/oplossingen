<!DOCTYPE html>

<?php

	session_start();
	$isValid = false;

	try
	{
		if (isset($_POST['submit'])) {
			if (isset($_POST['code'])) {
				if (strlen($_POST['code']) == 8) {
					$isValid = true;
				}
				else {
					throw new Exception("VALIDITION-CODE-LENGTH");
				}
			}
			else {
				throw new Exception("SUBMIT-ERROR");
			}
		}
	}
	catch (Exception $e)
	{
		$messageCode = $e->getMessage();;

		$message = array("type", "text");

		$createMessage = false;

		switch ($messageCode) {
			case 'SUBMIT-ERROR':
				$message['type'] = "error";
				$message['text'] = "Er werd met het formulier geknoeid";
				break;

			case 'VALIDITION-CODE-LENGTH':
				$message['type'] = "error";
				$message['text'] = "De kortingscode heeft niet de juiste lengte";
				$createMessage = true;
				break;
			
			default:
				break;
		}

		if ($createMessage == true) {
			createMessage($message);
		}

		logToFile($message);
	}

	$message = showMessage();
	
	function logToFile($message)
	{
		$uurDatum = date("[H:i:s d/m/Y]");
		$ip = $_SERVER['REMOTE_ADDR'];
		$typeFout = $message['type'];
		$boodschapFout = $message['text'];

		$volledigeBoodschap = $uurDatum . " - " . $ip . " - type:[" . $typeFout . "] " . $boodschapFout . "\n\r"; 

		file_put_contents("error.log", $volledigeBoodschap, FILE_APPEND );
	}

	function createMessage($message)
	{
		$_SESSION['message'] = $message;
	}

	function showMessage()
	{
		if (isset($_SESSION['message'])) {
			return $_SESSION['message'];
			unset($_SESSION['message']);
		}
		else {
			return false;
		}
	}

?>

<html>
	<head>

		<style>

		.error{
			background-color: #f2dede;
			padding: 5px;
			border-radius: 5px;
			color: #ff4d4d;
			text-align: center;
			width: 300px;
		}

		</style>

	</head>

	<body>

		<h1>Geef uw kortingscode op</h1>
		<?php if(!$isValid): ?>
			<form action="oplossing-opdracht-error-handling.php" method="post">

				<?php if ($message): ?>
					<p class="error"><?= $message['text'] ?><p>
				<?php endif ?>
				

				<label for="code">Kortingscode: </label>
				<input type="text" name="code" id="code">

				<button type="submit" name="submit" value="submit">Verzenden</button>

			</form>
		<?php else: ?>
			<p>korting toegekend!<p>
		<?php endif ?>
	</body>
</html>