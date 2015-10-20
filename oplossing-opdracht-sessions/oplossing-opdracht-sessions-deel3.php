<?php

	session_start();

	if (isset($_POST["volgende"])) {
		$_SESSION['gegevens']["deel2"]["straat"] = $_POST['straat'];
		$_SESSION['gegevens']["deel2"]["nummer"] = $_POST['nummer'];
		$_SESSION['gegevens']["deel2"]["gemeente"] = $_POST['gemeente'];
		$_SESSION['gegevens']["deel2"]["postcode"] = $_POST['postcode'];

	}

?>

<!DOCTYPE>

<html>

	<h1>Overzichtspagina</h1>

	<ul>
		
		<?php foreach ($_SESSION['gegevens'] as  $deel => $value1): ?>
			<?php foreach ($value1 as  $key2 => $value2): ?>

				<li> <?= $key2 . ": " . $value2 ?> <a href="http://oplossingen.web-backend.local/oplossing-opdracht-sessions/oplossing-opdracht-sessions-<?= $deel ?>.php">wijzig</a></li>
			<?php endforeach ?>
			
		<?php endforeach ?>
		
	</ul>

</html>