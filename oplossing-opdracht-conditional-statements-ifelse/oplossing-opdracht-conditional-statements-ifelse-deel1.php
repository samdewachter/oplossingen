<?php 
		$jaartal = 1700;
		$moduloJaartal4 = $jaartal % 4;
		$moduloJaartal100 = $jaartal % 100;
		$moduloJaartal400 = $jaartal % 400;

		$schrikeljaar = false;

		if (($moduloJaartal4 == 0 && $moduloJaartal100 != 0) || $moduloJaartal400 == 0)
		{
			$schrikeljaar = true;
		}
		else
		{
			$schrikeljaar = false;
		}
?>

<!DOCTYPE html>
<html>
	
	<p> <?= $jaartal ?> is  <?php echo ($schrikeljaar) ? "een" : "geen"; ?> schrikkeljaar </p>

</html>