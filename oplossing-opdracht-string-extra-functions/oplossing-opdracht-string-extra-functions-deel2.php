<?php 
		$fruit = "ananas";
		$needle = "a";
?>

<!DOCTYPE html>
<html>

	<p>De positie van de laatste '<?= $needle ?>' is <?php echo (strrpos($fruit, $needle) + 1) ?> </p>
	<p>In hoofdletters: <?php echo strtoupper($fruit) ?> </p>

</html>