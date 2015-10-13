<?php

	$message = "Als het formulier niet gesubmit werd, kan er mogelijk een undefined variable-fout optreden, probeer dit op te lossen door bv. de variabele buiten de if ( isset ( ... ) ) te definiëren/een bepaalde waarde te geven.";
	$password = "azerty";
	$username = "sam";

	if (isset($_POST["submit"])) {
		if ($username == $_POST["gebruikersnaam"] && $password == $_POST["paswoord"]) {
			echo "Welkom";
		}
		else
		{
			echo "Er ging iets mis bij het inloggen, probeer opnieuw";
		}

	}
	else
	{
		echo "Submit is nog niet geset";
	}
?>

<!DOCTYPE html>

<html>

	<form action="oplossing-opdracht-post.php" method="post">

		<label>Gebruikersnaam: <input type="text" id="gebruikersnaam" name="gebruikersnaam" ></label>
		<br/>
		<label>Paswoord: <input type="password" id="paswoord" name="paswoord" ></label>
		<br/>
		<button tpye="submit" name="submit">Verzenden</button>
	</form>

	<p><?= $message ?></p>
</html>