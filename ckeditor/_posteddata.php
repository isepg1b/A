<?php
$value=$_POST['editor1'];
$db = mysql_connect('localhost', 'root', '')  or die('Erreur de connexion '.mysql_error());
// sélection de la base  

    mysql_select_db('Poupipou',$db)  or die('Erreur de selection '.mysql_error()); 
     
    // on écrit la requête sql 
    $sql = "INSERT INTO test VALUES('$value')"; 
     
    // on insère les informations du formulaire dans la table 
    mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error()); 

    // on affiche le résultat pour le visiteur 
    echo 'Vos infos on été ajoutées.'; 
     echo $value;

    mysql_close();  // on ferme la connexion 
    
?>