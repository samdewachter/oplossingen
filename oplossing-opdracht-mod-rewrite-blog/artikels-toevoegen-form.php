<!DOCTYPE html>


<?php
	session_start();

	$titel = "";
	$artikel = "";
	$kernwoorden = "";
	$datum = "";

	if (isset($_SESSION['nieuwArtikel'])) {
		$titel = $_SESSION['nieuwArtikel']['titel'];
		$artikel = $_SESSION['nieuwArtikel']['artikel'];
		$kernwoorden = $_SESSION['nieuwArtikel']['kernwoorden'];
		$datum = $_SESSION['nieuwArtikel']['datum'];
	}


?>


<html>
	<head>


	</head>


	<body>
		<h1>Artikel toevoegen</h1>

		<form action="artikel-toevoegen.php" method="POST">

			<a href="artikel-overzicht.php">Terug naar overzicht</a>

			<ul>

				<li>

					<label for="titel">Titel</label><br />
					<input type="text" name="titel" id="titel" value="<?= $titel ?>">

				</li>
				<li>

					<labe lfor="artikel">Artikel</label><br />
					<textarea name="artikel" id="artikel"><?= $artikel ?></textarea>

				</li>
				<li>

					<label for="kernwoorden">Kernwoorden</label><br />
					<input type="text" name="kernwoorden" id="kernwoorden" value="<?= $kernwoorden ?>">

				</li>
				<li>

					<label for="datum">Datum (jjjj-mm-dd)</label><br />
					<input type="text" name="datum" id="datum" value="<?= $datum ?>">

				</li>

			</ul>

			<button name="submit">Verzenden</button>


		</form>

		<pre>

			<?= (isset($_SESSION['debug'])? var_dump($_SESSION['debug']) : "") ?>
			<?= (isset($_SESSION['nieuwArtikel'])? var_dump($_SESSION['nieuwArtikel']) : "") ?>

		</pre>


	</body>
</html>