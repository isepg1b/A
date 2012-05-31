        <?php include('header.php'); ?> 
       <body>  
        <?php $reponse = $bdd->query('SELECT titre FROM restaurant2 WHERE id=\''. $_GET['id'].'\'');
    
   $donnees = $reponse->fetch(); ?>
    
       <title>Restaurant  <?php  echo $donnees['titre'];  ?></title>
    
    
   <?php $reponse->closeCursor(); ?> 
     
        <aside  id="aside">
            <a href="carte.php?id=<?php echo $_GET['id'];?>" class="tu_ql">Carte</a></br></br>
            <a href="news.php">News</a></br></br>
            <?php include('photos.php'); ?>

        </aside> 
      <div id="rechercher" style="text-align: center;">
             <?php //include('recherche/r.php'); ?> 
            </div> 
        <section>
            <div id="slider">
                <?php include('restaurant.php'); ?>
            </div>
        </section>

    </body>
    <?php include('footer.php'); ?>
