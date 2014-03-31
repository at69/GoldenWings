<?php

class Planes {
	
	private $typePlane;
	private $idPlane;
	private $locationCost;
	private $availability;
	
	public function __construct($typePlane, $id, $locationCost, $availability="1") {
		$this->typePlane = $typePlane;
		$this->idPlane = $id;
		$this->locationCost = $locationCost;
		$this->availability = $availability;
	}
	
	public function getTypePlane() { return $this->typePlane; } 
	public function getIdPlane() { return $this->idPlane; } 
	public function getLocationCost() { return $this->locationCost; } 
	public function getAvailability() { return $this->availability; }
	
	public function setTypePlane($tp) { $this->typePlane = $tp; } 
	public function setIdPlane($id) { $this->idPlane = $id; } 
	public function setLocationCost($lc) { $this->locationCost = $lc; } 
	public function setAvailability($av) { $this->availability = $av; }
	
}

?>