<!DOCTYPE html>

<?php
	session_start();

	$leegToDoLijst = true;
	$toDoLijst = array();

	$leegDoneLijst = true;
	$doneLijst = array();

	$var = "";

	// Wanneer je op een element in de done lijst klikt wordt dat element in $_SESSION['TODO'] array gestoken en zal het element ge-unset worden uit de $_SESSION['done'] array
	if (isset($_GET['done'])) {
		$_SESSION['TODO'][] = $_GET['done'];
		$var = $_GET['value'];

		unset($_SESSION['done'][$var]);
		$_SESSION['done'] = array_values($_SESSION['done']);
	}

	// Wanneer je op een element in de to do lijst klikt wordt dat element in $_SESSION['done'] array gestoken en zal het element ge-unset worden uit de $_SESSION['TODO'] array
	if (isset($_GET['toDo'])) {
		$_SESSION['done'][] = $_GET['toDo'];
		$var = $_GET['value'];

		unset($_SESSION['TODO'][$var]);
		$_SESSION['TODO'] = array_values($_SESSION['TODO']);
	}

	// Steek alles van $_SESSION['done'] in de array variabele $doneLijst
	if (isset($_SESSION['done'])) {
		$doneLijst = $_SESSION['done'];
	}

	// Als er een element in de $doneLijst zit is $leegToDolijst gelijk aan false
	if (count($doneLijst) > 0) {
		$leegDoneLijst = false;
	}

	// Wanneer je klikt op de button toevoegen zal het woord dat je geschreven hebt toegevoegd worden in $_SESSION['TODO'] array
	if (isset($_POST["toevoegen"])) {
			$_SESSION['TODO'][] = $_POST['beschrijving'];
		}

	// Steek alles van $_SESSION['TODO'] in de array variabele $toDoLijst
	if (isset($_SESSION['TODO'])) {
		$toDoLijst = $_SESSION['TODO'];
	}

	// Als er een element in de $toDoLijst zit is $leegToDoLijst gelijk aan false
	if ( count( $toDoLijst ) > 0 )
	{
		$leegToDoLijst = false;
	}

	// Verwijder element uit to do lijst
	if (isset($_POST["deleteToDo"])) {
		$var = $_POST["deleteToDo"];

		unset($_SESSION['TODO'][$var]);
		$_SESSION['TODO'] = array_values($_SESSION['TODO']);

		header('Location: index.php');
	}

	// Verwijder element uit done lijst
	if (isset($_POST['deleteDone'])) {
		$var = $_POST['deleteDone'];

		unset($_SESSION['done'][$var]);
		$_SESSION['done'] = array_values($_SESSION['done']);

		header('Location: index.php');
	}

?>

<html>
<head>

	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>


<body>
	<div class="container">
		<h1 class="titel">Todo app</h1>

		<?php if($leegToDoLijst && $leegDoneLijst): ?>
			<p>Je hebt nog geen TODO's toegevoegd.</p>
		<?php endif ?>

		<?php if(!$leegToDoLijst || !$leegDoneLijst): ?>

			<h3>Nog te doen</h2>

			<ul>
				<?php $toDoIndex = 0; foreach ($toDoLijst as $toDo): ?>
					<form action="index.php" method="post">
						<li class="notDone"><a href="index.php?toDo=<?= $toDo ?>&value=<?= $toDoIndex ?>"><?= $toDo ?></a> <button title="verwijderen" name="deleteToDo" value="<?= $toDoIndex++ ?>">Verwijderen</button></li>
					</form>
				<?php endforeach ?> 
			</ul>

			<?php if($leegToDoLijst && !$leegDoneLijst): ?>
				<p>Schouderklopje, alles is gedaan!</p>
			<?php endif ?>

			<h3>Done and done</h2>
		<?php endif ?>

		<?php if(!$leegDoneLijst || $leegToDoLijst): ?>

			<ul>
				<?php $doneIndex = 0; foreach ($doneLijst as $done): ?>
					<form action="index.php" method="post">
						<li class="green"><a href="index.php?done=<?= $done ?>&value=<?= $doneIndex ?>"><?= $done ?></a> <button title="verwijderen" name="deleteDone" value="<?= $doneIndex++ ?>">Verwijderen</button></li>
					</form>
				<?php endforeach ?> 
			</ul>

			<?php else: ?>
				<p>Er is nog werk aan de winkel.</p>
			<?php endif ?>

		<h2>Todo toevoegen</h1>

		<form action="index.php" method="post">
			<label for="beschrijving">Beschrijving: </label>
			<input type="text" name="beschrijving" id="beschrijving" autofocus>

			<button type="submit" name="toevoegen">Toevoegen</button>
		</form>

	</div>
</body>
</html>