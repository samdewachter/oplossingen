<?php

	$rijen = 10;
	$kolommen = 10;

	$dataTafels1 = array();

	for ($getal1=0; $getal1 <= 10; $getal1++) { 

		$dataTafels2 = array();
		$dataTafels1[] = $getal1;

		for ($getal2=0; $getal2 <= 10 ; $getal2++) { 

			$resultaat = $getal1 * $getal2;
			$dataTafels2[] = $resultaat;
		}
		$dataTafels1[$getal1] = $dataTafels2;
	}

?>

<!DOCTYPE html>

<html>
	<head>
	        <meta charset="utf-8">
	    	<title>Oplossing for: deel1</title>
	    	<style>
				table
				{
					border-collapse:collapse;
				}

				td
				{
					padding: 16px;
					border: 1px solid lightgrey;
				}

				.groen {
					background-color: lightgreen;
				}
	    	</style>

	</head>
	 
	<body>

		<pre> <?= var_dump($dataTafels1)?> </pre>

		<table>
				<?php foreach($dataTafels1 as $dataTafels2): ?>
					<tr>
						<?php foreach($dataTafels2 as $value2): ?>
						<td class=<?php echo (($value2 % 2) != 0)? "groen" : "" ?> > <?= $value2 ?> </td>
						<?php endforeach ?>
					</tr>
				<?php endforeach ?>
		</table>

	</body>
	

</html>