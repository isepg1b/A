<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
       <title>Création de restaurant</title>
       <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <style type="text/css">
        h3
        {
            text-align:center;
                   }  
        </style>
    </head>
    
    <body>
<h3><a href="liste.php">Retour à la liste des restaurants</a></h3>
<?php
mysql_connect("localhost", "root", "");
mysql_select_db("Poupipou");
if (isset($_GET['modifier'])) 
{
    
    $_GET['modifier'] = mysql_real_escape_string(htmlspecialchars($_GET['modifier']));
    
    $retour = mysql_query('SELECT * FROM restaurant2 WHERE id=\'' . $_GET['modifier'] . '\'');
    $donnees = mysql_fetch_array($retour);
    
    // On place le titre et le contenu dans des variables simples.
    $titre = stripslashes($donnees['titre']);
    $adresse = stripslashes($donnees['adresse']);
    $pays = stripslashes($donnees['pays']);
    $tel = stripslashes($donnees['tel']);
    $mail = stripslashes($donnees['mail']);
    $contenu = stripslashes($donnees['contenu']);
    $id_news = $donnees['id']; // Cette variable va servir pour se souvenir que c'est une modification.
}
else 
{
  
    $titre = '';
    $contenu = '';
    $adresse='';
    $id_news = 0; // La variable vaut 0, donc on se souviendra que ce n'est pas une modification.
}
?>
<form action="liste.php" method="post">
<p>Nom : <input type="text" size="30" name="titre" value="<?php echo $titre; ?>" /></p>

<p>
    <p>Adresse : <input type="text" size="40" name="nom_resto" value="<?php echo $adresse; ?>" />
    Code postal: <input type="text" size="20" name="nom_resto" value="<?php echo $codepostal; ?>" />
    Pays: <input type="text" size="20" name="nom_resto" value="<?php echo $pays; ?>" />
    Ville : <input type="text" size="30" name="nom_resto" value="<?php echo $ville; ?>" /></p>

Telephone : <input type="int" size="10" name="tel" value="<?php echo $tel; ?>" />
Mail : <input type="mail" size="20" name="mail" value="<?php echo $mail; ?>" />

 <p>Type : <input type="text" size="30" name="nom_resto" value="<?php echo $Type; ?>" />
    3 caracs: <input type="text" size="30" name="nom_resto" value="<?php echo $caracs; ?>" /></p>
<p>
<p>
    Contenu :<br />
    <textarea class="ckeditor" cols="50" id="editor1" name="contenu" rows="10"><?php echo $contenu; ?></textarea>
    </textarea><br />
    Carte du restaurant :<br />
    <textarea class="ckeditor" cols="80" id="editor2" name="description" rows="10"><?php echo $description; ?></textarea><br />
    <p>Type de nourriture: <input type="text" size="30" name="nom_resto" value="<?php echo $nourriture; ?>" /></p>
<p>
          <p>Prix moyen : <input type="text" size="10" name="nom_resto" value="<?php echo $prixmoyen; ?>" /></p>
<p>
    <input type="hidden" name="id_news" value="<?php echo $id_news; ?>" />
    <input type="submit" value="Envoyer" />
</p>
	</form>
	
</body>
</html>
