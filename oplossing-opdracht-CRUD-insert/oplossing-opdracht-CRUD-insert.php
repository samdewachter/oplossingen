<!DOCTYPE html>

<?php

	$message = '';

	if (isset($_POST['submit'])) {
		try {

			$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '');

			$queryString = 'INSERT INTO brouwers (brnaam, adres, postcode, gemeente, omzet)
							VALUES (:brouwernaam, :adres, :postcode, :gemeente, :omzet)';

			$statement = $db->prepare($queryString);

			$statement->bindValue(':brouwernaam', $_POST['brouwernaam']);
			$statement->bindValue(':adres', $_POST['adres']);
			$statement->bindValue(':postcode', $_POST['postcode']);
			$statement->bindValue(':gemeente', $_POST['gemeente']);
			$statement->bindValue(':omzet', $_POST['omzet']);

			$statement->execute();

			if ($statement->execute()) {
				$message = "Brouwerij succesvol toegevoegd. Het unieke nummer van deze brouwerij is " . $db->lastInsertId();
			}
			else
			{
				$message = "Toevoegen mislukt.";
			}
			
		}
		catch (Exception $e) {
			$message = "Connectie is niet gelukt: " . $e->getMessage();
		}
	}


?>


<html>
	<head>
		<style>

		ul li {
			list-style-type: none;
			padding: 5px;
		}

		.message {
			background-color: lightgreen;
		}

		</style>
	</head>


	<body>

		<h1>Voeg een brouwer toe</h1>

		<p class="message"><?= $message ?></p>

		<form method="POST" action="oplossing-opdracht-CRUD-insert.php">
			<ul>
				<li>
					<label for="brouwernaam">brouwernaam: </label>
					<input type="text" id="brouwernaam" name="brouwernaam">
				</li>

				<li>
					<label for="adres">adres: </label>
					<input type="text" id="adres" name="adres">
				</li>

				<li>
					<label for="postcode">postcode: </label>
					<input type="text" id="postcode" name="postcode">
				</li>

				<li>
					<label for="gemeente">gemeente: </label>
					<input type="text" id="gemeente" name="gemeente">
				</li>

				<li>
					<label for="omzet">omzet: </label>
					<input type="text" id="omzet" name="omzet">
				</li>
			</ul>

			<button type="submit" name="submit">verzenden</button>
		</form>

	</body>
</html>