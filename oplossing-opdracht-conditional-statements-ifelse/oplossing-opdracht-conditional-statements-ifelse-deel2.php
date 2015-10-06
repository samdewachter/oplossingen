<?php 
		$aantalSeconden = 221108521;

		$minuut = 60;
		$uur = 3600;
		$dag = 86400;
		$week = 604800;
		$maand = 2678400;
		$jaar = 31536000;

		$aantalMinuten = floor(($aantalSeconden / $minuut));
		$aantalUren = floor(($aantalSeconden / $uur));
		$aantalDagen = floor(($aantalSeconden / $dag));
		$aantalWeken = floor(($aantalSeconden / $week));
		$aantalMaanden = floor(($aantalSeconden / $maand));
		$aantalJaren = floor(($aantalSeconden / $jaar));
?>

<!DOCTYPE html>
<html>

	<p> minuten:  <?= $aantalMinuten ?> </p>
	<p> uren:  <?= $aantalUren ?> </p>
	<p> dagen:  <?= $aantalDagen ?> </p>
	<p> weken:  <?= $aantalWeken ?> </p>
	<p> maanden:  <?= $aantalMaanden ?> </p>
	<p> jaren:  <?= $aantalJaren ?> </p>	
	
</html>