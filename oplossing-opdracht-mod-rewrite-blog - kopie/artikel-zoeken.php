<!DOCTYPE html>

<?php

	session_start();

	$gezochtOpWoord = false;

	$zoekWoord = "";
	$zoekDatum = "";


	$db = new PDO('mysql:host=localhost;dbname=opdracht-mod-rewrite-blog', 'root', '');

	if (isset($_GET['opWoordZoeken']))
	{

		$_SESSION['debug']['zoeken'] = $_GET['opWoordZoeken'];

		$zoekWoord = $_GET['opWoordZoeken'];

		$zoekQuery = 'SELECT * FROM artikels
						WHERE artikel LIKE "%' . $zoekWoord . '%" ';


		$statement = $db->prepare($zoekQuery);

		$statement->bindValue(':zoekWoord', $zoekWoord);

		$statement->execute();

		$gezochtOpWoord = true;

	}

	if (isset($_GET['opDatumZoeken']))
	{

		$_SESSION['debug']['zoeken'] = "op datum zoeken gedrukt";

		$zoekDatum = $_GET['opDatumZoeken'];

		$zoekQuery = 'SELECT * FROM artikels
						WHERE YEAR(datum) = :zoekDatum';

		$statement = $db->prepare($zoekQuery);

		$statement->bindValue(':zoekDatum', $zoekDatum);

		$statement->execute();

	}

	while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
		$artikels[] = $row;
	}


	$_SESSION['debug']['gevondenArtikel'] = $artikels;


?>

<html>
	<head>


	</head>


	<body>

		<a href="../../../artikels">Terug naar overzicht</a>

		<form action="artikels/zoeken" method="GET">

			<ul>

				<li>

					<label for="opWoordZoeken">Zoeken in artikels:</label><br />
					<input type="text" name="opWoordZoeken" id="opWoordZoeken"><button>Zoeken</button>

				</li>

			</ul>
		</form>

		<form action="artikels/zoeken" method="GET">

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

		<?php if($gezochtOpWoord == true): ?>

			<h1>Artikels die het woord "<?= $zoekWoord ?>" bevatten</h1>

		<?php else: ?>

			<h1>Artikels van het jaar "<?= $zoekDatum ?>"</h1>

		<?php endif ?>

		<a href="../../../artikels/toevoegen">Artikel toevoegen</a>

		<?php foreach ($artikels as $artikel => $value): ?>

			<article>

				<h1><?= $value['titel'] ?> | <?= $value['datum'] ?></h1>

				<p><?= $value['artikel'] ?></p>

				<p>Keywords: <?= $value['kernwoorden'] ?></p>

			</article>

		<?php endforeach ?>

		<!--<pre>

			<?= (isset($_SESSION['debug'])? var_dump($_SESSION['debug']) : '') ?>

		</pre> -->


	</body>
</html>