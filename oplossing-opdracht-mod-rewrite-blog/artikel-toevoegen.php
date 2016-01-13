<?php
	session_start();


	function redirect($url)
	{
		header('location: ' . $url);
	}

	$artikelToevoegenUrl = "artikels-toevoegen-form.php";
	$artikelOverzichtUrl = "artikel-overzicht.php";

	if (isset($_POST['submit'])) {
		if ($_POST['titel'] != ""
			&& $_POST['artikel'] != ""
			&& $_POST['kernwoorden'] != ""
			&& $_POST['datum'] != "")
		{

			$titel = $_POST['titel'];
			$artikel = $_POST['artikel'];
			$kernwoorden = $_POST['kernwoorden'];
			$datum = $_POST['datum'];

			$explodeDatum = explode('-', $datum);

			if (checkdate($explodeDatum[1], $explodeDatum[2], $explodeDatum[0]))
			{

				$_SESSION['debug']['datum'] = "datum is correct!";
				$_SESSION['debug']['datum'] = $datum;
				$_SESSION['debug']['artikel'] = $artikel;
				$_SESSION['debug']['kernwoorden'] = $kernwoorden;
				$_SESSION['debug']['titel'] = $titel;

				$db = new PDO('mysql:host=localhost;dbname=opdracht-mod-rewrite-blog', 'root', '');

				$nieuwArtikel = 'INSERT INTO artikels (titel, artikel, kernwoorden, datum)
								VALUES (:titel, :artikel, :kernwoorden, :datum)';

				$statement = $db->prepare($nieuwArtikel);

				$statement->bindValue(':titel', $titel);
				$statement->bindValue(':artikel', $artikel);
				$statement->bindValue(':kernwoorden', $kernwoorden);
				$statement->bindValue(':datum', $datum);

				if ($statement->execute())
				{
					
					$_SESSION['notification']['insert'] = "Artikel is toegevoegd";

					redirect($artikelOverzichtUrl);

				}
				else
				{
					
					$_SESSION['notification']['insert'] = "Artikel toevoegen is niet gelukt";

					$_SESSION['nieuwArtikel']['titel'] = $titel;
					$_SESSION['nieuwArtikel']['artikel'] = $artikel;
					$_SESSION['nieuwArtikel']['kernwoorden'] = $kernwoorden;
					$_SESSION['nieuwArtikel']['datum'] = $datum;

					redirect($artikelToevoegenUrl);
				}

			}
			else
			{

				$_SESSION['debug']['datum'] = "datum is niet correct!";

				$_SESSION['nieuwArtikel']['titel'] = $titel;
				$_SESSION['nieuwArtikel']['artikel'] = $artikel;
				$_SESSION['nieuwArtikel']['kernwoorden'] = $kernwoorden;
				$_SESSION['nieuwArtikel']['datum'] = "";

				redirect($artikelToevoegenUrl);

			}

			$_SESSION['debug']['invulVelden'] = "alle velden zijn ingevuld";

			redirect($artikelToevoegenUrl);

		}
		else
		{
			$_SESSION['debug']['invulVelden'] = "niet alle velden zijn ingevuld";

			$_SESSION['nieuwArtikel']['titel'] = $_POST['titel'];
			$_SESSION['nieuwArtikel']['artikel'] = $_POST['artikel'];
			$_SESSION['nieuwArtikel']['kernwoorden'] = $_POST['kernwoorden'];
			$_SESSION['nieuwArtikel']['datum'] = $_POST['datum'];


			redirect($artikelToevoegenUrl);
		}
	}


?>