<?php

	$dierenArray = array("hond", "kat", "paard", "konijn", "hamster");
	$aantalElementenInArray = count($dierenArray);

	$teZoekenDier = "walvis";

	sort($dierenArray);

	$zoogdieren = array("muis", "bever", "egel");

	$dierenLijst = array_merge($dierenArray, $zoogdieren);

?>

<!DOCTYPE html>

<html>

	<p>Er zitten <?= $aantalElementenInArray ?> dieren in de array </p>

	<p>Een <?= $teZoekenDier ?> is <?php echo (in_array($teZoekenDier, $dierenArray)) ? "gevonden" : "niet gevonden"; ?>
		in de array </p>

	<p>De samengevoegde array: </p>
	<pre> <?php var_dump($dierenLijst) ?> </pre>

</html>