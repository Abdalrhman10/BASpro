<?php
include_once 'class/database.php';
include_once 'class/klanten.php';
class verkooporder extends Database{
	public $klantid;
	public $artid;
    public $artOmschrijving;
    public $verkOrdDatum;
    public $verkOrdBestAantal;
    public $verkOrdStatus;
    public $klantnaam;
	
	// Methods
	
	public function setObject($klantid, $artid , $klantnaam, $artOmschrijving, $verkOrdBestAantal, $verkOrdStatus , $verkOrdDatum){
		//self::$conn = $db;
		$this->klantid = $klantid;
		$this->artid = $artid;
		$this->klantnaam = $klantnaam;
        $this->artOmschrijving = $artOmschrijving;
        $this->verkOrdBestAantal = $verkOrdBestAantal;
        $this->verkOrdStatus = $verkOrdStatus;
        $this->verkOrdDatum = $verkOrdDatum;


	} 
    private function BepMaxNr() : int {
		
        // Bepaal uniek nummer
        $sql="SELECT MAX(klantid)+1 FROM verkoopoder";
        return  (int) self::$conn->query($sql)->fetchColumn();
    } 

	

public function insertverkooporder(){
		// Voor deze functie moet eerst een setObject aangeroepen worden om $this te vullen
		
		//
		$this->klantid = $this->BepMaxNr();
		
		$sql = "INSERT INTO verkoopoder (klantid,artid,klantnaam,artOmschrijving,verkOrdBestAantal,verkOrdStatus,verkOrdDatum)
		VALUES (:klantid, :artid , :klantnaam, :artOmschrijving , :verkOrdBestAantal, TRUE , :verkOrdDatum)";

		$stmt = self::$conn->prepare($sql);
		return $stmt->execute((array)$this);
			
	}
	
	/**
	 * Summary of insertActeur2
	 * @param mixed $voornaam
	 * @param mixed $achternaam
	 * @return void
	 */
	public function insertverkooporder2($klantnaam, $artOmschrijving, $verkOrdBestAantal,$verkOrdStatus,$verkOrdDatum){
		
		// query
		$klantid = $this->BepMaxNr();
		$sql = "INSERT INTO verkoopoder (klantid,artid,klantnaam,artOmschrijving,verkOrdBestAantal,verkOrdStatus,verkOrdDatum)
		VALUES (:klantid, :artid, :klantnaam, :artOmschrijving, :verkOrdBestAantal, :verkOrdStatus  , '1-6-2023')";
		
		// Prepare
		$stmt = self::$conn->prepare($sql);
		
		// Execute
		$stmt->execute([
			'klantid'=>$klantid,
			'artid'=>$artid,
			'klantnaam'=>$klantnaam,
            'artOmschrijving'=>$artOmschrijving,
            'verkOrdbestAantal'=>$verkOrdBestAantal,
            'verkOrdStatus'=>$verkOrdStatus,
			'verkOrdDatum'=>$verkOrdDatum,
		]);			
	}
}
    ?>