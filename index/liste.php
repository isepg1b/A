 <?php include('header.php'); ?> 
       <title>Liste des restaurants</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <div id="liste" >
<h2><a href="rediger.php">Ajouter un restaurant</a></h2>
<?php
mysql_connect("localhost", "root", "");
mysql_select_db("Poupipou");

if (isset($_POST['titre']) AND isset($_POST['contenu']))
{
    $titre = addslashes($_POST['titre']);
    $adresse = addslashes($_POST['adresse']);
    $pays = addslashes($_POST['pays']);
    $tel = addslashes($_POST['tel']);
    $mail = addslashes($_POST['mail']);
    $contenu = addslashes($_POST['contenu']);
    $ville = addslashes($_POST['ville']);
    $codepostal = addslashes($_POST['codepostal']);
    $type = addslashes($_POST['type']);
    $caracs = addslashes($_POST['caracs']);
    $description = addslashes($_POST['description']);
    $nourriture = addslashes($_POST['nourriture']);
    $prixmoyen = addslashes($_POST['prixmoyen']);
    $img1 = stripslashes($_POST['img1']);
    $img2 = stripslashes($_POST['img2']);
    $img3 = stripslashes($_POST['img3']);
    $img4 = stripslashes($_POST['img4']);
    $img5 = stripslashes($_POST['img5']);

    
    if ($_POST['id_news'] == 0)
    {
        // Ce n'est pas une modification, on crée une nouvelle entrée dans la table.
        mysql_query("INSERT INTO restaurant2 VALUES('', '" . $titre . "', '" . $contenu . "', '" . time() . "', '" . $adresse . ", '" . time() . "'','" . $pays . "', '" . $tel . "', '" . $mail . "', '" . $codepostal . "', '" . $ville . "', '" . $type . "', '" . $caracs . "', '" . $description . "', '" . $nourriture . "', '" . $prixmoyen . "', '" . $img1 . "', '" . $img2 . "', '" . $img3 . "', '" . $img4 . "', '" . $img5 . "')");
    }
    else
    {
        
        $_POST['id_news'] = addslashes($_POST['id_news']);
        // C'est une modification, on met juste à jour le titre et le contenu.
        mysql_query("UPDATE restaurant2 SET titre='" . $titre . "', contenu='" . $contenu . "', adresse='" . $adresse . "', pays='" . $pays . "', tel='" . $tel . "', mail='" . $mail . "', codepostal='" . $codepostal . "', ville= '" . $ville . "', type='" . $type . "', caracs='" . $caracs . "', description='" . $description . "', nourriture='" . $nourriture . "', prixmoyen='" . $prixmoyen . "', img1='" . $img1 . "', img2='" . $img2 . "', img3='" . $img3 . "', img4='" . $img4 . "', img5='" . $img5 . "'   WHERE id='" . $_POST['id_news'] . "'");
    }
}

if (isset($_GET['supprimer'])) // Si l'on demande de supprimer une news.
{

    $_GET['supprimer'] = addslashes($_GET['supprimer']);
    mysql_query('DELETE FROM restaurant2 WHERE id=\'' . $_GET['supprimer'] . '\'');
}
?>
<table><tr>
<th>Modifier</th>
<th>Supprimer</th>
<th>Titre</th>
<th>Date</th>
</tr>
<?php
$retour = mysql_query('SELECT * FROM restaurant2 ORDER BY id DESC');
while ($donnees = mysql_fetch_array($retour)) // On fait une boucle pour lister les news.
{
?>
<tr>
<td><?php echo '<a href="rediger.php?modifier=' . $donnees['id'] . '">'; ?>Modifier</a></td>
<td><?php echo '<a href="liste.php?supprimer=' . $donnees['id'] . '">'; ?>Supprimer</a></td>
<td><?php echo stripslashes($donnees['titre']); ?></td>
<td><?php echo date('d/m/Y', $donnees['timestamp']); ?></td>
</tr>
<?php
} 


?>
</table>
</div>
<?php include('footer.php'); ?> 