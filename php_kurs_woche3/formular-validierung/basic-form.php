<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors',true);

?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tutorial: PHP Formular Spamschutz und Validierung – Spam Emails verhindern auch ohne Captcha</title>
		
	<link rel="stylesheet" href="css/style.css">
	<script>
		
	</script> 
	<style>
		/*Demo Formular Styles*/
		label { display:inline-block; width:100px; }
		input,textarea {border-radius: 0;}
		input { padding:5px; width:300px; }
		input[name="plz"] { width:60px; }
		input[name="city"] { width:235px; }
		input[type="submit"] { width:160px; background:#09F; }
		input[type="checkbox"] { width:20px; margin-right:10px; }
		textarea { width:410px; }
		span { color: #c00; }
		
		.terms{ display:none; }
	</style>   
</head>

<body>	
	<header>
		<h1>Formular-Validierung - Honeypot</h1>
	</header>
	<main class="container">
				
		<form id="phpform" method="post" action="basic-form.php">
	
			<p>
				<label for="name">Name<span>*</span></label>
				<input type="text" name="name" id="name" value="<?= $_POST['name'] ?? ''?>">
			</p>

			<p>
				<label for="phone">Telefon</label>
				<input type="text" name="phone" id="phone" value="<?= $_POST['phone'] ?? ''?>">
			</p>

			<p>
				<label for="email">Email<span>*</span></label>
				<input type="text" name="email" id="email" value="<?= $_POST['email'] ?? ''?>">
			</p>

			<p>
				<label for="url">Website</label>
				<input type="text" name="url" id="url" value="<?= $_POST['url'] ?? ''?>">
			</p>

			<p>
				<label for="street">Straße</label>
				<input type="text" name="street" id="street" value="<?= $_POST['street'] ?? ''?>">
			</p>

			<p>
				<label for="plz">PLZ/Stadt</label>
				<input type="text" name="plz" id="plz" value="<?= $_POST['plz'] ?? ''?>">
				<input type="text" name="city" value="<?= $_POST['city'] ?? ''?>">
			</p>

			<p>
				<label for="subject">Betreff</label>
				<input type="text" name="subject" id="subject" value="<?= $_POST['subject'] ?? ''?>">
			</p>

			<p>
				<label for="message">Nachricht<span>*</span></label><br />
				<textarea name="message" id="message" rows="8"><?= $_POST['message'] ?? ''?></textarea>
			</p>

			<p><input type="checkbox" name="gender" <?= (isset($_POST['gender'])) ? "checked" : ''?>><span>*</span> Ich versende keinen Spam</p>

			<p><input type="submit" name="submit" value="Absenden"></p>
	
			<div class="terms">
				Folgende Felder bitte frei lassen!
				<input type="checkbox" name="terms">
			</div>
		</form>
		<span>*</span>Pflichtangaben
	</main>
  

</body>
</html>