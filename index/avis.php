
    <body>
 
    <form action="avis_post.php" method="post">
        <p>
        <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" /><br />
        <label for="message">Message</label> :  <INPUT Type="text" Name="message" COLS="10" ROWS="4"><br />
        <input type="hidden" name="id_resto" value="<?php echo $_GET['id']; ?>" />
        <input type="submit" value="Envoyer" />
	</p>
    </form>
 
   
 
<?php


// Connexion à la base de données
try
{$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=Poupipou', 'root', '', $pdo_options);
    // Récupération des 10 derniers messages
    $reponse = $bdd->query('SELECT * FROM avis WHERE id_resto=\''. $_GET['id'].'\'');
    
    // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
    while ($donnees = $reponse->fetch())
    {
        echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
    }
    
    $reponse->closeCursor();
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

?>
</body>

