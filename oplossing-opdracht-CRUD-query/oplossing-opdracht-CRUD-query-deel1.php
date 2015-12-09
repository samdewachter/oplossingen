<?php

	$message = '';

	try 
	{

		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$message = 'connectie gemaakt met database bieren';

		$queryString = 	'SELECT *
						FROM bieren bi
						JOIN brouwers br
						ON (bi.brouwernr=br.brouwernr)
						WHERE naam LIKE "du%"
						AND brnaam LIKE "%a%"';

		$statement = $db->prepare($queryString);

		$statement->execute();

		$fetchAssoc = array();

		while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
			$fetchAssoc[] = $row;
		}

		$statement->execute();

	} 
	catch (Exception $e) 
	{

		$message = "er is iets foutgelopen: " . $e->getMessage();

	}

?>

<html>
	<head>
		<style>
			th {
				border-bottom: 2px solid #111111;
				border-top: 1px solid #999;
			}

			tr.even {
				background-color: lightgrey;
			}

		</style>
	</head>

	<body>

		<p><?= $message ?></p>

		<table>
			<th>
				#
			</th>
			<?php foreach ($fetchAssoc[0] as $key => $bier): ?>
				<th>
					<?= $key ?>
				</th>
			<?php endforeach ?>

			<?php foreach ($fetchAssoc as $key => $bier): ?>
				<tr class="<?= (($key+1) %2 == 0)? 'even' : 'oneven' ?>">
					<td> <?= ($key+1) ?></td>
					<?php foreach ($bier as $value): ?>
							<td><?= $value ?></td>
					<?php endforeach ?>
				</tr>
			<?php endforeach ?>
		</table>

	</body>
</html>