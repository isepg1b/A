<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
    <head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <link rel="stylesheet" media="screen" type="text/css" title="Design" href="style/style.css"></link></meta>
        <title> Welcome </title>
    </head> 
    <body>
        <div id="header">
            <?php include('header.php'); ?> 

        </div>
        
         <aside  id="aside">
            <a href="http://localhost/a/A/forum/index.php">Forum</a></br></br>
            <a href="indexr.php">Restaurants</a></br></br>
           

        </aside> 
        <section>
            <div id="rechercher" style="text-align: center;">
             <?php include('recherche/r.php'); ?> 
            </div>
            <div id="slider">
                <?php include('sliders.php'); ?>
            </div>
        </section>
    </body>

    <?php include('footer.php'); ?> 

</html>