<?php

include_once "Members.class.php";

class Pilots extends Members{
	
	private $license;
	private $FInumber;
	
	public function __construct() {
	
		$num = func_num_args();
		
		switch($num)
		{
			case 3:
				$this->firstName = func_get_arg(0);
				$this->lastName = func_get_arg(1);
				$this->FInumber = func_get_arg(2);
				break;
			case 8:
				$this->firstName = func_get_arg(0);
				$this->lastName = func_get_arg(1);
				$this->email = func_get_arg(2);
				$this->password = func_get_arg(3);
				$this->typeMember = func_get_arg(4);
				$this->isAdmin = func_get_arg(5);
				$this->license = func_get_arg(6);
				$this->FInumber = func_get_arg(7);
				break;
			case 13:
				$this->firstName = func_get_arg(0);
				$this->lastName = func_get_arg(1);
				$this->idMember = func_get_arg(2);
				$this->address = func_get_arg(3);
				$this->gender = func_get_arg(4);
				$this->phone = func_get_arg(5);
				$this->email = func_get_arg(6);
				$this->password = func_get_arg(7);
				$this->isAdmin = func_get_arg(8);
				$this->feesPaid = func_get_arg(9);
				$this->accBalance = func_get_arg(10);
				$this->license = func_get_arg(11);
				$this->FInumber = func_get_arg(12);
				break;			
			case 14:
				$this->firstName = func_get_arg(0);
				$this->lastName = func_get_arg(1);
				$this->idMember = func_get_arg(2);
				$this->address = func_get_arg(3);
				$this->gender = func_get_arg(4);
				$this->phone = func_get_arg(5);
				$this->email = func_get_arg(6);
				$this->password = func_get_arg(7);
				$this->typeMember = func_get_arg(8);
				$this->isAdmin = func_get_arg(9);
				$this->feesPaid = func_get_arg(10);
				$this->accBalance = func_get_arg(11);
				$this->license = func_get_arg(12);
				$this->FInumber = func_get_arg(13);
				break;
		}
	}
	
	public function getLicense() { return $this->license; } 
	public function getFInumber() { return $this->FInumber; } 
	
	public function setLicense($license) { $this->license = $license; } 
	public function setFInumber($FInumber) { $this->FInumber = $FInumber; } 
	
}

?>