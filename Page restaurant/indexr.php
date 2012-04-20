            <?php include('header.php'); ?> 
       <body>  
        <?php $reponse = $bdd->query('SELECT nom_resto FROM restaurant WHERE id_resto=\'1\'');
    
   $donnees = $reponse->fetch(); ?>
    
       <title>Restaurant  <?php  echo $donnees['nom_resto'];  ?></title>
    
    
   <?php $reponse->closeCursor(); ?>
     
        <aside  id="aside">
            <a href="carte.php">Carte</a></br></br>
            <a href="news.php">News</a></br></br>
            <?php include('photos.php'); ?>

        </aside> 
        <section>
            <div id="slider" style="margin-top: 8%;">
                <?php include('restaurant.php'); ?>
            </div>
        </section>

    </body>
    <?php include('footer.php'); ?> 

