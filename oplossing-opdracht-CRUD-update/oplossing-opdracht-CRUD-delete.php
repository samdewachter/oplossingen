<!DOCTYPE html>

<?php

	$message = "";

	$editing = false;


	try {

		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '');

		$message = "connectie met database";

		$queryString = 'SELECT *
						FROM brouwers';

		$statement = $db->prepare($queryString);

		$statement->execute();

		while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
			$fetchAssoc[] = $row;
		}

		if (isset($_POST['delete'])) {

			$test = $_POST['delete'];
			
			$queryString2 = 'DELETE FROM brouwers
							WHERE brouwernr = :brouwernr';

			$statement2 = $db->prepare($queryString2);

			$statement2->bindValue( ':brouwernr', $_POST['delete'] );

			if ($statement2->execute() ) {
				$message = "Verwijderen gelukt";
			}
			else
			{
				$message ="Verwijderen is niet gelukt: " . $statement2->errorInfo()[2];
			}
		}

		if (isset($_POST['edit'])) {
			
			$queryString3 = 'SELECT *
							FROM brouwers
							WHERE brouwernr = :brouwernr';

			$statement3 = $db->prepare($queryString3);

			$statement3->bindValue( ':brouwernr', $_POST['edit']);

			$statement3->execute();

			while ($row = $statement3->fetch(PDO::FETCH_ASSOC)) {
				$fetchAssoc2 = $row;
			}

			$editing = true;
		}

		if (isset($_POST['wijzigen'])) {
			$queryString4 = 'UPDATE brouwers
							SET 	brnaam = :brnaam,
									adres = :adres,
									postcode = :postcode,
									gemeente = :gemeente,
									omzet = :omzet
							WHERE brouwernr = :brouwernr';

			$statement4 = $db->prepare($queryString4);

			$statement4->bindValue(":brouwernr", $_POST['brouwernr']);
			$statement4->bindValue(":brnaam", $_POST['brnaam']);
			$statement4->bindValue(":adres", $_POST['adres']);
			$statement4->bindValue(":postcode", $_POST['postcode']);
			$statement4->bindValue(":gemeente", $_POST['gemeente']);
			$statement4->bindValue(":omzet", $_POST['omzet']);

			if ($statement4->execute() ) {
				$message = "Wijzigen gelukt";

				$statement->execute();
			}
			else
			{
				$message ="Wijzigen is niet gelukt: " . $statement4->errorInfo()[2];
			}
		}

		
	}
	catch (Exception $e) {

		$message = "er is iets fout gelopen: " . $e->getMessage();
		
	}


?>


<html>
	<head>

		<style>

			.oneven {
				background-color: lightgrey;
			}

			th {
				background-color: grey;
			}

		</style>

	</head>


	<body>
		<p><?= $message ?></p>

		<?php if ($editing): ?>
		<pre><?= var_dump($fetchAssoc2) ?></pre>

		<h1>Brouwerij <?= $fetchAssoc2['brnaam'] ?> ( #<?= $fetchAssoc2['brouwernr'] ?> ) wijzigen</h1>

		<form action="oplossing-opdracht-CRUD-delete.php" method="POST">

			<ul>
				<li>
					<label for="brouwernaam">brouwernaam: </label>
					<input type="text" value="<?= $fetchAssoc2['brnaam']?>" id="brnaam" name="brnaam">
				</li>

				<li>
					<label for="adres">adres: </label>
					<input type="text" value="<?= $fetchAssoc2['adres']?>" id="adres" name="adres">
				</li>

				<li>
					<label for="postcode">postcode: </label>
					<input type="text" value="<?= $fetchAssoc2['postcode']?>" id="postcode" name="postcode">
				</li>

				<li>
					<label for="gemeente">gemeente: </label>
					<input type="text" value="<?= $fetchAssoc2['gemeente']?>" id="gemeente" name="gemeente">
				</li>

				<li>
					<label for="omzet">omzet: </label>
					<input type="text" value="<?= $fetchAssoc2['omzet']?>" id="omzet" name="omzet">
					<input type="hidden" id="brouwernr" name="brouwernr" value="<?= $fetchAssoc2['brouwernr'] ?>">
				</li>
			</ul>

			<button type="submit" name="wijzigen" value="wijzigen">Wijzigen</button>

		</form>

		<?php endif ?> 

		<form action="oplossing-opdracht-CRUD-delete.php" method="POST">

			<table>
				<thead>

					<th>#</th>

					<?php foreach ( $fetchAssoc[0] as $key => $value ): ?>

						<th> <?= $key ?> </th>

					<?php endforeach ?>

					<th></th>
					<th></th>

				</thead>

				<tbody>

					<?php foreach ( $fetchAssoc as $key => $brouwers ): ?>

						<tr class="<?= ( ( $key + 1 ) % 2 == 0 )? 'even' : 'oneven' ?>">
							<td> <?= ( $key + 1 ) ?> </td>

							<?php foreach ( $brouwers as $gegevens ): ?>

								<td><?= $gegevens ?></td>

							<?php endforeach ?>

							<td> <input type="image" src="icon-delete.png" name="delete" value="<?= $brouwers['brouwernr'] ?>"> </td>
							<td> <input type="image" src="pencil-edit.png" name="edit" value="<?= $brouwers['brouwernr'] ?>"> </td>

						</tr>

					<?php endforeach ?>

				</tbody>

			</table>

		</form>



		<pre><?= var_dump($fetchAssoc) ?></pre>
	</body>
</html>