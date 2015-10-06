<?php

	$getallenArray = array(8, 7, 8, 7, 3, 2, 1, 2, 4);

	$resultaat = array_unique($getallenArray);

	rsort($resultaat, SORT_NUMERIC );

?>

<!DOCTYPE html>

<html>

	<p>Array zonder duplicaten en gesorteerd van groot naar klein: </p>
	<pre> <?php var_dump($resultaat) ?> </pre>

</html>