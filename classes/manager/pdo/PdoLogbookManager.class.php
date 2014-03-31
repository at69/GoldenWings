<?php
require_once 'AbstractPdoManager.class.php';

class PdoLogbookManager extends AbstractPdoManager {

	public function findAllLogbooks() {
	
		$results = array();

		$query = $this->pdo->prepare("
		SELECT *
		FROM logbook
		");
		
		$query->execute();

		while($result = $query->fetch(PDO::FETCH_OBJ)) {
			$results[] = new Logbook($result->idMember, $result->flightDate, $result->typePlane, $result->idPlane, $result->departureAirfield, $result->departureTime, $result->arrivalAirfield, $result->arrivalTime, $result->PICName, $result->FInumber, $result->dualTimeReceived, $result->flightTimePIC, $result->totalFlightDuration);
		}

		$query->closeCursor();

		return $results;	
	
	}
	
	public function findLogbookByMember($idMember) {
	
		$results = array();

		$query = $this->pdo->prepare("
		SELECT *
		FROM logbook WHERE idMember = :idMember
		");
		
		$query->bindValue(':idMember', $idMember);
		
		$query->execute();

		while($result = $query->fetch(PDO::FETCH_OBJ)) {
			$results[] = new Logbook($result->idMember, $result->flightDate, $result->typePlane, $result->idPlane, $result->departureAirfield, $result->departureTime, $result->arrivalAirfield, $result->arrivalTime, $result->PICName, $result->FInumber, $result->dualTimeReceived, $result->flightTimePIC, $result->totalFlightDuration);
		}

		$query->closeCursor();

		return $results;	

	}
	
	public function findLogbookByMemberNames($fName, $lName) {
	
		$results = array();
		
		$query = $this->pdo->prepare("
		SELECT *
		FROM members WHERE firstName = :fName && lastName = :lName
		");
		
		$query->bindValue(':fName', $fName);
		$query->bindValue(':lName', $lName);
		
		$query->execute();
		
		while($result = $query->fetch(PDO::FETCH_OBJ)) {
			$results[] = new Members($result->firstName, $result->lastName, $result->idMember, $result->address, $result->gender, $result->phone, $result->email, $result->password, $result->typeMember, $result->isAdmin, $result->feesPaid, $result->accBalance);
		}
		
		$query->closeCursor();
		
		$list = $results;
		
		foreach($list as $member) {
			$idMember = $member->getIdMember();
		}
		
		if(!isset($logbookManager)) $logbookManager = ManagerFactory::getLogbookManager();
		return $logbookManager->findLogbookByMember($idMember);

	}	

	public function findLogbookByFlightDate($flightDate) {
	
		$results = array();

		$query = $this->pdo->prepare("
		SELECT *
		FROM logbook WHERE flightDate = :flightDate
		");
		
		$query->bindValue(':flightDate', $flightDate);
		
		$query->execute();

		while($result = $query->fetch(PDO::FETCH_OBJ)) {
			$results[] = new Logbook($result->idMember, $result->flightDate, $result->typePlane, $result->idPlane, $result->departureAirfield, $result->departureTime, $result->arrivalAirfield, $result->arrivalTime, $result->PICName, $result->FInumber, $result->dualTimeReceived, $result->flightTimePIC, $result->totalFlightDuration);
		}

		$query->closeCursor();

		return $results;	

	}
	
	public function findLogbookByPlane($idPlane) {
	
		$results = array();

		$query = $this->pdo->prepare("
		SELECT *
		FROM logbook WHERE idPlane = :idPlane
		");
		
		$query->bindValue(':idPlane', $idPlane);
		
		$query->execute();

		while($result = $query->fetch(PDO::FETCH_OBJ)) {
			$results[] = new Logbook($result->idMember, $result->flightDate, $result->typePlane, $result->idPlane, $result->departureAirfield, $result->departureTime, $result->arrivalAirfield, $result->arrivalTime, $result->PICName, $result->FInumber, $result->dualTimeReceived, $result->flightTimePIC, $result->totalFlightDuration);
		}

		$query->closeCursor();

		return $results;	
	}
	
	public function findLogbookByDepartureAirfield($dAirfield) {
	
		$results = array();

		$query = $this->pdo->prepare("
		SELECT *
		FROM logbook WHERE departureAirfield = :dAirfield
		");
		
		$query->bindValue(':dAirfield', $dAirfield);
		
		$query->execute();

		while($result = $query->fetch(PDO::FETCH_OBJ)) {
			$results[] = new Logbook($result->idMember, $result->flightDate, $result->typePlane, $result->idPlane, $result->departureAirfield, $result->departureTime, $result->arrivalAirfield, $result->arrivalTime, $result->PICName, $result->FInumber, $result->dualTimeReceived, $result->flightTimePIC, $result->totalFlightDuration);
		}

		$query->closeCursor();

		return $results;	

	}

	public function findLogbookByArrivalAirfield($aAirfield) {
	
		$results = array();

		$query = $this->pdo->prepare("
		SELECT *
		FROM logbook WHERE arrivalAirfield = :aAirfield
		");
		
		$query->bindValue(':aAirfield', $aAirfield);
		
		$query->execute();

		while($result = $query->fetch(PDO::FETCH_OBJ)) {
			$results[] = new Logbook($result->idMember, $result->flightDate, $result->typePlane, $result->idPlane, $result->departureAirfield, $result->departureTime, $result->arrivalAirfield, $result->arrivalTime, $result->PICName, $result->FInumber, $result->dualTimeReceived, $result->flightTimePIC, $result->totalFlightDuration);
		}

		$query->closeCursor();

		return $results;	

	}
	
	public function findLogbookByAirfield($airfield) {
	
		$results = array();

		$query = $this->pdo->prepare("
		SELECT *
		FROM logbook WHERE departureAirfield = :airfield || arrivalAirfield = :airfield
		");
		
		$query->bindValue(':airfield', $airfield);
		
		$query->execute();

		while($result = $query->fetch(PDO::FETCH_OBJ)) {
			$results[] = new Logbook($result->idMember, $result->flightDate, $result->typePlane, $result->idPlane, $result->departureAirfield, $result->departureTime, $result->arrivalAirfield, $result->arrivalTime, $result->PICName, $result->FInumber, $result->dualTimeReceived, $result->flightTimePIC, $result->totalFlightDuration);
		}

		$query->closeCursor();

		return $results;	

	}
	
	public function findLogbookByPICName($PICName) {
	
		$results = array();

		$query = $this->pdo->prepare("
		SELECT *
		FROM logbook WHERE PICName = :PICName
		");
		
		$query->bindValue(':PICName', $PICName);
		
		$query->execute();

		while($result = $query->fetch(PDO::FETCH_OBJ)) {
			$results[] = new Logbook($result->idMember, $result->flightDate, $result->typePlane, $result->idPlane, $result->departureAirfield, $result->departureTime, $result->arrivalAirfield, $result->arrivalTime, $result->PICName, $result->FInumber, $result->dualTimeReceived, $result->flightTimePIC, $result->totalFlightDuration);
		}

		$query->closeCursor();

		return $results;	

	}
	
	public function findLogbookByFInumber($FInumber) {
	
		$results = array();

		$query = $this->pdo->prepare("
		SELECT *
		FROM logbook WHERE FInumber = :FInumber
		");
		
		$query->bindValue(':FInumber', $FInumber);
		
		$query->execute();

		while($result = $query->fetch(PDO::FETCH_OBJ)) {
			$results[] = new Logbook($result->idMember, $result->flightDate, $result->typePlane, $result->idPlane, $result->departureAirfield, $result->departureTime, $result->arrivalAirfield, $result->arrivalTime, $result->PICName, $result->FInumber, $result->dualTimeReceived, $result->flightTimePIC, $result->totalFlightDuration);
		}

		$query->closeCursor();

		return $results;	

	}
		
	public function member_displayAllMine($idMember) {
	
		if(!isset($logbookManager)) $logbookManager = ManagerFactory::getLogbookManager();
		return $logbookManager->findLogbookByMember($idMember);
	}
	
	public function pilot_displayAllMine($idMember, $FInum, $PICname) {
	
		$results = array();

		$query = $this->pdo->prepare("
		SELECT *
		FROM logbook WHERE idMember = :idM || FInumber = :FInumber || PICName = :picN
		");
		
		$query->bindValue(':FInumber', $FInum);
		$query->bindValue(':idM', $idMember);
		$query->bindValue(':picN', $PICname);
		
		$query->execute();

		while($result = $query->fetch(PDO::FETCH_OBJ)) {
			$results[] = new Logbook($result->idMember, $result->flightDate, $result->typePlane, $result->idPlane, $result->departureAirfield, $result->departureTime, $result->arrivalAirfield, $result->arrivalTime, $result->PICName, $result->FInumber, $result->dualTimeReceived, $result->flightTimePIC, $result->totalFlightDuration);
		}

		$query->closeCursor();

		return $results;		
	}
	
	public function pilot_displayWhereIamPilot($PICname) {
	
		if(!isset($logbookManager)) $logbookManager = ManagerFactory::getLogbookManager();
		return $logbookManager->findLogbookByPICName($PICname);
	
	}
	
	public function pilot_displayWhereIamInstructor($FInumber) {
	
		if(!isset($logbookManager)) $logbookManager = ManagerFactory::getLogbookManager();
		return $logbookManager->findLogbookByFInumber($FInumber);
		
	}
	
	public function displayMineByDate($date) {
	
		$results = array();

		if($_SESSION['user']->getTypeMember() == "member") {
		
			$query = $this->pdo->prepare("
			SELECT *
			FROM logbook WHERE flightDate = :flightDate && idMember = :idM
			");
			
		}else {
			
			$query = $this->pdo->prepare("
			SELECT *
			FROM logbook WHERE flightDate = :flightDate && (idMember = :idM || PICName = :picN || FInumber = :fiN)
			");
			
			$query->bindValue(':picN', $_SESSION['user']->getFirstName().' '.$_SESSION['user']->getLastName());
			$query->bindValue(':fiN', $_SESSION['user']->getFINumber());
			
		}
		
		$query->bindValue(':flightDate', $date);
		$query->bindValue(':idM', $_SESSION['user']->getIdMember());
		
		$query->execute();

		while($result = $query->fetch(PDO::FETCH_OBJ)) {
			$results[] = new Logbook($result->idMember, $result->flightDate, $result->typePlane, $result->idPlane, $result->departureAirfield, $result->departureTime, $result->arrivalAirfield, $result->arrivalTime, $result->PICName, $result->FInumber, $result->dualTimeReceived, $result->flightTimePIC, $result->totalFlightDuration);
		}

		$query->closeCursor();

		return $results;	
		
	}
	
	public function displayMineByPlane($idPlane) {
	
		$results = array();

		if($_SESSION['user']->getTypeMember() == "member") {
		
			$query = $this->pdo->prepare("
			SELECT *
			FROM logbook WHERE idPlane = :idPlane && idMember = :idM
			");
			
		}else {
			
			$query = $this->pdo->prepare("
			SELECT *
			FROM logbook WHERE idPlane = :idPlane && (idMember = :idM || PICName = :picN || FInumber = :fiN)
			");
			
			$query->bindValue(':picN', $_SESSION['user']->getFirstName().' '.$_SESSION['user']->getLastName());
			$query->bindValue(':fiN', $_SESSION['user']->getFINumber());
			
		}
		
		$query->bindValue(':idPlane', $idPlane);
		$query->bindValue(':idM', $_SESSION['user']->getIdMember());
		
		$query->execute();

		while($result = $query->fetch(PDO::FETCH_OBJ)) {
			$results[] = new Logbook($result->idMember, $result->flightDate, $result->typePlane, $result->idPlane, $result->departureAirfield, $result->departureTime, $result->arrivalAirfield, $result->arrivalTime, $result->PICName, $result->FInumber, $result->dualTimeReceived, $result->flightTimePIC, $result->totalFlightDuration);
		}

		$query->closeCursor();

		return $results;	
	
	}
	
	public function displayMineByAirfield($airfield) {
	
		$results = array();

		if($_SESSION['user']->getTypeMember() == "member") {
		
			$query = $this->pdo->prepare("
			SELECT *
			FROM logbook WHERE (departureAirfield = :airfield || arrivalAirfield = :airfield) && idMember = :idM
			");
			
		}else {
			
			$query = $this->pdo->prepare("
			SELECT *
			FROM logbook WHERE (departureAirfield = :airfield || arrivalAirfield = :airfield) && (idMember = :idM || PICName = :picN || FInumber = :fiN)
			");
			
			$query->bindValue(':picN', $_SESSION['user']->getFirstName().' '.$_SESSION['user']->getLastName());
			$query->bindValue(':fiN', $_SESSION['user']->getFINumber());
			
		}
		
		$query->bindValue(':airfield', $airfield);
		$query->bindValue(':idM', $_SESSION['user']->getIdMember());
		
		$query->execute();

		while($result = $query->fetch(PDO::FETCH_OBJ)) {
			$results[] = new Logbook($result->idMember, $result->flightDate, $result->typePlane, $result->idPlane, $result->departureAirfield, $result->departureTime, $result->arrivalAirfield, $result->arrivalTime, $result->PICName, $result->FInumber, $result->dualTimeReceived, $result->flightTimePIC, $result->totalFlightDuration);
		}

		$query->closeCursor();

		return $results;	
	
	}

	public function displayMineByDepartureAirfield($airfield) {
	
		$results = array();

		if($_SESSION['user']->getTypeMember() == "member") {
		
			$query = $this->pdo->prepare("
			SELECT *
			FROM logbook WHERE departureAirfield = :airfield && idMember = :idM
			");
			
		}else {
			
			$query = $this->pdo->prepare("
			SELECT *
			FROM logbook WHERE departureAirfield = :airfield && (idMember = :idM || PICName = :picN || FInumber = :fiN)
			");
			
			$query->bindValue(':picN', $_SESSION['user']->getFirstName().' '.$_SESSION['user']->getLastName());
			$query->bindValue(':fiN', $_SESSION['user']->getFINumber());
			
		}
		
		$query->bindValue(':airfield', $airfield);
		$query->bindValue(':idM', $_SESSION['user']->getIdMember());
		
		$query->execute();

		while($result = $query->fetch(PDO::FETCH_OBJ)) {
			$results[] = new Logbook($result->idMember, $result->flightDate, $result->typePlane, $result->idPlane, $result->departureAirfield, $result->departureTime, $result->arrivalAirfield, $result->arrivalTime, $result->PICName, $result->FInumber, $result->dualTimeReceived, $result->flightTimePIC, $result->totalFlightDuration);
		}

		$query->closeCursor();

		return $results;	
	
	}

	public function displayMineByArrivalAirfield($airfield) {
	
		$results = array();

		if($_SESSION['user']->getTypeMember() == "member") {
		
			$query = $this->pdo->prepare("
			SELECT *
			FROM logbook WHERE arrivalAirfield = :airfield && idMember = :idM
			");
			
		}else {
			
			$query = $this->pdo->prepare("
			SELECT *
			FROM logbook WHERE arrivalAirfield = :airfield && (idMember = :idM || PICName = :picN || FInumber = :fiN)
			");
			
			$query->bindValue(':picN', $_SESSION['user']->getFirstName().' '.$_SESSION['user']->getLastName());
			$query->bindValue(':fiN', $_SESSION['user']->getFINumber());
			
		}
		
		$query->bindValue(':airfield', $airfield);
		$query->bindValue(':idM', $_SESSION['user']->getIdMember());
		
		$query->execute();

		while($result = $query->fetch(PDO::FETCH_OBJ)) {
			$results[] = new Logbook($result->idMember, $result->flightDate, $result->typePlane, $result->idPlane, $result->departureAirfield, $result->departureTime, $result->arrivalAirfield, $result->arrivalTime, $result->PICName, $result->FInumber, $result->dualTimeReceived, $result->flightTimePIC, $result->totalFlightDuration);
		}

		$query->closeCursor();

		return $results;	
	
	}
	
	public function displayMineByPICName($PICname) {
	
		$results = array();

		if($_SESSION['user']->getTypeMember() == "member") {
		
			$query = $this->pdo->prepare("
			SELECT *
			FROM logbook WHERE PICName = :picN && idMember = :idM
			");
			
			$query->bindValue(':picN', $PICname);
			$query->bindValue(':idM', $_SESSION['user']->getIdMember());
		
			$query->execute();

			while($result = $query->fetch(PDO::FETCH_OBJ)) {
				$results[] = new Logbook($result->idMember, $result->flightDate, $result->typePlane, $result->idPlane, $result->departureAirfield, $result->departureTime, $result->arrivalAirfield, $result->arrivalTime, $result->PICName, $result->FInumber, $result->dualTimeReceived, $result->flightTimePIC, $result->totalFlightDuration);
			}

			$query->closeCursor();

			return $results;	
			
		}else {
			
			if(!isset($logbookManager)) $logbookManager = ManagerFactory::getLogbookManager();
			return $logbookManager->pilot_displayWhereIamPilot($PICname);
			
		}
	
	}
	
	public function pilot_displayMineByFINumber($FInum) {
	
		if(!isset($logbookManager)) $logbookManager = ManagerFactory::getLogbookManager();
		return $logbookManager->pilot_displayWhereIamInstructor($FInum);
	
	}
	
}

?>