<?php
	$nummer1 = 0;
	$getallenArray1 = array();
	$getallenArray2 = array();

	while ($nummer1 <= 100) {
		$getallenArray1[] = $nummer1;
		$nummer1++;
	}

	$spatieKommaArray1 = implode(", ", $getallenArray1);

	$nummer2 = 0;

	while ($nummer2 <= 100) {
		if ((($nummer2 % 3) == 0 && $nummer2 > 40) && $nummer2 < 80) {
			$getallenArray2[] = $nummer2;
		}
		$nummer2++;
	}

	$spatieKommaArray2 = implode(", ", $getallenArray2);
?>

<!DOCTYPE html>

<html>

	<H1>Getallen array 1: </H1>
	<p>	<?= $spatieKommaArray1 ?> </p>

	<H1>Getallen array 2: </H1>
	<p>	<?= $spatieKommaArray2 ?> </p>

</html>