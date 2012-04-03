<?php 
session_start();

if( isset($_POST['submit'])) {
   if( $_SESSION['security_code'] == $_POST['security_code'] && !empty($_SESSION['security_code'] ) ) {
		
		echo 'Captcha recopié correctement';
		unset($_SESSION['security_code']);
   } else {
		
		echo 'Captcha recopié incorrectement';
   }
} else {
?>

	<form action="form.php" method="post">
		<label for="name">Nom: </label><input type="text" name="name" id="name" /><br />
		<label for="email">Email: </label><input type="text" name="email" id="email" /><br />
		<img src="Captcha.php?width=100&height=40&characters=5" /><br />
		<label for="security_code">Code de sécurité: </label><input id="security_code" name="security_code" type="text" /><br />
		<input type="submit" name="submit" value="Submit" />
	</form>

<?php
	}
?>