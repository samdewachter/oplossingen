<?php

	setlocale(LC_ALL, "nl_NL");

	$datum = strftime("%d %B %Y, %H:%M:%S %p", mktime(22, 35, 21, 1, 25, 1904));

?>

<!DOCTYPE html>

<html>

<p><?= $datum ?></p>

</html>

