<?php

$dierenArray1 = array("hond", "kat", "paard", "koe", "neushoorn", "giraf", "olifant", "zeehond", "duif", "schildpad");

$dierenArray2[] = "hond";
$dierenArray2[] = "kat";
$dierenArray2[] = "paard";
$dierenArray2[] = "koe";
$dierenArray2[] = "neushoorn";
$dierenArray2[] = "giraf";
$dierenArray2[] = "olifant";
$dierenArray2[] = "zeehond";
$dierenArray2[] = "duif";
$dierenArray2[] = "schildpad";

$voertuigen["landvoertuigen"] = array("Vespa", "fiets");
$voertuigen["watervoertuigen"] = array("surfplank", "vlot", "schoener", "driemaster");
$voertuigen["luchtvoertuigen"] = array("luchtbalon", "helicopter", "B52");


?>

<!DOCTYPE html>

<html>

<pre><?php var_dump( $voertuigen ) ?></pre>


</html>