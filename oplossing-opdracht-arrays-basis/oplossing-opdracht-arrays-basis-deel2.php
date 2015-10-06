<?php

	$getallenArray1 = array(1,2,3,4,5);
	$totaalMaal = 1;
	$onevenGetallen = array();
	$getallenArray2 = array(5,4,3,2,1);
	$opgeteldeGetallen = array();
	
	foreach ($getallenArray1 as $value) {
		$totaalMaal *= $value;

		if (($value % 2) != 0) {
			$onevenGetallen[] = $value;
		}
	}
	
	foreach ($getallenArray1 as $key => $value) {
		$opgeteldeGetallen[] = $value + $getallenArray2[$key];
	}

	
?>

<!DOCTYPE html>

<html>

	<p>Als je alle getallen van array 1 vermenigvuldigd bekom je <?= $totaalMaal ?> </p>

	<p>Als je de getallen uit beide arrays met dezelfde index bij elkaar optelt bekom je:</p>
		<pre> <?php var_dump($opgeteldeGetallen); ?> </pre>

</html>