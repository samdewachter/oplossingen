<?php

	$dierenArray = array("hond", "kat", "paard", "konijn", "hamster");
	$aantalElementenInArray = count($dierenArray);

	$teZoekenDier = "walvis";
	$dierGevonden = false;

?>

<!DOCTYPE html>

<html>

	<p>Er zitten <?= $aantalElementenInArray ?> dieren in de array </p>

	<p>Een <?= $teZoekenDier ?> is <?php echo (in_array($teZoekenDier, $dierenArray)) ? "gevonden" : "niet gevonden"; ?>
		in de array </p>

</html>