<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<head>
<?php
//Si le titre est indiqué, on l'affiche entre les balises <title>
echo (!empty($titre))?'<title>'.$titre.'</title>':'<title> Forum </title>';
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" media="screen" type="text/css" title="Design" href="./css/style.css" />




<h1>La cuisine</h1>
<table>
<?php 
function entete()
{


  echo' <tr>
        <th></th>
        <th class="titre"><strong><?php echo stripslashes(htmlspecialchars($data[\'cat_nom\'])); ?>
        </strong></th>             
        <th class="nombremessages"><strong>Sujets</strong></th>       
        <th class="nombresujets"><strong>Messages</strong></th>       
        <th class="derniermessage"><strong>Dernier message</strong></th>   
        </tr>';
        }


function categories ($forum_id, $forum_name,$forum_desc,$forum_topic,$forum_post)
{
    echo'<tr><td><img src="./images/message.gif" alt="message" /></td>
    <td class="titre"><strong>
    <a href="./voirforum.php?f='.$forum_id.'">
    '.stripslashes(htmlspecialchars($forum_name)).'</a></strong>
    <br />'.nl2br(stripslashes(htmlspecialchars($forum_desc))).'</td>
    <td class="nombresujets">'.$forum_topic.'</td>
    <td class="nombremessages">'.$forum_post.'</td>';
}

function derniermessage($post_time, $membre_id,$membre_pseudo,$topic_id, $post_id)
{
  echo'<td class="derniermessage">
         '.date('H\hi \l\e d/M/Y',$data['post_time']).'<br />
         <a href="./voirprofil.php?m='.stripslashes(htmlspecialchars($data['membre_id'])).'&amp;action=consulter">'.$data['membre_pseudo'].'  </a>
         <a href="./voirtopic.php?t='.$data['topic_id'].'&amp;page='.$page.'#p_'.$data['post_id'].'">
         <img src="./images/go.gif" alt="go" /></a></td></tr>';

}
function pasdemessage()
{
echo'<td class="nombremessages">Pas de message</td></tr>';
}


function footer(){
echo '</table></div>';
//Le pied de page ici :
echo'<div id="footer">
<h2>
Qui est en ligne ?
</h2>';
}

function quiestenligne ($membre_id)
{
echo'Voir <a href="./voirprofil.php?m='.$data['membre_id'].'&amp;action=consulter">mon profil</a> <br/>';
echo'Cliquez <a href="./voirprofil.php?m='.$data['membre_id'].'&amp;action=modifier"> ici </a> pour modifier votre profil';
}
 ?>
 
        