<?php

	$rijen = 10;
	$kolommen = 10;

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

		<table>
				<?php for ($rij=0; $rij <= $rijen; $rij++): ?>
					<tr>
						<?php for ($kolom=0; $kolom <= $kolommen; $kolom++): ?>
						<?php $resultaat = ($rij * $kolom) ?>
						<td class=<?php echo (($resultaat % 2) != 0)? "groen" : "" ?> > <?= $resultaat ?> </td>
						<?php endfor ?>
					</tr>
				<?php endfor ?>
		</table>

	</body>
	

</html>