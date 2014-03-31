<?php

class JourneyLog {

	private $idReservation;
	private $flightDate;
	private $departureAirfield;
	private $departureTime;
	private $arrivalAirfield;
	private $arrivalTime;
	private $flightDuration;
	private $idPlane;
	
	public function __construct($idR, $fDate, $da, $dt, $aa, $at, $fd, $id) {
		
		$this->idReservation = $idR;
		$this->flightDate = $fDate;
		$this->departureAirfield = $da;
		$this->departureTime = $dt;
		$this->arrivalAirfield = $aa;
		$this->arrivalTime = $at;
		$this->flightDuration = $fd;
		$this->idPlane = $id;			
		
	}
	
	public function getIdReservation() { return $this->idReservation; }
	public function getFlightDate() { return $this->flightDate; }
	public function getIdPlane() { return $this->idPlane; } 
	public function getDepartureAirfield() { return $this->departureAirfield; }
	public function getDepartureTime() { return $this->departureTime; }
	public function getArrivalAirfield() { return $this->arrivalAirfield; }
	public function getArrivalTime() { return $this->arrivalTime; }
	public function getFlightDuration() { return $this->flightDuration; }
	
	public function setIdReservation($idR) { $this->idReservation = $idR; }
	public function setFlightDate($fDate) { $this->flightDate = $fDate; }
	public function setIdPlane($id) { $this->idPlane = $id; } 
	public function setDepartureAirfield($da) { $this->departureAirfield = $da; }
	public function setDepartureTime($dt) { $this->departureTime = $dt; }	
	public function setArrivalAirfield($aa) { $this->arrivalAirfield = $aa; }
	public function setArrivalTime($at) { $this->arrivalTime = $at; }
	public function setFlightDuration($fd) { $this->flightDuration = $fd; }
	
}

?>