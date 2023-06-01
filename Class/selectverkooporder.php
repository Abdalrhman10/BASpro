<?php
include "connectpdo.php";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM klanten");
    $stmt->execute();
    
    $stmt2 = $conn->prepare("SELECT * FROM artikelen");
    $stmt2->execute();

    // stel de resulterende array in
    $result =  $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result2 = $stmt2->setFetchMode(PDO::FETCH_ASSOC);

echo "<form method='post' action=''>";

///////////SELECT1/////////////////
echo "Klant: </br><select id='klant'>";
while($row = $stmt->fetch()) {
    $klantId = $row['klantId'];
    $klantNaam = $row['klantNaam'];
    echo "<option value=$klantId>$klantNaam (id: $klantId)</option>";    
}
echo "</select></br>";

// Aantal 
echo "</br>Product: </br><select id='aantal'>";
for ($num=1; $num<=10; $num++){
echo '<option>' .$num. '</option>';
}
echo "</select>";

///////////SELECT2/////////////////
echo "<select id='product'>";
while($row2 = $stmt2->fetch()) {
    $artId = $row2['artId'];
    $artOmschrijving = $row2['artOmschrijving'];
    $artVerkoop = $row2['artVerkoop'];    
    echo "<option value=$artId>$artOmschrijving (&euro; $artVerkoop)</option>";    
}
echo "</select><p><input type='submit' value='Verzenden'></p>";
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;

// bronweergeven
show_source(__FILE__)
?>
</form>
