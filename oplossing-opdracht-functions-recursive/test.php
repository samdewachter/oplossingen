<?php

	$test = array();
	$counter = 5;


	for ($counter=0; $counter < 5; $counter++) { 
		$getal = $counter * 100;
		$test[$counter] = $getal;
	}
	

?>

<html>

	<pre> <?= var_dump($test) ?> </pre>

</html>