<?php
	$geld = 100000;
	$aantalJaar = 10;
	$counter = 0;
	$renteVoet = 1.08;
	$volledigeInfo = array();


	function rente($geldSom)
	{
		global $aantalJaar;
		global $counter;
		global $renteVoet;
		$totaal = 0;
		global $volledigeInfo;

		if ($counter != $aantalJaar) {
			$totaal = $geldSom * $renteVoet;
			++$counter;
			echo "Mijn geld heeft na " . $counter . " jaar €" . $totaal . " opgebracht" . "<br>";
			$volledigeInfo["jaar" . $counter] = $totaal;
			rente($totaal);
		}
		else {
			echo "De " . $aantalJaar . " jaar sparen is voorbij";
		}
	}

?>

<!DOCTYPE html>

<html>

	<p>  Na <?= $aantalJaar ?> jaar €<?= $geld ?> te sparen op de bank heeft me dat dit opgebracht:</p>
	<p> <?php rente($geld) ?> </p>
	<pre> <?= var_dump($volledigeInfo) ?> </pre>
</html>