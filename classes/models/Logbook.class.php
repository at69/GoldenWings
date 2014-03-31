<?php

class Logbook {
	
	private $idMember;
	private $flightDate;
	private $typePlane;
	private $idPlane;
	private $departureAirfield;
	private $departureTime;
	private $arrivalAirfield;
	private $arrivalTime;
	private $PICName;
	private $FInumber;
	private $dualTimeReceived;
	private $flightTimePIC;
	private $totalFlightDuration;
	
	public function __construct() {
		
		$num = func_num_args();
		
		switch($num)
		{
			case 13:
					$this->idMember = func_get_arg(0);
					$this->flightDate = func_get_arg(1);
					$this->typePlane = func_get_arg(2);
					$this->idPlane = func_get_arg(3);
					$this->departureAirfield = func_get_arg(4);
					$this->departureTime = func_get_arg(5);
					$this->arrivalAirfield = func_get_arg(6);
					$this->arrivalTime = func_get_arg(7);
					$this->PICName = func_get_arg(8);
					$this->FInumber = func_get_arg(9);
					$this->dualTimeReceived = func_get_arg(10);
					$this->flightTimePIC = func_get_arg(11);
					$this->totalFlightDuration = func_get_arg(12);
					break;
		}
	}
	
	public function getIdMember() { return $this->idMember; }
	public function getFlightDate() { return $this->flightDate; } 
	public function getTypePlane() { return $this->typePlane; } 
	public function getIdPlane() { return $this->idPlane; } 
	public function getDepartureAirfield() { return $this->departureAirfield; }
	public function getDepartureTime() { return $this->departureTime; }
	public function getArrivalAirfield() { return $this->arrivalAirfield; }
	public function getArrivalTime() { return $this->arrivalTime; }
	public function getPICName() { return $this->PICName; }
	public function getFInumber() { return $this->FInumber; }
	public function getDualTimeReceived() { return $this->dualTimeReceived; }
	public function getFlightTimePIC() { return $this->flightTimePIC; }
	public function getTotalFlightDuration() { return $this->totalFlightDuration; }
	
	public function setIdMember($idM) { $this->idMember = $idM; }
	public function setFlightDate($fd) { $this->flightDate = $fd; } 
	public function setTypePlane($tp) { $this->typePlane = $tp; } 
	public function setIdPlane($id) { $this->idPlane = $id; } 
	public function setDepartureAirfield($da) { $this->departureAirfield = $da; }
	public function setDepartureTime($dt) { $this->departureTime = $dt; }	
	public function setArrivalAirfield($aa) { $this->arrivalAirfield = $aa; }
	public function setArrivalTime($at) { $this->arrivalTime = $at; }
	public function setPICName($picN) { $this->PICName = $picN; }
	public function setFInumber($FIno) { $this->FInumber = $FIno; }
	public function setDualTimeReceived($dtr) { $this->dualTimeReceived = $dtr; }
	public function setFlightTimePIC($ftPIC) { $this->flightTimePIC = $ftPIC; }
	public function setTotalFlightDuration($tfd) { $this->totalFlightDuration = $tfd; }
	
}

?>