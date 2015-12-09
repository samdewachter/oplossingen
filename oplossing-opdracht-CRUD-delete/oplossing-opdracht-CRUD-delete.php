<!DOCTYPE html>

<?php

	$message = "";


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

		<form action="oplossing-opdracht-CRUD-delete.php" method="POST">

			<table>
				<thead>

					<th>#</th>

					<?php foreach ( $fetchAssoc[0] as $key => $value ): ?>

						<th> <?= $key ?> </th>

					<?php endforeach ?>

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

						</tr>

					<?php endforeach ?>

				</tbody>

			</table>

		</form>



		<pre><?= var_dump($fetchAssoc) ?></pre>
	</body>
</html>