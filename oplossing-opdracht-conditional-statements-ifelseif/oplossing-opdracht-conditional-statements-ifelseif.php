<?php 

		$getal = 101;
		$juistGetal = true;
		$tiental1 = 0;
		$tiental2 = 0;

		if ($getal >= 0 && $getal < 10) {
			$tiental1 = 0;
			$tiental2 = 10;			
		}
		elseif ($getal >= 10 && $getal < 20) {
			$tiental1 = 10;
			$tiental2 = 20;			
		}
		elseif ($getal >= 20 && $getal < 30) {
			$tiental1 = 20;
			$tiental2 = 30;			
		}
		elseif ($getal >= 30 && $getal < 40) {
			$tiental1 = 30;
			$tiental2 = 40;			
		}
		elseif ($getal >= 40 && $getal < 50) {
			$tiental1 = 40;
			$tiental2 = 50;			
		}
		elseif ($getal >= 50 && $getal < 60) {
			$tiental1 = 50;
			$tiental2 = 60;			
		}
		elseif ($getal >= 60 && $getal < 70) {
			$tiental1 = 60;
			$tiental2 = 70;			
		}
		elseif ($getal >= 70 && $getal < 80) {
			$tiental1 = 70;
			$tiental2 = 80;			
		}
		elseif ($getal >= 80 && $getal < 90) {
			$tiental1 = 80;
			$tiental2 = 90;			
		}
		elseif ($getal >= 90 && $getal < 100) {
			$tiental1 = 90;
			$tiental2 = 100;			
		}
		else {
			$juistGetal = false;
		}

	?>

<!DOCTYPE html>
<html>
	
	<p> <?php echo ($juistGetal) ? strrev("Het getal ligt tussen " . $tiental1 . " en " . $tiental2)
									: strrev("Geef AUB een getal in tussen 1-100") ; ?>

</html>