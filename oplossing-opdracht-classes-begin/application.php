<!DOCTYPE>
<?php

	function __autoload($className) {
	  require_once($className .".php");
	}

	$percent = new percent(150, 100);
?>

<html>
	<head>

		<style>
			table, td {
				border:2px solid black;
			}
		</style>

	</head>
	<table>
		<tr>
			<td>absoluut</td>
			<td><?= $percent->absolute ?></td>
		</tr>
		<tr>
			<td>relatief</td>
			<td><?= $percent->relative ?></td>
		</tr>
		<tr>
			<td>geheel getal</td>
			<td><?= $percent->hundred ?></td>
		</tr>
		<tr>
			<td>nominaal</td>
			<td><?= $percent->nominal ?></td>
		</tr>
	</table>

</html>