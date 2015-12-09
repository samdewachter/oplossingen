<!DOCTYPE html>

<?php

	$message='';

	try {

		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$message= "verbinding kunnen maken met de database";

		$queryString = 'SELECT brouwernr, brnaam
						FROM brouwers';

		$statement = $db->prepare($queryString);

		$statement->execute();

		while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
			$fetchAssoc[] = $row;
		}
	
		$statement->execute();

		$brouwerNummer = '';

		if (isset($_GET['brouwernr'])) {
			$brouwerNummer = $_GET['brouwernr'];

			$queryString2 = 'SELECT naam
							FROM bieren
							WHERE brouwernr = :brouwernr';

			$statement2 = $db->prepare($queryString2);

			$statement2->bindParam( ':brouwernr', $_GET[ 'brouwernr' ] );

		}
		else {

			$queryString2 = 'SELECT naam
							FROM bieren';

			$statement2 = $db->prepare($queryString2);
		}

		$statement2->execute();


		while( $row = $statement2->fetch( PDO::FETCH_ASSOC ) )
		{
			$fetchAssoc2[ ]	=	$row['naam'];
		}
		
	}
	catch (Exception $e) {

		$message = "er is iets fout gelopen: " . $e->getMessage();
		
	}



?>

<html>
	<head>
		<style>

		.even {
			background-color: lightgrey;
		}

		th {
			background-color: grey;
		}

		</style>
	</head>
	
	<body>

		<p><?= $message ?></p>

		<form action="oplossing-opdracht-CRUD-query-deel2.php" method="get">

			<select name="brouwernr">
				<?php foreach ($fetchAssoc as $key => $value): ?>
					<option value="<?= $fetchAssoc[$key]['brouwernr'] ?>" <?= ($brouwerNummer == $fetchAssoc[$key]['brouwernr'])? 'selected': '' ?>><?= $fetchAssoc[$key]['brnaam'] ?></option>
				<?php endforeach ?>
			</select>

			<button type="submit">Verzenden</button>

		</form>

		<table>
			<thead>
				<th>aantal</th>
				<th>naam</th>
			</thead>

			<?php foreach ($fetchAssoc2 as $key => $value): ?>
				<tr class="<?= (($key+1) %2 == 0)? 'even' : 'oneven' ?>">
					<td>
						<?= ($key + 1) ?>
					</td>
					<td>
						<?= $value ?>
					</td>
				</tr>
			<?php endforeach ?>

		</table>

		<pre><?= var_dump($fetchAssoc2) ?></pre>

	</body>
</html>