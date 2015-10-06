<?php
		$dag = "";

		$getal = 2;

		if ($getal == 1) {
			$dag = "Maandag";
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
?>

<!DOCTYPE html>
<html>

	<p>De <?= $getal ?>e dag van de week is <?= $dag ?> </p>
	
</html>