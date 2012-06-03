<?php
try
{
mysql_connect("localhost", "root", "");
mysql_select_db("Poupipou");
    
    

    mysql_query("INSERT INTO avis  VALUES('', '" . $_POST['pseudo'] . "','". $_POST['message']."','". $_POST['id_resto']."')");
    
    // Redirection du visiteur vers la page du minichat
    header('Location: indexr.php?id='.$_POST[id_resto]);
    
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}


?>
