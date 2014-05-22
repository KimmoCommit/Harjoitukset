<?php
require_once "registration.php";
class registrationPDO {
	private $db;
	function __construct($dsn="mysql:host=localhost;dbname=KoskiPHP", $user="root", $password="salainen") {
		$this->db = new PDO($dsn,$user,$password);
		$this->db->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		$this->db->setAttribute (PDO::ATTR_EMULATE_PREPARES, false);
	}
	public function allPersons() {
		$sql = "SELECT id, nimi, puhnro, osoite, ika, sposti FROM person";
		
		if (! $stmt = $this->db->prepare($sql)) {
			$error = $this->db->errorInfo ();
			
			throw new PDOException ($error[2], $error[1]);
		}
		
		if (! $stmt->execute()) {
			$error = $stmt->errorInfo ();
			throw new PDOException ($error[2], $error[1]);
		}
		
		$result = array();
		
		while ($row = $stmt->fetchObject() ) {

			$registration = new Registration();
			$registration->setNimi(utf8_encode($row->nimi));
			$registration->setPuhnro($row->puhnro);
			$registration->setLahiosoite(utf8_encode($row->osoite));
			$registration->setIka($row->ika);
			$registration->setSposti(utf8_encode($row->sposti));
			$registration->setId($row->id);
			$result[] = $registration;
		}
		return $result;
	}
	function addPerson($registration) {
		$sql = "INSERT INTO person (nimi, puhnro, osoite, ika, sposti, salasana)
			values (:nimi, :puhnro, :osoite, :ika, :sposti, :salasana)";
		if (! $stmt = $this->db->prepare($sql)) {
			$error = $this->db->errorInfo();
				
			throw new PDOException ($error[2], $error[1]);
		}
		$stmt->bindValue(":nimi", utf8_decode($registration->getNimi()), PDO::PARAM_STR);
		$stmt->bindValue(":puhnro", utf8_decode($registration->getPuhnro()), PDO::PARAM_STR);
		$stmt->bindValue(":osoite", utf8_decode($registration->getLahiosoite()), PDO::PARAM_STR);
		$stmt->bindValue(":ika", utf8_decode($registration->getIka()), PDO::PARAM_STR);
		$stmt->bindValue(":sposti", utf8_decode($registration->getSposti()), PDO::PARAM_STR);
		$stmt->bindValue(":salasana", utf8_decode($registration->getSalasana()), PDO::PARAM_STR);
		
		if(! $stmt->execute()) {
			$error = $stmt->errorInfo();
			
			if($error[0] == "HY093"){
				$error[2] = "Invalid parameter";
			}
			
			throw new PDOException($error[2], $error[1]);
		}
		
		return $this->db->lastInsertId();
		
	}
	
	function findPerson($nimi){
		$sql = "SELECT id, nimi, puhnro, osoite, ika, sposti FROM person
				WHERE nimi LIKE :nimi";
		
		if (! $stmt = $this->db->prepare($sql)) {
			$error = $this->db->errorInfo ();
			throw new PDOException ($error[2], $error[1]);
		}
		
		$ni = "%" . utf8_decode($nimi) . "%";
		$stmt->bindValue(":nimi", $ni, PDO::PARAM_STR);
		
		if (! $stmt->execute()) {
			$error = $stmt->errorInfo ();
			throw new PDOException ($error[2], $error[1]);
		}

		$result = array();
		
		while ($row = $stmt->fetchObject() ) {
		
			$registration = new Registration();
			$registration->setNimi(utf8_encode($row->nimi));
			$registration->setPuhnro($row->puhnro);
			$registration->setLahiosoite(utf8_encode($row->osoite));
			$registration->setIka($row->ika);
			$registration->setSposti(utf8_encode($row->sposti));
			$registration->setId($row->id);
			$result[] = $registration;
		}
		return $result;
		
	}
	
	function deletePerson($id) {
		$sql = "DELETE FROM person WHERE id = :id";
		if (! $stmt = $this->db->prepare($sql)) {
			$error = $this->db->errorInfo();
	
			throw new PDOException ($error[2], $error[1]);
		}
		$stmt->bindValue(":id", $id, PDO::PARAM_STR);
	
	
		if(! $stmt->execute()) {
			$error = $stmt->errorInfo();
				
			if($error[0] == "HY093"){
				$error[2] = "Invalid parameter";
			}
				
			throw new PDOException($error[2], $error[1]);
		}
	
		return;
	
	}
	
	
	
	
	
	
}
?>