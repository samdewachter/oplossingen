<!DOCTYPE html>
<?php

	function __autoload($className) {
	  require_once("classes/" . $className .".php");
	}

	$kermit = new Animal("Kermit", "male", 100);
	$Dikkie = new Animal("Dikkie", "male", 90);
	$Flipper = new Animal("Flipper", "female", 80);

	$Simba = new Lion("Simba", "male", 100, "Congo lion");
	$Scar = new Lion("Scar", "male", 100, "Kenia lion");

	$Zeke = new Zebra("Zeke", "male", 60, "Quagga");
	$Zana = new Zebra("Zana", "female", 80, "Selous");
?>

<html>

	<p><?= $kermit->getName() ?> is van het geslacht <?= $kermit->getGender() ?> en heeft momenteel <?= $kermit->getHealth() ?> levenspunten (special move: <?= $kermit->doSpecialMove() ?>)</p>
	<p><?= $Dikkie->getName() ?> is van het geslacht <?= $Dikkie->getGender() ?> en heeft momenteel <?= $Dikkie->getHealth() ?> levenspunten (special move: <?= $Dikkie->doSpecialMove() ?>)</p>
	<p><?= $Flipper->getName() ?> is van het geslacht <?= $Flipper->getGender() ?> en heeft momenteel <?= $Flipper->getHealth() ?> levenspunten (special move: <?= $Flipper->doSpecialMove() ?>)</p>
	<p>Flipper zijn health wordt verminderd met 20 ==> nog <?= $Flipper->changeHealth(-20) ?> levenspunten </p>


	<p>De Speciale move van <?= $Simba->getName() ?> (soort: <?= $Simba->getSpecies() ?>): <?= $Simba->doSpecialMove() ?></p>
	<p>De Speciale move van <?= $Scar->getName() ?> (soort: <?= $Scar->getSpecies() ?>): <?= $Scar->doSpecialMove() ?></p>

	<p>De Speciale move van <?= $Zeke->getName() ?> (soort: <?= $Zeke->getSpecies() ?>): <?= $Zeke->doSpecialMove() ?></p>
	<p>De Speciale move van <?= $Zana->getName() ?> (soort: <?= $Zana->getSpecies() ?>): <?= $Zana->doSpecialMove() ?></p>
</html>