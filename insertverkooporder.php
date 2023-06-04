<?php

if(isset($_POST["insert"]) && $_POST["insert"] == "Toevoegen"){
		
		include_once 'class/verkooporder.php';
		
		$verkooporder = new Verkooporder;
		//$acteur->setObject(0, $_POST['voornaam'], $_POST['achternaam']);
		//$acteur->insertActeur();
		$verkooporder->insertverkooporder2($_POST['klantnaam'], $_POST['artOmschrijving'], $_POST['verkOrdBestAantal'], $_POST['verkOrdStatus'], $_POST['verkOrdBestAantal']);
			

		echo "<script>alert('verkooporder: $_POST[klantnaam], $_POST[artOmschrijving], $_POST[verkOrdBestAantal], $_POST[verkOrdStatus] is toegevoegd')</script>";
		echo "<script> location.replace('index.php'); </script>";
			
	} 

?>

<!DOCTYPE html>
<html>
<body>

	<h1>CRUD verkooporder</h1>
	<h2>Toevoegen</h2>
	<form method="post">
	<label for="nv">klantnaam:</label>
   <input type="text" id="nv" name="klantnaam" placeholder="Klantnaam" required/>
   <br>
   <label for="nv">artOmschrijving:</label>
   <input type="text" id="nv" name="artOmschrijving" placeholder="artOmschrijving" required/>
   <br>
   <label for="nv">verkOrdBestAantal:</label>
   <input type="text" id="nv" name="verkOrdBestAantal" placeholder="verkOrdBestAantal" required/>
   <br>
	<input type='submit' name='insert' value='Toevoegen'>
	</form></br>

	<a href='index.php'>Terug</a>

</body>
</html>