<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <meta charset="utf-8" />

    <head>
		<script type="text/javascript">
		
		function remplir(newValue) {
		document.getElementById('codePostal').value = newValue;
		
		//    document.getElementById("codePostal").innerHTML = value;
				
		//function Texte(){
		//    var select = document.getElementById("taxe");
		//    var value = select.options[select.selectedIndex].value;
		    
		//    document.getElementById("prixTTC").innerHTML = value;
		
		//    if (codePostalTape != "") {
		//document.getElementById("prixTTC").innerHTML = value;    } else {
		//    }
		}​
		
		</script>
    </head>
    
    <body>

        <form method="get" action="resultats.php">

            <input type="text" name="recherche" id="recherche" placeholder="Rechercher" maxlength="60" onkeyup="remplir(this.value)"/><br />

            <label for="pays"></label>	
            <select name="pays" id="pays">
                <option value="france">Pays</option>
                <option value="france">France</option>
                <option value="espagne">Espagne</option>
                <option value="italie">Italie</option>
                <option value="royaume-uni">Royaume-Uni</option>
                <option value="canada">Canada</option>
                <option value="etats-unis">Etats-Unis</option>
                <option value="chine">Chine</option>
                <option value="japon">Japon</option>
            </select>



            <input type="text" name="code postal" placeholder="Code postal" maxlength="5" id="codePostal" onKeyPress="return scanToucheCodePostal(event);"
            />


<script>
function chercherCodePostal(valeur)
{
	var expression = ^[0-9]{5}$;
	
}

</script>




<script>
            var code_postal = document.getElementById('code postal');
            var text = document.getElementById('recherchecodepostal');
  
            code_postal.addEventListener('focus', function(e) {
                e.target.value = "Vous avez le focus !";
            }, true);

            code_postal.addEventListener('blur', function(e) {
                e.target.value = "Vous n'avez pas le focus !";
            }, true);
        </script>




       <script language="Javascript1.2" type="text/javascript">
           <!--
           function codeTouche(evenement)
           {
               for (prop in evenement)
               {
                   if(prop == 'which') return(evenement.which);
               }
               return(evenement.keyCode);
           }

           function pressePapierNS6(evenement,touche)
           {
               var rePressePapierNS = /[cvxz]/i;

               for (prop in evenement) if (prop == 'ctrlKey') isModifiers = true;
               if (isModifiers) return evenement.ctrlKey && rePressePapierNS.test(touche);
               else return false;
           }

           function scanToucheCodePostal(evenement)
           {
               var reCarSpeciaux = /[\x00\x08\x0D\x03\x16\x18\x1A]/;
               var reCarValides = /\d/;

               var codeDecimal  = codeTouche(evenement);
               var car = String.fromCharCode(codeDecimal);
               var autorisation = reCarValides.test(car) || reCarSpeciaux.test(car) || pressePapierNS6(evenement,car);

               return autorisation;
           }
           -->
       </script>













            <label for="type"></label>
            <select name="type" id="type">
                <option value="france">Type</option>
                <option value="Chinois">Chinois</option>
                <option value="Grand restaurant">Grand restaurant</option>
                <option value="Italien">Italien</option>
                <option value="Japonais">Japonais-Uni</option>
                <option value="Restauration rapide">Restauration rapide</option>
                <option value="Américain">Américain</option>
            </select>
            <br />


            <br />


            Prix : 
            <input id="prixmoyen" type="range" name="prix" id="prix" value="25" min="0" max="100" onchange="showValue(this.value)"/>
            <span id="prix">25</span>€


            <script type="text/javascript">
                function showValue(newValue)
                {if(newValue == 100){
                        document.getElementById("prix").innerHTML="plus de 100";
                    }
                 else {
                        document.getElementById("prix").innerHTML=newValue;
                    }
                }
            </script>

            <br />





            Note : 
            <input id="note" type="range" name="note" id="note" value="4" min="0" max="5" onchange="showValue2(this.value)"/>
            <span id="range">4</span> étoile(s)



            <script type="text/javascript">
                function showValue2(newValue)
                {   document.getElementById("range").innerHTML=newValue; 
                }
            </script>

            <br /><br /><br />







            <SCRIPT language="javascript"> 
                function aEteModifie() 
                { 
                    var leContenuDeMonChamp; 
                    leContenuDeMonChamp = document.monForm["monText"].value; 
                    alert("contenu : "+leContenuDeMonChamp); 
                } 
            </SCRIPT> 
            <body bgcolor="#FFFFFF"> 
                <form name = "monForm"> 
                    <input type="text" onBlur="javascript:aEteModifie()" name="monText"> 
                </form> 


                <p>
                    <?php echo $_POST['prix']; ?>
                </p>
        </form>


        <p>
            <?php echo "Ceci est du <strong>texte</strong>"; ?>

        </p>


        <br />    <br />    <br />
        <input id="text" type="text" size="60" value="Vous n'avez pas le focus !" />

        <script>
            var text = document.getElementById('text');
  
            text.addEventListener('focus', function(e) {
                e.target.value = "Vous avez le focus !";
            }, true);

            text.addEventListener('blur', function(e) {
                e.target.value = "Vous n'avez pas le focus !";
            }, true);
        </script>

        <br />    <br />    <br />

        <label><input type="radio" name="check" value="1" /> Case n°1</label><br />
        <label><input type="radio" name="check" value="2" /> Case n°2</label><br />
        <label><input type="radio" name="check" value="3" /> Case n°3</label><br />
        <label><input type="radio" name="check" value="4" /> Case n°4</label>
        <br /><br />
        <input type="button" value="Afficher la case cochée" onclick="check();" />

        <script>
            function check() {
                var inputs = document.getElementsByTagName('input'),
                inputsLength = inputs.length;
    
                for (var i = 0 ; i < inputsLength ; i++) {
                    if (inputs[i].type == 'radio' && inputs[i].checked) {
                        alert('La case cochée est la n°'+ inputs[i].value);
                    }
                }
            }
        </script>



    </body>
</html>
