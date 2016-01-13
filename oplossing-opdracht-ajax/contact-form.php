<!DOCTYPE html>

<?php

	session_start();
	$message = "";
	$kopie = "";

	if (isset($_SESSION['contact'])) {
		$email = $_SESSION['contact']['email'];
		$boodschap = $_SESSION['contact']['boodschap'];
		$kopie = $_SESSION['contact']['kopie'];
	}

	if (isset($_SESSION['message'])) {
		$message = $_SESSION['message'];
	}


?>


<html>
	<head>


	</head>



	<body>
		<h1>Contacteer ons</h1>

		<p class="error"><?= $message ?></p> 

		<div = id="form-holder">

			<form action="contact.php" method="POST" id="mailForm">

				<ul>

					<li>

						<label for="email">E-mailadres</label><br />
						<input type="text" name="email" id="email" value="<?= (isset($email))? $email : '' ?>">

					</li>

					<li>

						<label for="boodschap">Boodschap</label><br />
						<textarea name="boodschap" id="boodschap" value="<?= (isset($boodschap))? $boodschap : '' ?>"></textarea>

					</li>

					<li>

						<input type="checkbox" name="kopie" id="kopie" <?= $kopie ?>><label for="kopie">Stuur een kopie naar mezelf</label>

					</li>

					<li>

						<input type="submit" name="submit">

					</li>

				</ul>

			</form>

		</div>

		<pre>

			<?= var_dump($_SESSION) ?>

		</pre>

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

		<script>
			$(function(){

				$('#mailForm').submit(function(){

					var dataForm = $('#mailForm').serialize();

					$.ajax({

						type: 'POST', url: 'contact-API.php', data: dataForm, success: function(data)
							{
								data = JSON.parse(data);

								if (data['type'] == "success")
								{
									$('#form-holder form').fadeOut('slow', function()
									{
										$('#form-holder').append('<p id="modal">Bedankt! Uw bericht is goed verzonden!</p>').hide().fadeIn('slow');
									});
											
								}
								else if (data['type'] == "error")
								{
									$('#form-holder').prepend('<p id="modal">Oeps, er ging iets mis. Probeer opnieuw!</p>')
									$('#modal').hide().fadeIn('slow');
								}
							}
						})
				
					return false;
				})
			})
		</script>

	</body>
</html>