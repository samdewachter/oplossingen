<!DOCTYPE html>

<?php

	function __autoload($className)
		{

			include_once 'classes/' . $className . '-class.php';
		}

	$controller = (isset($_GET['controller']))? $_GET['controller'] : 'bieren';
	$method = (isset($_GET['method']))? $_GET['method'] : 'overview';
	$id = (isset($_GET['id']))? $_GET['id'] : 1;

	$bieren = new bieren($method);

	switch ($method) {
		case 'insert':
			$bieren->insert();
			break;
		
		case 'delete':
			$bieren->delete();
			break;

		case 'update':
			$bieren->update();
			break;

		case 'overview':
			$bieren->overview();
			break;	
	}


?>


<html>
	<head>


	</head>


	<body>

		<pre><?= var_dump($_GET) ?></pre>


	</body>
</html>