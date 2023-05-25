<?php
include_once 'class/database.php';

class Klant extends Database{
	public $klantid;
	public $klantnaam;
	public $klantemail;
    public $klantadres;
    public $klantpostcode;
    public $klantWoonplaats;
	
	// Methods
	
	public function setObject($klantid, $klantnaam, $klantemail, $klantadres, $klantpostcode, $klantWoonplaats){
		//self::$conn = $db;
		$this->klantid = $klantid;
		$this->klantnaam = $klantnaam;
        $this->klantemail = $klantemail;
        $this->klantadres = $klantadres;
        $this->klantpostcode = $klantpostcode;
        $this->klantWoonplaats = $klantWoonplaats;


	} 
    private function BepMaxNr() : int {
		
        // Bepaal uniek nummer
        $sql="SELECT MAX(klantid)+1 FROM klant";
        return  (int) self::$conn->query($sql)->fetchColumn();
    }
public function insertklant(){
		// Voor deze functie moet eerst een setObject aangeroepen worden om $this te vullen
		
		//
		$this->klantid = $this->BepMaxNr();
		
		$sql = "INSERT INTO klant (klantid,klantnaam,klantemail,klantadres,klantpostcode,klantWoonplaats)
		VALUES (:klantid, :klantnaam, :klantemail, :klantadres, :klantpostcode, :klantWoonplaats)";

		$stmt = self::$conn->prepare($sql);
		return $stmt->execute((array)$this);
			
	}
	
	/**
	 * Summary of insertActeur2
	 * @param mixed $voornaam
	 * @param mixed $achternaam
	 * @return void
	 */
	public function insertklant2($klantnaam,$klantemail,$klantadres,$klantpostcode,$klantWoonplaats){
		
		// query
		$klantid = $this->BepMaxNr();
		$sql = "INSERT INTO klant (klantid,klantnaam,klantemail,klantadres,klantpostcode,klantWoonplaats)
		VALUES (:klantid, :klantnaam, :klantemail, :klantadres, :klantpostcode, :klantWoonplaats)";
		
		// Prepare
		$stmt = self::$conn->prepare($sql);
		
		// Execute
		$stmt->execute([
			'klantid'=>$klantid,
			'klantnaam'=>$klantnaam,
            'klantemail'=>$klantemail,
            'klantadres'=>$klantadres,
            'klantpostcode'=>$klantpostcode,
            'klantWoonplaats'=>$klantWoonplaats,
		]);			
	}
}
    ?>