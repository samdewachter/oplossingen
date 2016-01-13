<!DOCTYPE html>


<?php

	$regEx = "";
	$string = "";
	$result = "";
	$replacement = "#";

	if (isset($_POST['submit'])) {
		$regEx = $_POST['regEx'];
		$string = $_POST['string'];

		if ($regEx != "" && $string != "") {
			$result = preg_replace("/" . $regEx . "/", $replacement, $string);
		}
		else
		{
			$result = "#";
		}

		
	}



?>


<html>
	<head>


	</head>


	<body>
		<h1>RegEx tester</h1>

		<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">

			<ul>

				<li>

					<label for="regEx">Regular Expression</label><br />
					<input type="text" name="regEx" id="regEx" value="<?= $regEx ?>">

				</li>

				<li>

					<label for="string">String</label><br />
					<textarea id="string" name="string" rows="8" cols="50"><?= $string ?></textarea>

				</li>

				<li>

					<button type="submit" name="submit">Verzenden</button>

				</li>

			</ul>

		</form>

		<p><?= $result ?></p>

	</body>
</html>