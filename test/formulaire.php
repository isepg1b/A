<?php 
if(!isset($_SESSION))
{
session_start();
}

?>

<?php
	
	// on entre notre adresse mail
	$destinataire = 'ac.vignaud@gmail.com';

	// on envoi une copie au visiteur
	$copie = 'oui';

	$form_action = '';

	// on confirme l'envoi au visiteur
	$message_envoye = "Votre message nous est bien parvenu !";
	$message_non_envoye = "L'envoi du mail a échoué, veuillez réessayer SVP.";
	$message_formulaire_invalide = "Vérifiez que tous les champs soient bien remplis et que l'email soit sans erreur.";

	

	/*
	 * on enlève les espaces
	 */
	function Rec($text)
	{
		$text = trim($text);
		if (1 === get_magic_quotes_gpc())
		{
			$stripslashes = create_function('$txt', 'return stripslashes($txt);');
		}
		else
		{
			$stripslashes = create_function('$txt', 'return $txt;');
		}

		// magic quotes ?
		$text = $stripslashes($text);
		$text = htmlspecialchars($text, ENT_QUOTES); // converts to string with " and ' as well
		$text = nl2br($text);
		return $text;
	};

	/*
	 *On verifie que l'email est valide
	 */
	function IsEmail($email)
	{
		
		return (preg_match('/^([a-z0-9_]|\\-|\\.)+@(([a-z0-9_]|\\-)+\\.)+[a-z]{2,7}$/',$email)) ? true : false;
	};

	$err_formulaire = false; 

	// récupération des entrées
	$nom     = (isset($_POST['nom']))     ? Rec($_POST['nom'])     : '';
	$email   = (isset($_POST['email']))   ? Rec($_POST['email'])   : '';
	$objet   = (isset($_POST['objet']))   ? Rec($_POST['objet'])   : '';
	$message = (isset($_POST['message'])) ? Rec($_POST['message']) : '';

	if (isset($_POST['envoi']))
	{
		
		$email = (IsEmail($email)) ? $email : ''; 
		$err_formulaire = (IsEmail($email)) ? false : true;

		if (($nom != '') && ($email != '') && ($objet != '') && ($message != ''))
		{
		
			$headers = 'From: '.$nom.' <'.$email.'>' . "\r\n";

			// copie
			if ($copie == 'oui')
			{
				$cible = $destinataire.','.$email;
			}
			else
			{
				$cible = $destinataire;
			};

			// On remplace certains caractères spéciaux
			$message = html_entity_decode($message);
			$message = str_replace('&#039;',"'",$message);
			$message = str_replace('&#8217;',"'",$message);
			$message = str_replace('<br>','',$message);
			$message = str_replace('<br />','',$message);

			// On envoi le mail
			if (mail($cible, $objet, $message, $headers))
			{
				echo '<p>'.$message_envoye.'</p>'."\n";
			}
			else
			{
				echo '<p>'.$message_non_envoye.'</p>'."\n";
			};
		}
		else
		{
			// une des trois entrées est non remplie
			echo '<p>'.$message_formulaire_invalide.' <a href="formulaire.php">Retour au formulaire</a></p>'."\n";
			$err_formulaire = true;
		};
	}; // fin du if (!isset($_POST['envoi']))

	if (($err_formulaire) || (!isset($_POST['envoi'])))
	{
		// afficher le formulaire
		echo '<form id="contact" method="post" action="'.$form_action.'">'."\n";
		echo '	<fieldset><legend>Vos coordonnées</legend>'."\n";
		echo '		<p>'."\n";
		echo '			<label for="nom">Nom :</label>'."\n";
		echo '			<input type="text" id="nom" name="nom" value="'.stripslashes($nom).'" tabindex="1" />'."\n";
		echo '		</p>'."\n";
		echo '		<p>'."\n";
		echo '			<label for="email">Email :</label>'."\n";
		echo '			<input type="text" id="email" name="email" value="'.stripslashes($email).'" tabindex="2" />'."\n";
		echo '		</p>'."\n";
		echo '	</fieldset>'."\n";

		echo '	<fieldset><legend>Votre message :</legend>'."\n";
		echo '		<p>'."\n";
		echo '			<label for="objet">Objet :</label>'."\n";
		echo '			<input type="text" id="objet" name="objet" value="'.stripslashes($objet).'" tabindex="3" />'."\n";
		echo '		</p>'."\n";
		echo '		<p>'."\n";
		echo '			<label for="message">Message :</label>'."\n";
		echo '			<textarea id="message" name="message" tabindex="4" cols="30" rows="8">'.stripslashes($message).'</textarea>'."\n";
		echo '		</p>'."\n";
		echo '	</fieldset>'."\n";

		echo '	<div style="text-align:center;"><input type="submit" name="envoi" value="Envoyer le formulaire !" /></div>'."\n";
		echo '</form>'."\n";
	};
?>