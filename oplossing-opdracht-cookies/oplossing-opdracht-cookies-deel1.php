<?php

	$tekstBestand = file_get_contents("deel1.txt");
	$tekstBestandArray = explode(",", $tekstBestand);
	$username = $tekstBestandArray[0];
	$password = $tekstBestandArray[1];
	$welkomtekst = "Welkom";
	$error = '';
	$isAuthenticated = false;

	if (isset($_GET['cookie'])) {
		if ($_GET['cookie'] == 'delete') {
			setcookie('authenticated','', time() -361);
			header('location: oplossing-opdracht-cookies-deel1.php');
		}
	}

	if (isset($_POST['paswoord']) && isset($_POST['gebruikersnaam'])) {
		if ($_POST['paswoord'] == $password && $_POST['gebruikersnaam'] == $username) {
			echo var_dump("cookie set");
			setcookie('authenticated', TRUE, time() + 360);
			header('location: oplossing-opdracht-cookies-deel1.php');
		} else {
			$error = "Gebruikersnaam en/of paswoord niet correct. Probeer opnieuw.";
		}
	}
	

	if (isset($_COOKIE['authenticated'])) {
		$isAuthenticated = true;
	}
?>

<!DOCTYPE html>

<html>

	<?php if ($isAuthenticated): ?>
		<p>U bent ingelogd.</p>
		<a href="oplossing-opdracht-cookies-deel1.php?cookie=delete">Uitloggen</a>
	<?php else: ?>
		<?php if($error): ?>
			<p><?php echo $error ?></p>
		<?php endif ?>
		<form action="oplossing-opdracht-cookies-deel1.php" method="post">

			<label for="gebruikersnaam">gebruikersnaam: </label>
			<input type="text" name="gebruikersnaam" id="gebruikersnaam">

			<label for="paswoord">paswoord: </label>
			<input type="password" name="paswoord" id="paswoord">

			<button type="submit" name="verzenden">Verzenden</button>

		</form>
	<?php endif ?>
</html>