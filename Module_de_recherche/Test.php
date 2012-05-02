<html>
	<head>
		<script>
			function showData(formName){
				var firstname = document.getElementsByName(formName)[0].firstname.value;
				var lastname = document.getElementsByName(formName)[0].lastname.value;
				var country = document.getElementsByName(formName)[0].country.value;
				alert(lastname.toUpperCase() + " " + firstname + " ["+country+"]");
			}
		</script>
	</head>

	<body>
	
	<form name="formulaire" id="formulaire" method="post" action="tapage.php">
   <input name="text" type="text" id="text" onkeyup="document.getElementById('valeur3').selected=true" />
   <select name="select">
      <option id="valeur1" value="1">valeur1</option>
      <option id="valeur2" value="2">valeur2</option>
      <option id="valeur3" value="3">valeur3</option>
   </select>
   <input type="submit" name="Submit" value="Submit" />
</form>

		Sélectionner le premier formulaire: <input type="radio" name="selectedFormName" id="selectedFormName" value="firstForm" onclick="showData(this.value);" /><br/>
		Sélectionner le second formulaire: <input type="radio" name="selectedFormName" id="selectedFormName" value="secondForm" onclick="showData(this.value);"/><p/>
		
		<p/>
		<form name="firstForm" action="http://www.commentcamarche.net" method="POST">
			<table>
				<tr>
					<td>Prénom:</td>
					<td><input name="firstname" id="firstname" type="text" value="Hack"/></td>
				</tr>
				<tr>
					<td>Nom</td>
					<td><input name="lastname" id="lastname" type="text" value="Track"/></td>
				</tr>
				<tr>
					<td>Pays</td>
					<td><input name="country" id="country" type="text" value="Belgium"/></td>
				</tr>
			</table>
		</form>
		
		<form name="secondForm" action="http://www.commentcamarche.net" method="POST">
			<table>
				<tr>
					<td>Prénom:</td>
					<td><input name="firstname" id="firstname"  ype="text" value="Sama"/></td>
				</tr>
				<tr>
					<td>Nom</td>
					<td><input name="lastname" id="lastname" type="text" value="Zakuza"/></td>
				</tr>
				<tr>
					<td>Pays</td>
					<td><input name="country" id="country" type="text" value="Elsewhere"/></td>
				</tr>
			</table>
		</form>
	</body>
</html>