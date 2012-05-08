<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <meta charset="utf-8" />

    <head>
    
    <script type="text/javascript">
    function remplir(newValue){
    	
    	var verifCodePostal = new RegExp("(^| )[0-9]{5}( |$)");
    	
    	if(verifCodePostal.test(newValue)){
    	document.getElementById("codePostal").value=verifCodePostal.exec(newValue);
    	} else{
    	document.getElementById("codePostal").value=null;
    	}

    	var verifNote = new RegExp("(^| )[\0-5]( |$)");
    		
    	if(verifNote.test(newValue)){
    	document.getElementById("note").value=verifNote.exec(newValue);
    	document.getElementById("note").innerHTML=verifNote.exec(newValue);
    	document.getElementById("range").value=verifNote.exec(newValue);
    	document.getElementById("range").innerHTML=verifNote.exec(newValue);
    	}else{
    	document.getElementById("note").value=4;
    	document.getElementById("note").innerHTML=4;
    	document.getElementById("range").value=4;
    	document.getElementById("range").innerHTML=4;
    	}

    	var verifPrix = new RegExp("(^| )[\6-100]( |$)");
    		
    	if(verifPrix.test(newValue)){
    	document.getElementById("prixmoyen").value=verifPrix.exec(newValue);
		document.getElementById("prixmoyen").innerHTML=verifPrix.exec(newValue);
		document.getElementById("prix").value=verifPrix.exec(newValue);
		document.getElementById("prix").innerHTML=verifPrix.exec(newValue);
    	}else{
    	document.getElementById("prixmoyen").value=25;
    	document.getElementById("prixmoyen").innerHTML=25;
    	document.getElementById("prix").value=25;
    	document.getElementById("prix").innerHTML=25;
    	}
    	
    	
    	var verifTypeChinois = new RegExp("(^| )(Chinois)( |$)","i");
    	var verifTypeGrandRestaurant = new RegExp("(^| )(Grand Restaurant)( |$)","i");
    	var verifTypeItalien = new RegExp("(^| )(Italien)( |$)","i");
    	var verifTypeJaponais = new RegExp("(^| )(Japonais)( |$)","i");
    	var verifTypeRestaurationRapide = new RegExp("(^| )(Restauration rapide)( |$)","i");
    	var verifTypeAmericain = new RegExp("(^| )(Américain|Americain)( |$)","i");

    	if(verifTypeChinois.test(newValue)){
		document.getElementById("Chinois").selected=true;}
    	else if(verifTypeGrandRestaurant.test(newValue)){
		document.getElementById("GrandRestaurant").selected=true;}
    	else if(verifTypeItalien.test(newValue)){
		document.getElementById("Italien").selected=true;}
    	else if(verifTypeJaponais.test(newValue)){
		document.getElementById("Japonais").selected=true;}
    	else if(verifTypeRestaurationRapide.test(newValue)){
		document.getElementById("RestaurationRapide").selected=true;}
    	else if(verifTypeAmericain.test(newValue)){
		document.getElementById("Americain").selected=true;}
    	else {document.getElementById("TypeRestaurant").selected=true;}
		
		var verifPaysFrance = new RegExp("(^| )(France)( |$)","i");
    	var verifPaysEspagne = new RegExp("(^| )(Espagne)( |$)","i");
    	var verifPaysItalie = new RegExp("(^| )(Italie)( |$)","i");
    	var verifPaysRoyaumeUni = new RegExp("(^| )(Royaume-Uni|Royaume Uni)( |$)","i");
    	var verifPaysEtatsUnis = new RegExp("(^| )(Etats-Unis|Etats Unis)( |$)","i");
    	var verifPaysChine = new RegExp("(^| )(Chine)( |$)","i");
    	var verifPaysJapon = new RegExp("(^| )(Japon)( |$)","i");

    	if(verifPaysFrance.test(newValue)){
		document.getElementById("france").selected=true;}
    	else if(verifPaysEspagne.test(newValue)){
		document.getElementById("espagne").selected=true;}
    	else if(verifPaysItalie.test(newValue)){
		document.getElementById("italie").selected=true;}
    	else if(verifPaysRoyaumeUni.test(newValue)){
		document.getElementById("royaumeUni").selected=true;}
		else if(verifPaysEtatsUnis.test(newValue)){
		document.getElementById("etatsUnis").selected=true;}
    	else if(verifPaysChine.test(newValue)){
		document.getElementById("chine").selected=true;}
    	else if(verifPaysJapon.test(newValue)){
		document.getElementById("japon").selected=true;}
    	else {document.getElementById("Pays").selected=true;}

    }    	    	
    </script>

<script type="text/javascript">

    function showValue(newValue)
        {if(newValue == 100){
                document.getElementById("prix").innerHTML="au moins 100";
            }
         else {
                document.getElementById("prix").innerHTML=newValue;
            }
        }
</script>

<script type="text/javascript">
    function showValue2(newValue) {
	   document.getElementById("range").innerHTML=newValue; 
        }
</script>


<script language="Javascript1.2" type="text/javascript">

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

</script>


    </head>
    
    <body>

<!--Pays-->
            <label for="pays"></label>	
            <select name="pays" id="pays">
                <option id="Pays" value="Pays">Pays</option>
                <option id="france" value="france">France</option>
                <option id="espagne" value="espagne">Espagne</option>
                <option id="italie" value="italie">Italie</option>
                <option id="royaumeUni" value="royaumeUni">Royaume-Uni</option>
                <option id="etatsUnis" value="etatsUnis">Etats-Unis</option>
                <option id="chine" value="chine">Chine</option>
                <option id="japon" value="japon">Japon</option>
            </select>


<!--Code Postal-->
            <input type="text" name="code postal" placeholder="Code postal" maxlength="5" id="codePostal" style="width:66px;" onKeyPress="return scanToucheCodePostal(event);"/>


<!--Type de nourriture-->
            <label for="type"></label>
            <select name="type" id="type">
                <option id="TypeRestaurant" value="TypeRestaurant">Type</option>
                <option id="Chinois" value="Chinois">Chinois</option>
                <option id="GrandRestaurant" value="Grand restaurant">Grand restaurant</option>
                <option id="Italien" value="Italien">Italien</option>
                <option id="Japonais" value="Japonais">Japonais</option>
                <option id="RestaurationRapide" value="Restauration rapide">Restauration rapide</option>
                <option id="Americain" value="Americain">Américain</option>
            </select>
            <br />
            <br />


<!--Prix-->
            Prix : 
            <input id="prixmoyen" type="range" name="prix" value="25" min="0" max="100" onchange="showValue(this.value)"/>
            <span id="prix">25</span>€
            <br />


<!--Note-->
            Avis : 
            <input id="note" type="range" name="note" value="4" min="0" max="5" onchange="showValue2(this.value)"/>
            <span id="range">4</span> étoile(s)



        </form>


    </body>
</html>
