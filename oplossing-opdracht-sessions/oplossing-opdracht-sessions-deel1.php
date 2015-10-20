<?php

	session_start();

?>

<!DOCTYPE>

<html>

	<form action="oplossing-opdracht-sessions-deel2.php" method="post">

		<label for="e-mail">e-mail: </label>
		<input type="text" name="e-mail" id="e-mail" value="<?= (isset($_SESSION['gegevens']["deel1"]["e-mail"]))? $_SESSION['gegevens']["deel1"]["e-mail"] : ""; ?>">

		<label for="nickname">nickname: </label>
		<input type="text" name="nickname" id="nickname" value="<?= (isset($_SESSION['gegevens']["deel1"]["nickname"]))? $_SESSION['gegevens']["deel1"]["nickname"] : ""; ?>">

		<button type="submit" name="volgende">Volgende</button>

	</form>

</html>