<html>
<style type="text/css">
h1, h3
{
text-align:center; }
h3
{
background-color:black; color:white; font-size:0.9em; margin-bottom:0px;
}
.resto p
{
background-color:#CCCCCC;
margin-top:0px; }
.resto
{
width:70%;
margin:auto; }
</style> </head>
<body>
<h1>Bienvenue sur mon site !</h1> <p>Restos dans la bdd :</p>
<?php
mysql_connect("localhost", "root", ""); mysql_select_db("Poupipou");
// On récupère les cinq dernières news.
$retour = mysql_query('SELECT * FROM restaurant ORDER BY id_resto');
while ($donnees = mysql_fetch_array($retour)) {
?>
<div class="resto">
<h3>
<?php echo $donnees['nom_resto']; ?> <em>le <?php echo date('d/m/Y à H\hi',
$donnees['timestamp']); ?></em> </h3>
<p>
<?php
// On enlève les éventuels antislashs, PUIS on crée les entrées en HTML (<br />).
$description = nl2br(stripslashes($donnees['description'])); echo $description;
?>
</p>
</div>
<?php
} // Fin de la boucle des <italique>news</italique>. ?>
</body>
</html>