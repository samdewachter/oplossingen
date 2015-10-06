<?php

	$boodschappenlijstje = array("melk", "brood", "water");

?>

<!DOCTYPE html>

<html>
<title> Oefening op while lus </title>

	<ul>
		<?php $index = 0 ?>
		<?php while($index < count($boodschappenlijstje)): ?>
		<li> <?= $boodschappenlijstje[$index] ?> </li>
		<?php $index++ ?>
		<?php endwhile ?>
	</ul>

</html>