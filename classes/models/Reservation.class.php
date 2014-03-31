<?php
class Reservation{
	
	private $idReservation;
	private $idMember;
	private $idPlane;
	private $dateReservation;
	private $FInumber;
	private $dureeReservation;
	private $status;
	
	public function __construct() {
	
		$num = func_num_args();
		
		switch($num) {
		
			case 6:
				$this->idReservation = func_get_arg(0);
				$this->idMember = func_get_arg(1);
				$this->idPlane = func_get_arg(2);
				$this->dateReservation = func_get_arg(3);
				$this->FInumber = func_get_arg(4);
				$this->dureeReservation = func_get_arg(5);
				$this->status = "pending";
			case 7:
				$this->idReservation = func_get_arg(0);
				$this->idMember = func_get_arg(1);
				$this->idPlane = func_get_arg(2);
				$this->dateReservation = func_get_arg(3);
				$this->FInumber = func_get_arg(4);
				$this->dureeReservation = func_get_arg(5);
				$this->status = func_get_arg(6);
				break;
		}
	}
	
	public function getIdReservation() { return $this->idReservation; } 
	public function getIdMember() { return $this->idMember; }
	public function getIdPlane() { return $this->idPlane; } 
	public function getDateReservation() { return $this->dateReservation; } 
	public function getFInumber() { return $this->FInumber; }
	public function getDureeReservation() { return $this->dureeReservation; }
	public function getStatus() { return $this->status; }
	
	public function setIdReservation($idR) { $this->idReservation = $idR; } 
	public function setIdMember($idM) { $this->idMember = $idM; }
	public function setIdPlane($idP) { $this->idPlane = $idP; } 
	public function setDateReservation($dr) { $this->dateReservation = $dr; } 
	public function setFInumber($FIno) { $this->FInumber = $FIno; }
	public function setDureeReservation($dureeR) { $this->dureeReservation = $dureeR; }
	public function setStatus($status) { $this->status = $status; }
	
}

?>