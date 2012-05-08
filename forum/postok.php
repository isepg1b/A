<?php
session_start();
$nom_resto="Poster";
include("includes/identifiant.php");
include("includes/debut.php");
include("includes/menu.php");
//On récupère la valeur de la variable action
$action = (isset($_GET['action']))?htmlspecialchars($_GET['action']):'';

// Si le membre n'est pas connecté, il est arrivé ici par erreur
if ($id==0) erreur(ERR_IS_CO);
?>
<?php
switch($action)
{
    //Premier cas : nouveau topic
    case "nouveautopic":
    //On passe le message dans une série de fonction
    $message = $_POST['message'];
    $mess = $_POST['mess'];

    //Pareil pour le titre
    $nom_resto = $_POST['titre'];

    //ici seulement, maintenant qu'on est sur qu'elle existe, on récupère la valeur de la variable f
    $forum = (int) $_GET['f'];
    $temps = time();

    if (empty($message) || empty($nom_resto))
    {
        echo'<p>Votre message ou votre titre est vide, 
        cliquez <a href="./poster.php?action=nouveautopic&amp;f='.$forum.'">ici</a> pour recommencer</p>';
    }
    else //Si jamais le message n'est pas vide
    {
        //On entre le topic dans la base de donnée en laissant
        //le champ topic_last_post à 0
        $query=$db->prepare('INSERT INTO forum_topic
        (forum_id, topic_titre, topic_createur, topic_vu, topic_time, topic_genre)
        VALUES(:forum, :titre, :id, 1, :temps, :mess)');
        $query->bindValue(':forum', $forum, PDO::PARAM_INT);
        $query->bindValue(':titre', $nom_resto, PDO::PARAM_STR);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->bindValue(':temps', $temps, PDO::PARAM_INT);
        $query->bindValue(':mess', $mess, PDO::PARAM_STR);
        $query->execute();


        $nouveautopic = $db->lastInsertId(); //Notre fameuse fonction !
        $query->CloseCursor(); 

        //Puis on entre le message
        $query=$db->prepare('INSERT INTO forum_post
        (post_createur, post_texte, post_time, topic_id, post_forum_id)
        VALUES (:id, :mess, :temps, :nouveautopic, :forum)');
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->bindValue(':mess', $message, PDO::PARAM_STR);
        $query->bindValue(':temps', $temps,PDO::PARAM_INT);
        $query->bindValue(':nouveautopic', (int) $nouveautopic, PDO::PARAM_INT);
        $query->bindValue(':forum', $forum, PDO::PARAM_INT);
        $query->execute();


        $nouveaupost = $db->lastInsertId(); //Encore notre fameuse fonction !
        $query->CloseCursor(); 


        //Ici on update comme prévu la valeur de topic_last_post et de topic_first_post
        $query=$db->prepare('UPDATE forum_topic
        SET topic_last_post = :nouveaupost,
        topic_first_post = :nouveaupost
        WHERE topic_id = :nouveautopic');
        $query->bindValue(':nouveaupost', (int) $nouveaupost, PDO::PARAM_INT);    
        $query->bindValue(':nouveautopic', (int) $nouveautopic, PDO::PARAM_INT);
        $query->execute();
        $query->CloseCursor();

        //Enfin on met à jour les tables forum_forum et forum_membres
        $query=$db->prepare('UPDATE forum_forum SET forum_post = forum_post + 1 ,forum_topic = forum_topic + 1, 
        forum_last_post_id = :nouveaupost
        WHERE forum_id = :forum');
        $query->bindValue(':nouveaupost', (int) $nouveaupost, PDO::PARAM_INT);    
        $query->bindValue(':forum', (int) $forum, PDO::PARAM_INT);
        $query->execute();
        $query->CloseCursor();
    
        $query=$db->prepare('UPDATE forum_membres SET membre_post = membre_post + 1 WHERE membre_id = :id');
        $query->bindValue(':id', $id, PDO::PARAM_INT);    
        $query->execute();
        $query->CloseCursor();

        //Et un petit message
        echo'<p>Votre message a bien été ajouté!<br /><br />Cliquez <a href="./index.php">ici</a> pour revenir à l index du forum<br />
        Cliquez <a href="./voirtopic.php?t='.$nouveautopic.'">ici</a> pour le voir</p>';
    }
    break; //Houra !
?>
<?php
    //Deuxième cas : répondre
    case "repondre":
    $message = $_POST['message'];

    //ici seulement, maintenant qu'on est sur qu'elle existe, on récupère la valeur de la variable t
    $topic = (int) $_GET['t'];
    $temps = time();

    if (empty($message))
    {
        echo'<p>Votre message est vide, cliquez <a href="./poster.php?action=repondre&amp;t='.$topic.'">ici</a> pour recommencer</p>';
    }
    else //Sinon, si le message n'est pas vide
    {

        //On récupère l'id du forum
        $query=$db->prepare('SELECT forum_id, topic_post FROM forum_topic WHERE topic_id = :topic');
        $query->bindValue(':topic', $topic, PDO::PARAM_INT);    
        $query->execute();
        $data=$query->fetch();
        $forum = $data['forum_id'];

        //Puis on entre le message
        $query=$db->prepare('INSERT INTO forum_post
        (post_createur, post_texte, post_time, topic_id, post_forum_id)
        VALUES(:id,:mess,:temps,:topic,:forum)');
        $query->bindValue(':id', $id, PDO::PARAM_INT);   
        $query->bindValue(':mess', $message, PDO::PARAM_STR);  
        $query->bindValue(':temps', $temps, PDO::PARAM_INT);  
        $query->bindValue(':topic', $topic, PDO::PARAM_INT);   
        $query->bindValue(':forum', $forum, PDO::PARAM_INT); 
        $query->execute();

        $nouveaupost = $db->lastInsertId();
        $query->CloseCursor(); 

        //On change un peu la table forum_topic
        $query=$db->prepare('UPDATE forum_topic SET topic_post = topic_post + 1, topic_last_post = :nouveaupost WHERE topic_id =:topic');
        $query->bindValue(':nouveaupost', (int) $nouveaupost, PDO::PARAM_INT);   
        $query->bindValue(':topic', (int) $topic, PDO::PARAM_INT); 
        $query->execute();
        $query->CloseCursor(); 

        //Puis même combat sur les 2 autres tables
        $query=$db->prepare('UPDATE forum_forum SET forum_post = forum_post + 1 , forum_last_post_id = :nouveaupost WHERE forum_id = :forum');
        $query->bindValue(':nouveaupost', (int) $nouveaupost, PDO::PARAM_INT);   
        $query->bindValue(':forum', (int) $forum, PDO::PARAM_INT); 
        $query->execute();
        $query->CloseCursor(); 

        $query=$db->prepare('UPDATE forum_membres SET membre_post = membre_post + 1 WHERE membre_id = :id');
        $query->bindValue(':id', $id, PDO::PARAM_INT); 
        $query->execute();
        $query->CloseCursor(); 

        //Et un petit message
        $nombreDeMessagesParPage = 15;
        $nbr_post = $data['topic_post']+1;
        $page = ceil($nbr_post / $nombreDeMessagesParPage);
        echo'<p>Votre message a bien été ajouté!<br /><br />
        Cliquez <a href="./index.php">ici</a> pour revenir à l index du forum<br />
        Cliquez <a href="./voirtopic.php?t='.$topic.'&amp;page='.$page.'#p_'.$nouveaupost.'">ici</a> pour le voir</p>';
    }//Fin du else
    break;

case "nouveau": //Nouveau mp
       
   echo'<p><i>Vous êtes ici</i> : <a href="./index.php">Index du forum</a> --> <a href="./messagesprives.php">Messagerie privée</a> --> Ecrire un message</p>';
   echo '<h1>Nouveau message privé</h1><br /><br />';
   ?>
   <form method="post" action="postok.php?action=nouveaump" name="formulaire">
   <p>
   <label for="to">Envoyer à : </label>
   <input type="text" size="30" id="to" name="to" />
   <br />
   <label for="titre">Titre : </label>
   <input type="text" size="80" id="titre" name="titre" />
   <br /><br />
   <input type="button" id="gras" name="gras" value="Gras" onClick="javascript:bbcode('[g]', '[/g]');return(false)" />
   <input type="button" id="italic" name="italic" value="Italic" onClick="javascript:bbcode('[i]', '[/i]');return(false)" />
   <input type="button" id="souligné" name="souligné" value="Souligné" onClick="javascript:bbcode('[s]', '[/s]');return(false)" />
   <input type="button" id="lien" name="lien" value="Lien" onClick="javascript:bbcode('[url]', '[/url]');return(false)" />
   <br /><br />
   <img src="./images/smileys/heureux.gif" title="heureux" alt="heureux" onClick="javascript:smilies(':D');return(false)" />
   <img src="./images/smileys/lol.gif" title="lol" alt="lol" onClick="javascript:smilies(':lol:');return(false)" />
   <img src="./images/smileys/triste.gif" title="triste" alt="triste" onClick="javascript:smilies(':triste:');return(false)" />
   <img src="./images/smileys/cool.gif" title="cool" alt="cool" onClick="javascript:smilies(':frime:');return(false)" />
   <img src="./images/smileys/rire.gif" title="rire" alt="rire" onClick="javascript:smilies('XD');return(false)" />
   <img src="./images/smileys/confus.gif" title="confus" alt="confus" onClick="javascript:smilies(':s');return(false)" />
   <img src="./images/smileys/choc.gif" title="choc" alt="choc" onClick="javascript:smilies(':O');return(false)" />
   <img src="./images/smileys/question.gif" title="?" alt="?" onClick="javascript:smilies(':interrogation:');return(false)" />
   <img src="./images/smileys/exclamation.gif" title="!" alt="!" onClick="javascript:smilies(':exclamation:');return(false)" />

   <textarea cols="80" rows="8" id="message" name="message"></textarea>
   <br />
   <input type="submit" name="submit" value="Envoyer" />
   <input type="reset" name="Effacer" value="Effacer" /></p>
   </form>

<?php   
break;

case "repondre": //On veut répondre
   echo'<p><i>Vous êtes ici</i> : <a href="./index.php">Index du forum</a> --> <a href="./messagesprives.php">Messagerie privée</a> --> Ecrire un message</p>';
   echo '<h1>Répondre à un message privé</h1><br /><br />';

   $dest = (int) $_GET['dest'];
   ?>
   <form method="post" action="postok.php?action=repondremp&amp;dest=<?php echo $dest ?>" name="formulaire">
   <p>
   <label for="titre">Titre : </label><input type="text" size="80" id="titre" name="titre" />
   <br /><br />
   <input type="button" id="gras" name="gras" value="Gras" onClick="javascript:bbcode('[g]', '[/g]');return(false)" />
   <input type="button" id="italic" name="italic" value="Italic" onClick="javascript:bbcode('[i]', '[/i]');return(false)" />
   <input type="button" id="souligné" name="souligné" value="Souligné" onClick="javascript:bbcode('[s]', '[/s]');return(false)" />
   <input type="button" id="lien" name="lien" value="Lien" onClick="javascript:bbcode('[url]', '[/url]');return(false)" />
   <br /><br />
   <img src="./images/smileys/heureux.gif" title="heureux" alt="heureux" onClick="javascript:smilies(':D');return(false)" />
   <img src="./images/smileys/lol.gif" title="lol" alt="lol" onClick="javascript:smilies(':lol:');return(false)" />
   <img src="./images/smileys/triste.gif" title="triste" alt="triste" onClick="javascript:smilies(':triste:');return(false)" />
   <img src="./images/smileys/cool.gif" title="cool" alt="cool" onClick="javascript:smilies(':frime:');return(false)" />
   <img src="./images/smileys/rire.gif" title="rire" alt="rire" onClick="javascript:smilies('XD');return(false)" />
   <img src="./images/smileys/confus.gif" title="confus" alt="confus" onClick="javascript:smilies(':s');return(false)" />
   <img src="./images/smileys/choc.gif" title="choc" alt="choc" onClick="javascript:smilies(':O');return(false)" />
   <img src="./images/smileys/question.gif" title="?" alt="?" onClick="javascript:smilies(':interrogation:');return(false)" />
   <img src="./images/smileys/exclamation.gif" title="!" alt="!" onClick="javascript:smilies(':exclamation:');return(false)" />

   <br /><br />
   <textarea cols="80" rows="8" id="message" name="message"></textarea>
   <br />
   <input type="submit" name="submit" value="Envoyer" />
   <input type="reset" name="Effacer" value="Effacer"/>
   </p></form>
   <?php
break;
<?php
case "repondremp": //Si on veut répondre

    //On récupère le titre et le message
    $message = $_POST['message'];
    $nom_resto = $_POST['titre'];
    $temps = time();

    //On récupère la valeur de l'id du destinataire
    $dest = (int) $_GET['dest'];

    //Enfin on peut envoyer le message

    $query=$db->prepare('INSERT INTO forum_mp
    (mp_expediteur, mp_receveur, mp_titre, mp_text, mp_time, mp_lu)
    VALUES(:id, :dest, :titre, :txt, :tps, '0 ')'); 
    $query->bindValue(':id',$id,PDO::PARAM_INT);   
    $query->bindValue(':dest',$dest,PDO::PARAM_INT);   
    $query->bindValue(':titre',$nom_resto,PDO::PARAM_STR);   
    $query->bindValue(':txt',$message,PDO::PARAM_STR);   
    $query->bindValue(':tps',$temps,PDO::PARAM_INT);   
    $query->execute();
    $query->CloseCursor(); 

    echo '<p>Votre message a bien été envoyé!<br />
    <br />Cliquez <a href="./index.php">ici</a> pour revenir à l index du   
    forum<br />
    <br />Cliquez <a href="./messagesprives.php">ici</a> pour retourner
    à la messagerie</p>';

    break;
<?php
    case "nouveaump": //On envoie un nouveau mp

    //On récupère le titre et le message
    $message = $_POST['message'];
    $nom_resto = $_POST['titre'];
    $temps = time();
    $dest = $_POST['to'];

    //On récupère la valeur de l'id du destinataire
    //Il faut déja vérifier le nom

    $query=$db->prepare('SELECT membre_id FROM forum_membres
    WHERE LOWER(membre_pseudo) = :dest');
    $query->bindValue(':dest',strotolower($dest),PDO::PARAM_STR);
    $query->execute();
    if($data = $query->fetch())
    {
        $query=$db->prepare('INSERT INTO forum_mp
        (mp_expediteur, mp_receveur, mp_titre, mp_text, mp_time, mp_lu)
        VALUES(:id, :dest, :titre, :txt, :tps, :lu)'); 
        $query->bindValue(':id',$id,PDO::PARAM_INT);   
        $query->bindValue(':dest',(int) $data['membre_id'],PDO::PARAM_INT);   
        $query->bindValue(':titre',$nom_resto,PDO::PARAM_STR);   
        $query->bindValue(':txt',$message,PDO::PARAM_STR);   
        $query->bindValue(':tps',$temps,PDO::PARAM_INT);   
        $query->bindValue(':lu','0',PDO::PARAM_STR);   
        $query->execute();
        $query->CloseCursor(); 

       echo'<p>Votre message a bien été envoyé!
       <br /><br />Cliquez <a href="./index.php">ici</a> pour revenir à l index du
       forum<br />
       <br />Cliquez <a href="./messagesprives.php">ici</a> pour retourner à
       la messagerie</p>';
    }
    //Sinon l'utilisateur n'existe pas !
    else
    {
        echo'<p>Désolé ce membre n existe pas, veuillez vérifier et
        réessayez à nouveau.</p>';
    }
    break;
<?php
    case "supprimer":
       
    //On récupère la valeur de l'id
    $id_mess = (int) $_GET['id'];
    //Il faut vérifier que le membre est bien celui qui a reçu le message
    $query=$db->prepare('SELECT mp_receveur
    FROM forum_mp WHERE mp_id = :id');
    $query->bindValue(':id',$id_mess,PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetch();
    //Sinon la sanction est terrible :p
    if ($id != $data['mp_receveur']) erreur(ERR_WRONG_USER);
    $query->CloseCursor(); 

    //2 cas pour cette partie : on est sûr de supprimer ou alors on ne l'est pas
    $sur = (int) $_GET['sur'];
    //Pas encore certain
    if ($sur == 0)
    {
    echo'<p>Etes-vous certain de vouloir supprimer ce message ?<br />
    <a href="./messagesprives.php?action=supprimer&amp;id='.$id_mess.'&amp;sur=1">
    Oui</a> - <a href="./messagesprives.php">Non</a></p>';
    }
    //Certain
    else
    {
        $query=$db->prepare('DELETE from forum_mp WHERE mp_id = :id');
        $query->bindValue(':id',$id_mess,PDO::PARAM_INT);
        $query->execute();
        $query->CloseCursor(); 
        echo'<p>Le message a bien été supprimé.<br />
        Cliquez <a href="./messagesprives.php">ici</a> pour revenir à la boite
        de messagerie.</p>';
    }

    break;
<?php
//Si rien n'est demandé ou s'il y a une erreur dans l'url 
//On affiche la boite de mp.
default;
    
    echo'<p><i>Vous êtes ici</i> : <a href="./index.php">Index du forum</a> --> <a href="./messagesprives.php">Messagerie privée</a>';
    echo '<h1>Messagerie Privée</h1><br /><br />';

    $query=$db->prepare('SELECT mp_lu, mp_id, mp_expediteur, mp_titre, mp_time, membre_id, membre_pseudo
    FROM forum_mp
    LEFT JOIN forum_membres ON forum_mp.mp_expediteur = forum_membres.membre_id
    WHERE mp_receveur = :id ORDER BY mp_id DESC');
    $query->bindValue(':id',$id,PDO::PARAM_INT);
    $query->execute();
    echo'<p><a href="./messagesprives.php?action=nouveau">
    <img src="./images/nouveau.gif" alt="Nouveau" title="Nouveau message" />
    </a></p>';
    if ($query->rowCount()>0)
    {
        ?>
        <table>
        <tr>
        <th></th>
        <th class="mp_titre"><strong>Titre</strong></th>
        <th class="mp_expediteur"><strong>Expéditeur</strong></th>
        <th class="mp_time"><strong>Date</strong></th>
        <th><strong>Action</strong></th>
        </tr>

        <?php
        //On boucle et on remplit le tableau
        while ($data = $query->fetch())
        {
            echo'<tr>';
            //Mp jamais lu, on affiche l'icone en question
            if($data['mp_lu'] == 0)
            {
            echo'<td><img src="./images/message_non_lu.gif" alt="Non lu" /></td>';
            }
            else //sinon une autre icone
            {
            echo'<td><img src="./images/message.gif" alt="Déja lu" /></td>';
            }
            echo'<td id="mp_titre">
            <a href="./messagesprives.php?action=consulter&amp;id='.$data['mp_id'].'">
            '.stripslashes(htmlspecialchars($data['mp_titre'])).'</a></td>
            <td id="mp_expediteur">
            <a href="./voirprofil.php?action=consulter&amp;m='.$data['membre_id'].'">
            '.stripslashes(htmlspecialchars($data['membre_pseudo'])).'</a></td>
            <td id="mp_time">'.date('H\hi \l\e d M Y',$data['mp_time']).'</td>
            <td>
            <a href="./messagesprives.php?action=supprimer&amp;id='.$data['mp_id'].'&amp;sur=0">supprimer</a></td></tr>';
        } //Fin de la boucle
        $query->CloseCursor();
        echo '</table>';

    } //Fin du if
    else
    {
        echo'<p>Vous n avez aucun message privé pour l instant, cliquez
        <a href="./index.php">ici</a> pour revenir à la page d index</p>';
    }
} //Fin du switch
?>
</div>
</body>
</html>



