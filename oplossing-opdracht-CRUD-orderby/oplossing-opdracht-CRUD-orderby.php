<!DOCTYPE html>

<?php

	$message = "";

	try {

		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '');

		$message = "connectie met de database";

		$queryString = 'SELECT bi.biernr, bi.naam, br.brnaam, so.soort, bi.alcohol
						FROM bieren bi
						JOIN brouwers br
						ON (bi.brouwernr=br.brouwernr)
						JOIN soorten so
						ON (br.brouwernr=so.soortnr)';

		$statement = $db->prepare($queryString);

		$statement->execute();

		$fetchAssoc = array();

		while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
			$fetchAssoc[] = $row;
		}

		$statement->execute();
		
	} catch (Exception $e) {

		$message = "er is iets fout gelopen: " . $e->getMessage();
		
	}



?>


<html>
	<head>

	</head>


	<body>

		<p><?= $message ?></p>


		<table>
			<thead>

				<?php foreach ($fetchAssoc[0] as $key => $value): ?>

					<th><a href="oplossing-opdracht-CRUD-orderby.php?order_by=<?= $key ?>-desc"> <?= $key ?>
						<?php if($_GET['order_by'] == $key . '-desc'): ?></a></th>

				<?php endforeach ?>

			</thead>


		</table>	

		<pre><?= var_dump($fetchAssoc) ?></pre>

	</body>
</html>