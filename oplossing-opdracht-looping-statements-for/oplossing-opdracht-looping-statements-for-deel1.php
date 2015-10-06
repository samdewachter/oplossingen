<?php


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
	    	</style>

	</head>
	 
	<body>

		<table>
				<?php for ($rijen=10; $rijen > 0; $rijen--): ?>
					<tr>
						<?php for ($kolommen=10; $kolommen > 0; $kolommen--): ?>
						<td>Kolom</td>
						<?php endfor ?>
					</tr>
				<?php endfor ?>

		</table>

	</body>
	

</html>