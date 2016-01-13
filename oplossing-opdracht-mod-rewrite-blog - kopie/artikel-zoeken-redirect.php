<?php

	if (isset($_GET['opWoordZoeken'])) {
		$woord = $_GET['opWoordZoeken'];
		header('location: zoeken/content/' . $woord);
	}

	if (isset($_GET['opDatumZoeken'])) {
		$datum = $_GET['opDatumZoeken'];
		header('location: zoeken/datum/' . $datum);
	}


?>