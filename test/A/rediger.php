<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
       <title>Rédiger un restaurant</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <style type="text/css">
        h3, form
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
if (isset($_GET['modifier'])) // Si on demande de modifier une news.
{
    // On protège la variable « modifier_news » pour éviter une faille SQL.
    $_GET['modifier'] = mysql_real_escape_string(htmlspecialchars($_GET['modifier']));
    // On récupère les informations de la news correspondante.
    $retour = mysql_query('SELECT * FROM restaurant WHERE id=\'' . $_GET['modifier'] . '\'');
    $donnees = mysql_fetch_array($retour);
    
    // On place le titre et le contenu dans des variables simples.liste_news
    $titre = stripslashes($donnees['nom_resto']);
    $contenu = stripslashes($donnees['description']);
    $id_news = $donnees['id']; // Cette variable va servir pour se souvenir que c'est une modification.
}
else // C'est qu'on rédige une nouvelle news.
{
    // Les variables $titre et $contenu sont vides, puisque c'est une nouvelle news.
    $titre = '';
    $contenu = '';
    $id_news = 0; // La variable vaut 0, donc on se souviendra que ce n'est pas une modification.
}
?>
<form action="liste.php" method="post">
<p>Titre : <input type="text" size="30" name="nom_resto" value="<?php echo $titre; ?>" /></p>
<p>
    Contenu :<br />
    <textarea name="description" cols="50" rows="10">
    <?php echo $contenu; ?>
    </textarea><br />
    
    <input type="hidden" name="id_news" value="<?php echo $id_news; ?>" />
    <input type="submit" value="Envoyer" />
</p>
</form>
</body>
</html>
