<?php

	$md5HashKey = "d1fa402db91a7a93c4f414b8278ce073";
	$needle1 = "2";
	$needle2 = "8";
	$needle3 = "a";


	function countPercentage1($needle)
	{
		global $md5HashKey;
		$aantalKeer = substr_count($md5HashKey, $needle);
		$lengteString = strlen($md5HashKey);
		$procent = ($aantalKeer / $lengteString) * 100;

		return $procent;
	}

	function countPercentage2($needle)
	{
		global $md5HashKey;
		$aantalKeer = substr_count($md5HashKey, $needle);
		$lengteString = strlen($md5HashKey);
		$procent = ($aantalKeer / $lengteString) * 100;

		return $procent;
	}

	function countPercentage3($needle)
	{
		global $md5HashKey;
		$aantalKeer = substr_count($md5HashKey, $needle);
		$lengteString = strlen($md5HashKey);
		$procent = ($aantalKeer / $lengteString) * 100;

		return $procent;
	}
?>

<!DOCTYPE html>

<html>

	<p>Functie1: De needle '<?= $needle1 ?>' komt <?= countPercentage1($needle1) ?>% voor in de hash key '<?= $md5HashKey ?>' </p>
	<p>Functie1: De needle '<?= $needle2 ?>' komt <?= countPercentage1($needle2) ?>% voor in de hash key '<?= $md5HashKey ?>' </p>
	<p>Functie1: De needle '<?= $needle3 ?>' komt <?= countPercentage1($needle3) ?>% voor in de hash key '<?= $md5HashKey ?>' </p>

</html>