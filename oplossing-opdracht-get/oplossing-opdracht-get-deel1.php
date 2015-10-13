<?php

	/*$artikels = array(
		"titel" => array("Zware hinder voor tram- en busverkeerd door nationale betoging",
						"2.500 deelnemers van loopwedstrijd gewaarschuwd voor rattenziekte",
						"Studentenevenement stilgelegd en deelnemer opgepakt na grap op Twitter"),

		"datum" => array("7 oktober 2015", "3 oktober 2015", "1 oktober 2015"),

		"inhoud" => array("Volgens een eerste raming zijn twee op de drie bussen uitgereden, maar in de provincies Antwerpen en Oost-Vlaanderen en op alle stadsnetten is het busverkeer veel zwaarder verstoord.",
							"Al zeker drie deelnemers van de 'Titan Run' in Nijlen bij Lier werden in het ziekenhuis opgenomen met leptospirose of rattenziekte. Het Agentschap Zorg en Gezondheid heeft nu naar alle deelnemers een brief gestuurd.",
							"In Antwerpen heeft de politie gisterenavond met veel machtsvertoon het ING-gebouw ontruimd, waar op dat moment een studentenevenement plaatsvond. Een van de deelnemers werd ook opgepakt. Aanleiding?
							 Een - wellicht ironisch bedoeld - Twitterbericht van de bewuste jongeman. De advocaat van de Twitteraar is scherp voor de politie, maar die blijft achter haar aanpak staan."),
		
		"afbeelding" => array('<img src="img\nationaleBetoging.jpg">',
							'<img src="img\rattenziekte.jpg">',
							'<img src="img\ing-gebouw.jpg">'),
		
		"afbeeldingBeschrijving" => array("Mensen aan de kant van het straat die wachten op de tram.",
										"Mensen die lopen in de modder.",
										"Voorkant ING-gebouw in de Gasthuisstraat."));*/

	$artikels = 	array( 
						array( 
							"titel" => "Zware hinder voor tram- en busverkeerd door nationale betoging",
							"datum" => "7 oktober 2015",
							"inhoud" => "Volgens een eerste raming zijn twee op de drie bussen uitgereden, maar in de provincies Antwerpen en Oost-Vlaanderen en op alle stadsnetten is het busverkeer veel zwaarder verstoord.",
							"afbeelding" => '<img src="img\nationaleBetoging.jpg">',
							"afbeeldingBeschrijving" => "Mensen aan de kant van het straat die wachten op de tram."),
						array(
							"titel" => "2.500 deelnemers van loopwedstrijd gewaarschuwd voor rattenziekte",
							"datum" => "3 oktober 2015",
							"inhoud" => "Al zeker drie deelnemers van de 'Titan Run' in Nijlen bij Lier werden in het ziekenhuis opgenomen met leptospirose of rattenziekte. Het Agentschap Zorg en Gezondheid heeft nu naar alle deelnemers een brief gestuurd.",
							"afbeelding" => '<img src="img\rattenziekte.jpg">',
							"afbeeldingBeschrijving" => "Mensen die lopen in de modder."),
						array(
							"titel" => "Studentenevenement stilgelegd en deelnemer opgepakt na grap op Twitter",
							"datum" => "1 oktober 2015",
							"inhoud" => "In Antwerpen heeft de politie gisterenavond met veel machtsvertoon het ING-gebouw ontruimd, waar op dat moment een studentenevenement plaatsvond. Een van de deelnemers werd ook opgepakt. Aanleiding?
							 Een - wellicht ironisch bedoeld - Twitterbericht van de bewuste jongeman. De advocaat van de Twitteraar is scherp voor de politie, maar die blijft achter haar aanpak staan.",
							"afbeelding" => '<img src="img\ing-gebouw.jpg">',
							"afbeeldingBeschrijving" => "Voorkant ING-gebouw in de Gasthuisstraat.")
	)

	/*if (isset($_GET["id"])) {
		
	}*/

?>

<!DOCTYPE html>

<html>
	<head>

		<style>

			.artikel {
				float:left;
				width: 400px;
				margin:16px;
				padding:16px;
				box-sizing:border-box;
				background-color:#EEEEEE;
                            }

            img {
            	max-width: 100%;
            }

            .inhoud {
            	font-size: 21px;
            }

            h1 {
            	font-size: 25px;
            }

            h1:after {
            	content: " ";
            	display: block;
            	border: 2.5px solid lightgrey;
            	border-radius: 75px;
            	margin-top: 5px;
            }

            a {
            	float: right;
            }

		</style>

	</head>


	<body>

		<div class="artikels">
			<?php foreach ($artikels as $key => $artikel): ?>
				<article class="artikel">
					<h1> <?php echo $artikel["titel"] ?> </h1>
					<p> <?php echo $artikel["datum"] ?> </p>
					<p> <?php echo $artikel["afbeelding"] ?> </p>
					<p> <?php echo $artikel["afbeeldingBeschrijving"] ?> </p>
					<p class="inhoud"> <?php echo substr($artikel["inhoud"], 0, 100) . "..." ?> </p>
					<a href="index.php?id=<?= $key ?>">lees meer...</a>
				</article>
			<?php endforeach ?>
			

		</div>

	</body>
</html>