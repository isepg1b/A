 
    <script type="text/javascript">
	//<!--
		function change_onglet(name)
		{
			document.getElementById('onglet_'+anc_onglet).className = 'onglet_0 onglet';
			document.getElementById('onglet_'+name).className = 'onglet_1 onglet';
			document.getElementById('contenu_onglet_'+anc_onglet).style.display = 'none';
			document.getElementById('contenu_onglet_'+name).style.display = 'block';
			anc_onglet = name;
		}
	//-->
	</script>
    <style type="text/css">
	.onglet
	{
		display:inline-block;
		margin-left:3px;
		margin-right:3px;
		padding:3px;
		border:1px solid black;
		cursor:pointer;
                
	}
	.onglet_0
	{
		background:#bbbbbb;
		border-bottom:1px solid black;
	}
	.onglet_1
	{
		background:#dddddd;
		border-bottom:0px solid black;
		padding-bottom:4px;
	}
	.contenu_onglet
	{
		background-color:#dddddd;
		border:1px solid black;
		margin-top:-1px;
		padding:5px;
		display:none;
            
	}
	ul
	{
		margin-top:0px;
		margin-bottom:0px;
		margin-left:-10px
	}
	h1
	{
		margin:0px;
		padding:0px;
	}
	</style>
         <?php $reponse = $bdd->query('SELECT * FROM restaurant WHERE id_resto=\'1\'');
    
   $donnees = $reponse->fetch(); ?>
</head>

	<div class="systeme_onglets">
        <div class="onglets">
            <span class="onglet_0 onglet" id="onglet_quoi" onclick="javascript:change_onglet('quoi');">Résumé</span>
            <span class="onglet_0 onglet" id="onglet_infos" onclick="javascript:change_onglet('infos');">Infos</span>            
            <span class="onglet_0 onglet" id="onglet_avis" onclick="javascript:change_onglet('avis');">Avis</span>
            <span class="onglet_0 onglet" id="onglet_plan" onclick="javascript:change_onglet('plan');">Plan</span>
        </div>
        <div class="contenu_onglets">
            <div class="contenu_onglet" id="contenu_onglet_quoi">
            	<h1>Résumé</h1>
                                <?php  echo $donnees['resume'];  ?>
            </div>
            <div class="contenu_onglet" id="contenu_onglet_infos">
            	<h1>Infos</h1>
                <?php  echo $donnees['carte'];  ?>
            </div>
            <div class="contenu_onglet" id="contenu_onglet_avis">
            	<h1>Avis</h1>
               <?php  echo $donnees['nb_commentaire'];  ?>
            </div>
            <div class="contenu_onglet" id="contenu_onglet_plan">
               
              <?php include'Plan.php'?>
            
            </div>
        </div>
    </div>
    <script type="text/javascript">
	//<!--
		var anc_onglet = 'quoi';
		change_onglet(anc_onglet);
	//-->
	</script>
