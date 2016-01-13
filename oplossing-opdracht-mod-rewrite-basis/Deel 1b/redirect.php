<!DOCTYPE html>

<?php

$baseName = '/' . basename(__FILE__) . '/';

	$root = preg_replace($baseName, '', __FILE__);

	$htaccess = file_get_contents($root .'/.htaccess');


?>

<html>
	<head>

	</head>


	<body>
		<h1>Het redirect bestand</h1>

		<pre>

			<?= $htaccess ?>

		</pre>


	</body>
</html>