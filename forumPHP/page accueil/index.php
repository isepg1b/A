<?php
//Cette fonction doit être appelée avant tout code html
session_start();

//On donne ensuite un titre à la page, puis on appelle notre fichier debut.php
$titre = "Index du forum";
include("includes/debut.php");
include("includes/identifiant.php");
include("connexion.php");
include("modeleaccueil.php");
include("afficheforum.php");



function verif_auth($auth_necessaire)
{
$level=(isset($_SESSION['level']))?$_SESSION['level']:1;
return ($auth_necessaire <= intval($level));
}



//Initialisation de deux variables
$totaldesmessages = 0;
$categorie = NULL;


//Cette requête permet d'obtenir tout sur le forum


$query = sqldebut($lvl,$db);

$query->execute();

//Début de la boucle
while($data = $query->fetch())
{

    if( $categorie != $data['cat_id'] )
    {  
        $categorie = $data['cat_id'];     
     entete();        
    }

    //Ici, on met le contenu de chaque catégorie
   
    
if (verif_auth($data['auth_view']))
{
//Affichage des forums, détail des catégories....

categories ($data['forum_id'], $data['forum_name'],$data['forum_desc'],$data['forum_topic'],$data['forum_post']);
    // Deux cas possibles : Soit il y a un nouveau message, soit le forum est vide
    
    if (!empty($data['forum_post']))
    {
         //Selection dernier message
	 	$nombreDeMessagesParPage = 15;
        $nbr_post = $data['topic_post'] +1;
	 	$page = ceil($nbr_post / $nombreDeMessagesParPage);
		 
       derniermessage($data['post_time'],$data['membre_id'],$data['membre_pseudo'],$data['topic_id'],$data['post_id']);
     }
     else
     {
         pasdemessage();
     }
}
     //Cette variable stock le nombre de messages, on la met à jour
     $totaldesmessages += $data['forum_post'];

     //On ferme notre boucle et nos balises
} //fin de la boucle

$query->CloseCursor();

footer();

//On compte les membres
$TotalDesMembres = sqltotalmembre($db);

	
$query=sqlclassementmembres($db);
$data = $query->fetch();
$derniermembre = stripslashes(htmlspecialchars($data['membre_pseudo']));


quiestenligne($data['membre_id']);

$query->CloseCursor();

?>
</div>
</body>
</html>
