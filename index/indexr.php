        <?php include('header.php'); ?> 
       <body>  
        <?php $reponse = $bdd->query('SELECT * FROM restaurant2 WHERE id=\''. $_GET['id'].'\'');
    
   $donnees = $reponse->fetch(); 
    if (isset($donnees['titre'])){
        
            
            ?>
       <title>Restaurant  <?php  echo $donnees['titre'];  ?></title>
    
    
   <?php $reponse->closeCursor(); ?> 
     
        <aside  id="aside">
            <a href="carte.php?id=<?php echo $_GET['id'];?>" toptions="effect = clip, layout = quicklook" class="tu_ql">Carte</a></br></br>
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
    <?php   }  else
    {
        
        echo' <div style="text-align: center;">
            <img src="images/404error.jpg"> <br>
            Page inexistante, retourner à <a href="index.php">l\'accueil</a>
            
</div>';
        
        
        
    }
    
    include('footer.php'); 
    
    

?>
