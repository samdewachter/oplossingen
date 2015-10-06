<?php

	function berekenSom($getal1, $getal2)
	{
		$resultaat = $getal1 + $getal2;
		return $resultaat;
	}

	function vermenigvuldig($getal1, $getal2)
	{
		$resultaat = $getal1 * $getal2;
		return $resultaat;
	}

	function isEven($getal)
	{
		if (($getal % 2) == 0) {
			return "true";
		}
		else {
			return "false";
		}
	}

?>

<!DOCTYPE html>

<html>

	<p> <?= berekenSom(5,3) ?> </p>
	<p> <?= vermenigvuldig(5,3) ?> </p>
	<p> <?= isEven(8) ?> </p>

</html>