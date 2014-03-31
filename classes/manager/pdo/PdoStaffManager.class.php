<?php
require_once 'AbstractPdoManager.class.php';

class PdoStaffManager extends AbstractPdoManager{

	public function findAllMembers() {
	
		$results = array();

		$query = $this->pdo->prepare("
		SELECT *
		FROM members
		");
		
		$query->execute();

		while($result = $query->fetch(PDO::FETCH_OBJ)) {
			$results[] = new Members($result->firstName, $result->lastName, $result->idMember, $result->address, $result->gender, $result->phone, $result->email, $result->password, $result->typeMember, $result->isAdmin, $result->feesPaid, $result->accBalance);
		}

		$query->closeCursor();

		return $results;		
	}
	
	public function findMemberByNames($fName, $lName) {
	
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

		return $results;	
	
	}
	
	public function findSingleMemberByEmail($email, $typeMember) {
	
		$results = array();
		$resultsBis = array();
		
		$query = $this->pdo->prepare('SELECT *
									  FROM members WHERE email = :email
									 ');
		$query->bindValue(':email', $email);
			
		$query->execute();
			
		while($result = $query->fetch(PDO::FETCH_OBJ)) {
			$results[] = new Members($result->firstName, $result->lastName, $result->idMember, $result->address, $result->gender, $result->phone, $result->email, $result->password, $result->typeMember, $result->isAdmin, $result->feesPaid, $result->accBalance);
		}
			
		
		$query->closeCursor();
			
		if($typeMember == "member") return $results;
			
		else {
			
			$query = $this->pdo->prepare('SELECT *
										  FROM pilots WHERE email = :email
										 ');
			$query->bindValue(':email', $email);
			
			$query->execute();
			
			while($result = $query->fetch(PDO::FETCH_OBJ)) {
				$resultsBis[] = new Pilots($result->firstName, $result->lastName, $result->idMember, $result->address, $result->gender, $result->phone, $result->email, $result->password, $result->typeMember, $result->isAdmin, $result->feesPaid, $result->accBalance, $result->license, $result->FInumber);
			};
			
			$query->closeCursor();
			
			return $resultsBis;
			
		}
	}
	
	public function findSimpleMembers() {
	
		$results = array();
		
		$query = $this->pdo->prepare("
		SELECT *
		FROM members WHERE typeMember=:typeMember && isAdmin=:isAdmin
		");	
		
		$query->bindValue(':typeMember', 'member');
		$query->bindValue(':isAdmin', 0);
		
		$query->execute();
		
		while($result = $query->fetch(PDO::FETCH_OBJ)) {
			$results[] = new Members($result->firstName, $result->lastName, $result->idMember, $result->address, $result->gender, $result->phone, $result->email, $result->password, $result->typeMember, $result->isAdmin, $result->feesPaid, $result->accBalance);
		}
		
		$query->closeCursor();
		
		return $results;

	}
	
	public function findPilots() {

		$results = array();
	
		$query = $this->pdo->prepare("
		SELECT *
		FROM pilots
		");
		
		$query->execute();
		
		while($result = $query->fetch(PDO::FETCH_OBJ)) {
			$results[] = new Pilots($result->firstName, $result->lastName, $result->idMember, $result->address, $result->gender, $result->phone, $result->email, $result->password, $result->typeMember, $result->isAdmin, $result->feesPaid, $result->accBalance, $result->license, $result->FInumber);
		}
		
		$query->closeCursor();
		
		return $results;
	}	
	
	public function findStaffMembers() {
	
		$results = array();
		
		$query = $this->pdo->prepare("
		SELECT firstName, lastName, idMember, address, gender, phone, email, typeMember, isAdmin, feesPaid, accBalance
		FROM staff
		");
		
		$query->execute();
		
		while($result = $query->fetch(PDO::FETCH_OBJ)) {
			$results[] = new Staff($result->firstName, $result->lastName, $result->idMember, $result->address, $result->gender, $result->phone, $result->email, $result->typeMember, $result->isAdmin, $result->feesPaid, $result->accBalance);
		}
		
		$query->closeCursor();
		
		return $results;
	}
	
	public function globalAllMembersUpdate($email, $typeMember, $isAdmin, $feesPaid, $accBalance) {
	
		$memberManager = ManagerFactory::getMembersManager();
		
		$results = array();

		$query = $this->pdo->prepare("
		SELECT *
		FROM members
		WHERE email = :email
		");
		$query->bindValue(':email', $email);
		$query->execute();

		while($result = $query->fetch(PDO::FETCH_OBJ)) {
			$results[] = new Members($result->firstName, $result->lastName, $result->idMember, $result->address, $result->gender, $result->phone, $result->email, $result->password, $result->typeMember, $result->isAdmin, $result->feesPaid, $result->accBalance);
		}

		$query->closeCursor();
		$memberList = $results;
		foreach($memberList as $member) {
			$fName = $member->getFirstName();
			$lName = $member->getLastName();
			$id = $member->getIdMember();
			$addr = $member->getAddress();
			$gend = $member->getGender();
			$phon = $member->getPhone();
			$mail = $member->getEmail();
			$pass = $member->getPassword();
			$typeM = $member->getTypeMember();
			$isAdm = $member->getIsAdmin();
			$fees = $member->getFeesPaid();
			$accB = $member->getAccBalance();
		}
		
		$memberManager->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$memberManager->pdo->beginTransaction();
		
		if($isAdmin == "No") {
			$newIsAdmin = 0;
		}else {
			$newIsAdmin = 1;
		}
		
		if($feesPaid == "No") {
			$newFeesPaid = 0;
		}else $newFeesPaid = 1;
					

		try {
				$query2 = $memberManager->pdo->prepare("
				UPDATE members SET typeMember=:newTypeMember, isAdmin=:newIsAdmin, feesPaid=:newFeesPaid, accBalance=:newAccBalance
				WHERE email=:email
				");
						
				$query2->bindValue(':email', $email);
				$query2->bindValue(':newTypeMember', $typeMember);
				$query2->bindValue(':newIsAdmin', $newIsAdmin);
				$query2->bindValue(':newFeesPaid', $newFeesPaid);
				$query2->bindValue(':newAccBalance', $accBalance);
						
				if($query2->execute()) {
							
					$query2->closeCursor();
					$memberManager->pdo->commit();
										
				}else { echo "An error occured"; }
						
			}catch(Exception $e) {$memberManager->pdo->rollBack(); echo "Error".$e->getMessage(); }
		
		if($typeMember == "member") {
			
			if($typeMember != $typeM) {
					
					$memberManager->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$memberManager->pdo->beginTransaction();
					try {
							$query3 = $memberManager->pdo->prepare("
							DELETE FROM pilots WHERE email=:email
							");
							//echo "1";		
							$query3->bindValue(':email', $email);
							//echo "2";	
							if($query3->execute()) {
								//echo "3";		
								$query3->closeCursor();
								$memberManager->pdo->commit();
								//echo "4";					
							}else { echo "An error occured"; }
									
						}catch(Exception $e) {$memberManager->pdo->rollBack(); echo "Error".$e->getMessage(); }
				
						}
		}else {
			
			if($typeMember != $typeM) {
			
				$query4 = "INSERT INTO pilots (firstName, lastName, idMember, address, gender, phone, email, password, typeMember, isAdmin, feesPaid, accBalance, license, FInumber)
						   VALUES (:firstName, :lastName, :idMember, :address, :gender, :phone, :email, :password, 'pilot', :isAdmin, :feesPaid, :accBalance, '1', '0')";
						   
				$statement = $this->pdo->prepare($query4);
				
				$statement->bindValue(':firstName', $fName);
				$statement->bindValue(':lastName', $lName);
				$statement->bindValue(':address', $addr);
				$statement->bindValue(':gender', $gend);
				$statement->bindValue(':phone', $phon);
				$statement->bindValue(':email', $mail);
				$statement->bindValue(':password', $pass);
				$statement->bindValue(':isAdmin', $newIsAdmin);
				$statement->bindValue(':feesPaid', $newFeesPaid);
				$statement->bindValue(':accBalance', $accBalance);
				$statement->bindValue(':idMember', $id);
				
				$statement->execute();
			}else {
				$memberManager->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$memberManager->pdo->beginTransaction();
				try {
					$queryx = $memberManager->pdo->prepare("
					UPDATE pilots SET isAdmin=:newIsAdmin, feesPaid=:newFeesPaid, accBalance=:newAccBalance
					WHERE email=:email
					");
							
					$queryx->bindValue(':newIsAdmin', $newIsAdmin);
					$queryx->bindValue(':newFeesPaid', $newFeesPaid);
					$queryx->bindValue(':newAccBalance', $accBalance);
					$queryx->bindValue(':email', $email);
							
					if($queryx->execute()) {
								
						$queryx->closeCursor();
						$memberManager->pdo->commit();
											
					}else { echo "An error occured"; }
							
				}catch(Exception $e) {$memberManager->pdo->rollBack(); echo "Error".$e->getMessage(); }

			}
		}
		
		if($newIsAdmin == 1) {
			
			if($newIsAdmin != $isAdm) {
				
				$query5 = "INSERT INTO staff (firstName, lastName, idMember, address, gender, phone, email, password, typeMember, isAdmin, feesPaid, accBalance)
						   VALUES (:firstName, :lastName, :idMember, :address, :gender, :phone, :email, :password, :typeMember, '1', :feesPaid, :accBalance)";
						   
				$statement2 = $this->pdo->prepare($query5);
				
				$statement2->bindValue(':firstName', $fName);
				$statement2->bindValue(':lastName', $lName);
				$statement2->bindValue(':address', $addr);
				$statement2->bindValue(':gender', $gend);
				$statement2->bindValue(':phone', $phon);
				$statement2->bindValue(':email', $mail);
				$statement2->bindValue(':password', $pass);
				$statement2->bindValue(':typeMember', $typeMember);
				$statement2->bindValue(':feesPaid', $newFeesPaid);
				$statement2->bindValue(':accBalance', $accBalance);
				$statement2->bindValue(':idMember', $id);
				
				$statement2->execute();
			}else {
				$memberManager->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$memberManager->pdo->beginTransaction();
				try {
					$queryy = $memberManager->pdo->prepare("
					UPDATE staff SET typeMember=:newTypeMember, feesPaid=:newFeesPaid, accBalance=:newAccBalance
					WHERE email=:email
					");
							
					$queryy->bindValue(':newTypeMember', $typeMember);
					$queryy->bindValue(':newFeesPaid', $newFeesPaid);
					$queryy->bindValue(':newAccBalance', $accBalance);
					$queryy->bindValue(':email', $email);
							
					if($queryy->execute()) {
								
						$queryy->closeCursor();
						$memberManager->pdo->commit();
											
					}else { echo "An error occured"; }
							
				}catch(Exception $e) {$memberManager->pdo->rollBack(); echo "Error".$e->getMessage(); }
			}
	
		}else {
			
			if($newIsAdmin != $isAdm) {
				
				$memberManager->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$memberManager->pdo->beginTransaction();
				try {
						$query6 = $memberManager->pdo->prepare("
						DELETE FROM staff WHERE email=:email
						");
									
						$query6->bindValue(':email', $email);
									
						if($query6->execute()) {
										
							$query6->closeCursor();
							$memberManager->pdo->commit();
													
						}else { echo "An error occured"; }
									
					}catch(Exception $e) {$memberManager->pdo->rollBack(); echo "Error".$e->getMessage(); }
				
			}
		}
	}

}
?>