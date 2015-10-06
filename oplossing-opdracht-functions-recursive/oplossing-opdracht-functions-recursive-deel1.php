<?php
	$geld = 100000;
	

	function rente($geldSom)
	{
		static $aantalJaar = 10;
		static $counter = 0;
		static $renteVoet = 1.08;
		static $totaal = 0;

		if ($counter != $aantalJaar) {
			$totaal = $geldSom * $renteVoet;
			++$counter;
			echo "Mijn geld heeft na " . $counter . " jaar €" . $totaal . " opgebracht" . "<br>";
			rente($totaal);
		}
		else {
			echo "De " . $aantalJaar . " jaar is voorbij";
		}
	}

?>

<!DOCTYPE html>

<html>

	<p>  Na <?= $aantalJaar ?> jaar €<?= $geld ?> te sparen op de bank heeft me dat dit opgebracht:</p>
	<p> <?php rente($geld) ?> </p>

</html>