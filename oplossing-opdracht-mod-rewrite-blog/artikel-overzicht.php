<!DOCTYPE html>


<?php
	session_start();

	$db = new PDO('mysql:host=localhost;dbname=opdracht-mod-rewrite-blog', 'root', '');

	$alleArtikels = 'SELECT * FROM artikels';

	$statement = $db->prepare($alleArtikels);

	$statement->execute();

	while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
		$artikels[] = $row;
	}



?>


<html>
	<head>


	</head>


	<body>

		<form action="artikel-zoeken.php" method="GET">

			<ul>

				<li>

					<label for="opWoordZoeken">Zoeken in artikels:</label><br />
					<input type="text" name="opWoordZoeken" id="opWoordZoeken"><button>Zoeken</button>

				</li>

			</ul>
		</form>

		<form action="artikel-zoeken.php" method="GET">

			<ul>

				<li>

					<label for="opDatumZoeken">Zoeken op datum:</label><br />
					<select name="opDatumZoeken" id="opDatumZoeken">

						<option>2010</option>
						<option>2011</option>
						<option>2012</option>
						<option>2013</option>
						<option>2014</option>
						<option>2015</option>

					</select>
					<button>Zoeken</button>

				</li>

			</ul>

		</form>

		<h1>Artikels overzicht</h1>

		<a href="artikels-toevoegen-form.php">Artikel toevoegen</a>

		<?php foreach ($artikels as $artikel => $value): ?>

			<article>

				<h1><?= $value['titel'] ?> | <?= $value['datum'] ?></h1>

				<p><?= $value['artikel'] ?></p>

				<p>Keywords: <?= $value['kernwoorden'] ?></p>

			</article>

		<?php endforeach ?>

		<!-- <pre>

			<?= (isset($_SESSION['debug'])? var_dump($_SESSION['debug']) : '') ?>

		</pre> -->


	</body>
</html>