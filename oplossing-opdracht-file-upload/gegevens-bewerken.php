<?php

	session_start();

	$message = false;

	try {

		if (isset($_POST['wijzigen'])) {
			
			if ((($_FILES['profielfoto']['type'] == "image/gif") || ($_FILES['profielfoto']['type'] == "image/jpeg")
				|| ($_FILES['profielfoto']['type'] == "image/png")) && ($_FILES['profielfoto']['size'] < 2000000)) {
				
				if ($_FILES['profielfoto']['error'] > 0) {
					throw new Exception("Return code: " . $_FILES['profielfoto']['error']);
				}
				else {
					define('ROOT', dirname(__FILE__));

					if (file_exists(ROOT . "/img/" . $_FILES['profielfoto']['name'])) {

						throw new Exception($_FILES['profielfoto']['name'] . " bestaat al.");
						
					}
					else {

						move_uploaded_file($_FILES['profielfoto']['tmp_name'], (ROOT . "/img/" . $_FILES['profielfoto']['name']));

						$message[ 'type' ]		= 'success';
						$message['text'][ 'upload' ]	=	$_FILES["profielfoto"]["name"];
						$message['text'][ 'type' ]		=	$_FILES["profielfoto"]["type"];
						$message['text'][ 'size' ]		=	( $_FILES["profielfoto"]["size"] / 1024 ) . 'kb';
						$message['text'][ 'tmp_filename' ]	=	 $_FILES["profielfoto"]["tmp_name"];
						$message['text'][ 'opgeslagen_in' ]	=	ROOT . "/img/" . $_FILES["profielfoto"]["name"];
					}
				}
			} else {

				throw new Exception("Ongeldig bestand");
				
			}
		}
		
	} catch (Exception $e) {

		$message['type'] = "error";
		$message['text'] = $e->getMessage();
		
	}

?>