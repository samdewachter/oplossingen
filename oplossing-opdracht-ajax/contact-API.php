<?php

	session_start();

	$contact = 'contact-form.php';

	$verzonden = false;
	$kopieVerzonden = false;
	

	function redirect($url) {

		$redirectUrl = header('location: ' . $url);

		return $redirectUrl;
	}

	if (isset($_POST['submit'])) {
		$admin = "sam@test.be";
		$aan = $admin;
		$kopie = (isset($_POST['kopie'])) ? true : false;

		$db = new PDO('mysql:host=localhost;dbname=opdracht-mail', 'root', '');

		if ($_POST['email'] != ""
			&& $_POST['boodschap'] != "") {
			$titel = 'Vraag van ' . $_POST['email'];
			$bericht = $_POST['boodschap'];
			$afzender = $_POST['email'];

			$queryString = 'INSERT INTO contact_messages (email, message, time_sent)
							VALUES ( "' . $afzender . '", "' . $bericht . '", NOW())';

			$statement = $db->prepare($queryString);

			$statement->execute();

			mail($aan, $titel, $bericht);

			$verzonden = true;

			if ($kopie) {
			$aan = $afzender;

			mail($aan, $titel, $bericht);

			$kopieVerzonden = true;
		}

		}
		else 
		{
			if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
			{
				$ajaxMessage['type']	=	'error';
						
				echo json_encode($ajaxMessage);
			}
			else 
			{
				$_SESSION['contact']['email'] = (isset($_POST['email']))? $_POST['email'] : '';
				$_SESSION['contact']['boodschap'] = (isset($_POST['boodschap']))? $_POST['boodschap'] : '';
				$_SESSION['contact']['kopie'] = (isset($_POST['kopie']))? 'checked' : '';

				$_SESSION['message'] = "Gelieve alle velden in te vullen.";
			}			
		}

		if ($verzonden && $kopieVerzonden) {
			$_SESSION['message'] = "Kopie en mail zijn verzonden!";

			if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
					{
						$ajaxMessage['type']	=	'success';

						echo json_encode($ajaxMessage);
					}
					else
					{
						$_SESSION['message']	=	'Bedankt voor je bericht! We nemen zo snel mogelijk contact met je op.';

						unset($_SESSION['contact']);
					}

		}
		elseif ($verzonden) {
			$_SESSION['message'] = "Mail is verzonden";

			unset($_SESSION['contact']);
		}

		redirect($contact);
		
	}

?>