<?php
session_start();
$titre="Messages Privés";
$balises = true;
include("includes/identifiant.php");
include("includes/debut.php");
include("includes/bbcode.php");
include("includes/menu.php");

$action = (isset($_GET['action']))?htmlspecialchars($_GET['action']):'';

?>
<?php
switch($action) //On switch sur $action
{
case "consulter": //Si on veut lire un message
 
    echo'<p><i>Vous êtes ici</i> : <a href="./index.php">Index du forum</a> --> <a href="./messagesprives.php">Messagerie privée</a> --> Consulter un message</p>';
    $id_mess = (int) $_GET['id']; //On récupère la valeur de l'id
    echo '<h1>Consulter un message</h1><br /><br />';

    //La requête nous permet d'obtenir les infos sur ce message :
    $query = $db->prepare('SELECT  mp_expediteur, mp_receveur, mp_titre,               
    mp_time, mp_text, mp_lu, membre_id, membre_pseudo, membre_avatar,
    membre_localisation, membre_inscrit, membre_post, membre_signature
    FROM forum_mp
    LEFT JOIN forum_membres ON membre_id = mp_expediteur
    WHERE mp_id = :id');
    $query->bindValue(':id',$id_mess,PDO::PARAM_INT);
    $query->execute();
    $data=$query->fetch();

    // Attention ! Seul le receveur du mp peut le lire !
    if ($id != $data['mp_receveur']) erreur(ERR_WRONG_USER);
       
    //bouton de réponse
    echo'<p><a href="./messagesprives.php?action=repondre&amp;dest='.$data['mp_expediteur'].'">
    <img src="./images/repondre.gif" alt="Répondre" 
    title="Répondre à ce message" /></a></p>'; 

    ?>
<table>     
    <tr>
    <th class="vt_auteur"><strong>Auteur</strong></th>             
    <th class="vt_mess"><strong>Message</strong></th>       
    </tr>
    <tr>
    <td>
    <?php echo'<strong>
    <a href="./voirprofil.php?m='.$data['membre_id'].'&amp;action=consulter">
    '.stripslashes(htmlspecialchars($data['membre_pseudo'])).'</a></strong></td>
    <td>Posté à '.date('H\hi \l\e d M Y',$data['mp_time']).'</td>';
    ?>
    </tr>
    <tr>
    <td>
    <?php
        
    //Ici des infos sur le membre qui a envoyé le mp
    echo'<p><img src="./images/avatars/'.$data['membre_avatar'].'" alt="" />
    <br />Membre inscrit le '.date('d/m/Y',$data['membre_inscrit']).'
    <br />Messages : '.$data['membre_post'].'
    <br />Localisation : '.stripslashes(htmlspecialchars($data['membre_localisation'])).'</p>
    </td><td>';
    
        
    echo code(nl2br(stripslashes(htmlspecialchars($data['mp_text'])))).'
    <hr />'.code(nl2br(stripslashes(htmlspecialchars($data['membre_signature'])))).'
    </td></tr></table>';

    if ($data['mp_lu'] == 0) //Si le message n'a jamais été lu
    {
        $query->CloseCursor();
        $query=$db->prepare('UPDATE forum_mp 
        SET mp_lu = :lu
        WHERE mp_id= :id');
        $query->bindValue(':id',$id_mess, PDO::PARAM_INT);
        $query->bindValue(':lu','1', PDO::PARAM_STR);
        $query->execute();
        $query->CloseCursor();
    }
        
break; //La fin !
?>
