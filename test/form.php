

<?php 
session_start();
header('content-type: text/html; charset=utf-8');


if( isset($_POST['envoi'])) {
if (isset($_POST['security_code'])){
         
   if( $_SESSION['security_code'] == $_POST['security_code'] && !empty($_SESSION['security_code'])){		
		echo 'Captcha recopi� correctement';
		unset($_SESSION['security_code']);
	}
	
    else {
		
		echo 'Captcha recopi� incorrectement';
   }
   }
   else { 
   echo 'captcha non recopi�';
   }
   }
   else {
?>
<?php
include("formulaire.php");
?>
	<form action="form.php" method="post">
		<img src="Captcha.php?width=100&height=40&characters=5" /><br />
		<label for="security_code">Recopiez le code: </label><input id="security_code" name="security_code" type="text" value="recopiez ici" /><br />
		
	</form>

<?php
	}
?>