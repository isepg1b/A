


<div style='color:#e8e8e8; padding: 5px'>
<?php
include('config.php');

            $reponse = $bdd->query('SELECT * FROM restaurant2 WHERE id=\''. $_GET['id'].'\'');
    
   $donnees = $reponse->fetch(); 
echo $donnees['description'];
?>

</div>