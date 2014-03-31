<?php
class Members {
	
	protected $firstName;
	protected $lastName;
	protected $idMember;
	protected $address;
	protected $gender;
	protected $phone;
	protected $email;
	protected $password;
	protected $typeMember;
	protected $isAdmin;
	protected $feesPaid;
	protected $accBalance;
	
	
	public function __construct() {
	
		$num = func_num_args();
		
		switch($num)
		{
			case 6:
				$this->firstName = func_get_arg(0);
				$this->lastName = func_get_arg(1);
				$this->email = func_get_arg(2);
				$this->password = func_get_arg(3);
				$this->typeMember = func_get_arg(4);
				$this->isAdmin = func_get_arg(5);
				break;
			case 7:
				$this->firstName = func_get_arg(0);
				$this->lastName = func_get_arg(1);
				$this->address = func_get_arg(2);
				$this->gender = func_get_arg(3);
				$this->phone = func_get_arg(4);
				$this->email = func_get_arg(5);
				$this->password = func_get_arg(6);
				break;
			case 9:
				$this->firstName = func_get_arg(0);
				$this->lastName = func_get_arg(1);
				$this->idMember = func_get_arg(2);
				$this->address = func_get_arg(3);
				$this->gender = func_get_arg(4);
				$this->phone = func_get_arg(5);
				$this->email = func_get_arg(6);
				$this->feesPaid = func_get_arg(7);
				$this->accBalance = func_get_arg(8);
				break;
			case 10:
				$this->firstName = func_get_arg(0);
				$this->lastName = func_get_arg(1);
				$this->idMember = func_get_arg(2);
				$this->address = func_get_arg(3);
				$this->gender = func_get_arg(4);
				$this->phone = func_get_arg(5);
				$this->email = func_get_arg(6);
				$this->isAdmin = func_get_arg(7);
				$this->feesPaid = func_get_arg(8);
				$this->accBalance = func_get_arg(9);	
				break;
			case 11:
				$this->firstName = func_get_arg(0);
				$this->lastName = func_get_arg(1);
				$this->idMember = func_get_arg(2);
				$this->address = func_get_arg(3);
				$this->gender = func_get_arg(4);
				$this->phone = func_get_arg(5);
				$this->email = func_get_arg(6);
				$this->typeMember = func_get_arg(7);
				$this->isAdmin = func_get_arg(8);
				$this->feesPaid = func_get_arg(9);
				$this->accBalance = func_get_arg(10);
				break;
			case 12:
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
				break;
		}
	}
	
	public function getFirstName() { return $this->firstName; } 
	public function getLastName() { return $this->lastName; } 
	public function getIdMember() { return $this->idMember; } 
	public function getAddress() { return $this->address; }
	public function getGender() { return $this->gender; } 
	public function getPhone() { return $this->phone; }
	public function getEmail() { return $this->email; } 
	public function getPassword() { return $this->password; } 
	public function getTypeMember() { return $this->typeMember; } 
	public function getIsAdmin() { return $this->isAdmin; }
	public function getFeesPaid() { return $this->feesPaid; }
	public function getAccBalance() { return $this->accBalance;}
	
	public function setFirstName($fname) { $this->firstName = $fname; } 
	public function setLastName($lname) { $this->lastName = $lname; }
	public function setIdMember($id) { $this->idMembre = $id; } 
	public function setAddress($address) { $this->address = $address; }
	public function setGender($gender) { $this->gender = $gender; } 
	public function setPhone($phone) { $this->phone = $phone; }
	public function setEmail($email) { $this->email = $email; } 
	public function setPassword($pass) { $this->password = $pass; } 
	public function setTypeMember($type) { $this->typeMember = $type; } 
	public function setIsAdmin($role) { $this->isAdmin = $role; }
	public function setFeesPaid($bool) { $this->feesPaid = $bool; }
	public function setAccBalance($acc) { $this->accBalance = $acc; }
	
}
?>