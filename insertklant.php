<?php

if(isset($_POST["insert"]) && $_POST["insert"] == "Toevoegen"){
		
		include_once 'class/klanten.php';
		
		$klant = new Klant;
		//$acteur->setObject(0, $_POST['voornaam'], $_POST['achternaam']);
		//$acteur->insertActeur();
		$klant->insertklant2($_POST['klantnaam'], $_POST['klantemail'], $_POST['klantadres'], $_POST['klantpostcode'], $_POST['klantWoonplaats']);
			

		echo "<script>alert('klant: $_POST[klantnaam] $_POST[klantemail] $_POST[klantadres] $_POST[klantpostcode] $_POST[klantWoonplaats] is toegevoegd')</script>";
		echo "<script> location.replace('index.php'); </script>";
			
	} 

?>

<!DOCTYPE html>
<html>
<body>

	<h1>CRUD klant</h1>
	<h2>Toevoegen</h2>
	<form method="post">
	<label for="nv">klantnaam:</label>
   <input type="text" id="nv" name="klantnaam" placeholder="Klantnaam" required/>
   <br>   
   <label for="an">klantemail:</label>
   <input type="text" id="an" name="klantemail" placeholder="klantemail" required/>
   <br>
   <label for="nv">klantadres:</label>
   <input type="text" id="nv" name="klantadres" placeholder="klantadres" required/>
   <br>
   <label for="nv">klantpostcode:</label>
   <input type="text" id="nv" name="klantpostcode" placeholder="klantpostcode" required/>
   <br>
   <label for="nv">klantWoonplaats:</label>
   <input type="text" id="nv" name="klantWoonplaats" placeholder="klantWoonplaats" required/>
   <br>
   <br>
	<input type='submit' name='insert' value='Toevoegen'>
	</form></br>

	<a href='index.php'>Terug</a>

</body>
</html>
