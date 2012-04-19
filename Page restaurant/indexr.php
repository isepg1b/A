
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
    <head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <link rel="stylesheet" media="screen" type="text/css" title="Design" href="style/style.css"></link></meta>
        
    </head> 
    <body>
        <div id="header">
            <?php include('header.php'); ?> 

        </div> 
        
        <?php $reponse = $bdd->query('SELECT nom_resto FROM restaurant WHERE id_resto=\'1\'');
    
   $donnees = $reponse->fetch(); ?>
    
       <title>Restaurant  <?php  echo $donnees['nom_resto'];  ?></title>
    
    
   <?php $reponse->closeCursor(); ?>
     
        <aside  id="aside">
            <a href="carte.php">Carte</a></br></br>
            <a href="photos.php">Photos </a></br></br>
            <a href="news.php">News</a></br>

        </aside> 
        <section>
            <div id="slider" style="margin-top: 8%;">
                <?php include('restaurant.php'); ?>
            </div>
        </section>

    </body>
    <?php include('footer.php'); ?> 

</html>
