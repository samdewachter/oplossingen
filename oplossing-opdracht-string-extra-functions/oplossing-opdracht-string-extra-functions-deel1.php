<?php 
		$fruit = "kokosnoot";
		$fruitLengte = strlen($fruit);
		$needle = "o";
?>

<!DOCTYPE html>
<html>

	<p><?= $fruit ?> bestaat uit <?= $fruitLengte ?> letters </p>
	<p>De positie van de eerste '<?= $needle ?>' is <?php echo (strpos($fruit, $needle) + 1) ?> </p>

</html>