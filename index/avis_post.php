<?php
try
{

    
    // Insertion du message à l'aide d'une requête préparée
$pseudo=$_POST['pseudo'];
    $req = $bdd->prepare('INSERT INTO avis (pseudo, message, id_resto) VALUES(?, ?, ?)');
    $req->execute(array($pseudo, $_POST['message'], $_POST['id_resto']));
    
    // Redirection du visiteur vers la page du minichat
    header('Location: indexr.php');
    
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}


?>
