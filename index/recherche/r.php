            <style type="text/css">


                #toppan {
                    display: inline-block;
                    text-align: center;
                }
                #pan {
                    width: 500px;
                    position: relative;
                    top: 1px;
                    height: 10px;
                    margin-left: auto;
                    margin-right: auto;
                    z-index: 10;
                    overflow: hidden;
                      }
                                             
                .panel_butt {
                    margin-left: auto;
                    margin-right: auto;
                    position: relative;
                    top: 1px;
                    width: 10px;
                    height: 10px;
                    background: url(../images/panel_button.png);
                    z-index: 0;
                    filter:alpha(opacity=70);
                    -moz-opacity:0.70;
                    -khtml-opacity: 0.70;
                    opacity: 0.70;
                    cursor: pointer;
                }
                
               

            </style>
            <script src="recherche/N/jquery.js" type="text/javascript"></script>
            <script src="recherche/N/javascript.js" type="text/javascript"></script>
             <!--FORMULAIRE-->
        <form method="get" action="resultats.php">

<!--Recherche-->
            <input type="text" name="recherche" id="recherche" placeholder="Rechercher" maxlength="60" style="width:230px;" onkeyup="remplir(this.value)"/>
            <input type="submit" value="Rechercher">
            <br />
            <div id="toppan">
                <div id="pan" style="height: 0px; display: block; ">
                    <form method="get" action="resultats.php">
                     <?php include('Recherche.php'); ?> 
                </div>
                                            <div class="panel_butt" id="hide_butt" style="display: none; ">Cacher</div>
                                            </div>
                                            </html>