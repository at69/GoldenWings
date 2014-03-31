<?php
require_once 'AbstractPdoManager.class.php';

class PdoJourneyLogManager extends AbstractPdoManager{

	public function findAllJourneyLog() {

		$results = array();

		$query = $this->pdo->prepare("
		SELECT *
		FROM journeylog
		");
		
		$query->execute();

		while($result = $query->fetch(PDO::FETCH_OBJ)) {
			$results[] = new JourneyLog($result->idReservation, $result->flightDate, $result->departureAirfield, $result->departureTime, $result->arrivalAirfield, $result->arrivalTime, $result->flightDuration, $result->idPlane);
		}

		$query->closeCursor();

		return $results;

	}
	
	public function findJourneyLogByFlightDate($flightDate) {
	
		$results = array();

		$query = $this->pdo->prepare("
		SELECT *
		FROM journeylog WHERE flightDate = :flightDate
		");
		
		$query->bindValue(':flightDate', $flightDate);
		
		$query->execute();

		while($result = $query->fetch(PDO::FETCH_OBJ)) {
			$results[] = new JourneyLog($result->idReservation, $result->flightDate, $result->departureAirfield, $result->departureTime, $result->arrivalAirfield, $result->arrivalTime, $result->flightDuration, $result->idPlane);
		}

		$query->closeCursor();

		return $results;		

	}
	
	public function findJourneyLogByAirfield($airfield) {
	
		$results = array();

		$query = $this->pdo->prepare("
		SELECT *
		FROM journeylog WHERE departureAirfield = :airfield || arrivalAirfield = :airfield
		");
		
		$query->bindValue(':airfield', $airfield);
		
		$query->execute();

		while($result = $query->fetch(PDO::FETCH_OBJ)) {
			$results[] = new JourneyLog($result->idReservation, $result->flightDate, $result->departureAirfield, $result->departureTime, $result->arrivalAirfield, $result->arrivalTime, $result->flightDuration, $result->idPlane);
		}

		$query->closeCursor();

		return $results;	
	
	
	
	}
	
	public function findJourneyLogByDepartureAirfield($dAirfield) {
	
		$results = array();

		$query = $this->pdo->prepare("
		SELECT *
		FROM journeylog WHERE departureAirfield = :dAirfield
		");
		
		$query->bindValue(':dAirfield', $dAirfield);
		
		$query->execute();

		while($result = $query->fetch(PDO::FETCH_OBJ)) {
			$results[] = new JourneyLog($result->idReservation, $result->flightDate, $result->departureAirfield, $result->departureTime, $result->arrivalAirfield, $result->arrivalTime, $result->flightDuration, $result->idPlane);
		}

		$query->closeCursor();

		return $results;
	
	}
	
	public function findJourneyLogByArrivalAirfield($aAirfield) {

		$results = array();

		$query = $this->pdo->prepare("
		SELECT *
		FROM journeylog WHERE arrivalAirfield = :aAirfield
		");
		
		$query->bindValue(':aAirfield', $aAirfield);
		
		$query->execute();

		while($result = $query->fetch(PDO::FETCH_OBJ)) {
			$results[] = new JourneyLog($result->idReservation, $result->flightDate, $result->departureAirfield, $result->departureTime, $result->arrivalAirfield, $result->arrivalTime, $result->flightDuration, $result->idPlane);
		}

		$query->closeCursor();

		return $results;	
	
	}
	
	public function findJourneyLogByPlane($idPlane) {

		$results = array();

		$query = $this->pdo->prepare("
		SELECT *
		FROM journeylog WHERE idPlane = :idPlane
		");
		
		$query->bindValue(':idPlane', $idPlane);
		
		$query->execute();

		while($result = $query->fetch(PDO::FETCH_OBJ)) {
			$results[] = new JourneyLog($result->idReservation, $result->flightDate, $result->departureAirfield, $result->departureTime, $result->arrivalAirfield, $result->arrivalTime, $result->flightDuration, $result->idPlane);
		}

		$query->closeCursor();

		return $results;	
	
	}
	
	public function findJourneyLogByRentalId($idRental) {
	
		$results = array();

		$query = $this->pdo->prepare("
		SELECT *
		FROM journeylog WHERE idReservation = :idRental
		");
		
		$query->bindValue(':idRental', $idRental);
		
		$query->execute();

		while($result = $query->fetch(PDO::FETCH_OBJ)) {
			$results[] = new JourneyLog($result->idReservation, $result->flightDate, $result->departureAirfield, $result->departureTime, $result->arrivalAirfield, $result->arrivalTime, $result->flightDuration, $result->idPlane);
		}

		$query->closeCursor();

		return $results;	
		
	}

}


?>