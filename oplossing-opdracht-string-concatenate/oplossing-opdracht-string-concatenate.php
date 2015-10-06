<?php
		$voornaam = "Sam";
		$familienaam = "De Wachter";
		$volledigeNaam = $voornaam . " " . $familienaam;
		$volledigeNaamLengte = strlen($volledigeNaam);
?>

<!DOCTYPE html>
<html>

	<p>Mijn volledige naam is <?php echo $volledigeNaam ?></p>
	<p>Mijn naam bestaat uit <?= $volledigeNaamLengte ?> letters </p>

</html>