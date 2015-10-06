<?php
		$dag = "";

		$getal = 1;

		if ($getal == 1) {
			$dag = "maandag";
		}

		if ($getal == 2) {
			$dag = "Dinsdag";
		}

		if ($getal == 3) {
			$dag = "Woensdag";
		}

		if ($getal == 4) {
			$dag = "Donderdag";
		}

		if ($getal == 5) {
			$dag = "Vrijdag";
		}

		if ($getal == 6) {
			$dag = "Zaterdag";
		}

		if ($getal == 7) {
			$dag = "Zondag";
		}

		$dag = strtoupper($dag);
		$positieLaatsteA = strrpos($dag, "A");
		$dag = substr_replace($dag, "a", $positieLaatsteA, 1);
?>

<!DOCTYPE html>
<html>

	<p>De <?= $getal ?>e dag van de week is <?= $dag ?> </p>
	
</html>