<?php
	session_start();

	if (isset($_GET['session']))
	{
		if($_GET['session'] === 'destroy')
		{
			session_destroy();
			header('Location: oplossing-opdracht-sessions-deel2.php'); // staat in voor refresh
		}
	}

	if (isset($_POST["volgende"])) {
		$_SESSION['gegevens']["deel1"]["e-mail"] = $_POST['e-mail'];
		$_SESSION['gegevens']["deel1"]["nickname"] = $_POST['nickname'];
	}
	

?>

<!DOCTYPE>

<html>

	<h1>Registratiegegevens</h1>
	<ul>
		
		<?php foreach ($_SESSION['gegevens']["deel1"] as  $key => $value): ?>
			<li> <?= $key . ": " . $value ?> </li>
		<?php endforeach ?>
		
	</ul>

	<h1>Adres</h1>
	<form action="oplossing-opdracht-sessions-deel3.php" method="post">

		<label for="straat">straat: </label>
		<input type="text" name="straat" id="straat" value="<?= (isset($_SESSION['gegevens']["deel2"]["straat"]))? $_SESSION['gegevens']["deel2"]["straat"] : ""; ?>">
		<label for="nummer">nummer: </label>
		<input type="text" name="nummer" id="nummer" value="<?= (isset($_SESSION['gegevens']["deel2"]["nummer"]))? $_SESSION['gegevens']["deel2"]["nummer"] : ""; ?>">

		<label for="gemeente">gemeente: </label>
		<input type="text" name="gemeente" id="gemeente" value="<?= (isset($_SESSION['gegevens']["deel2"]["gemeente"]))? $_SESSION['gegevens']["deel2"]["gemeente"] : ""; ?>">

		<label for="postcode">postcode: </label>
		<input type="text" name="postcode" id="postcode" value="<?= (isset($_SESSION['gegevens']["deel2"]["postcode"]))? $_SESSION['gegevens']["deel2"]["postcode"] : ""; ?>">
		<button type="submit" name="volgende">Volgende</button>

	</form>

	<a href="oplossing-opdracht-sessions-deel2.php?session=destroy">Destroy session</a>

</html>