<?php
require_once 'AbstractPdoManager.class.php';

class PdoMembersManager extends AbstractPdoManager{
	
	
	public function authenticate($email, $password) {
		$query = $this->pdo->prepare('SELECT * FROM members WHERE email=:email');
		
		$query->bindValue(':email', $email);
		$query->execute();
		
		$result = $query->fetch(PDO::FETCH_OBJ);
		
		$passwordHash = sha1($password);
	
		if($result && $result->password == $passwordHash) {
		
			if($result->typeMember == "member" && $result->isAdmin == 0) {
			
				return new Members($result->firstName, $result->lastName, $result->idMember, $result->address, $result->gender, $result->phone, $result->email, $result->password, $result->typeMember, $result->isAdmin, $result->feesPaid, $result->accBalance);
				
			}else if($result->isAdmin == 1) {
			
				if($result->typeMember == "member") {
				
					return new Staff($result->firstName, $result->lastName, $result->idMember, $result->address, $result->gender, $result->phone, $result->email, $result->password, $result->typeMember, $result->isAdmin, $result->feesPaid, $result->accBalance);	
				 
				}else if($result->typeMember == "pilot") {
					
							$query2 = $this->pdo->prepare('SELECT * FROM pilots WHERE email=:email');
		
							$query2->bindValue(':email', $email);
							$query2->execute();
		
							$result2 = $query2->fetch(PDO::FETCH_OBJ);
		
							return new Pilots($result2->firstName, $result2->lastName, $result2->idMember, $result2->address, $result2->gender, $result2->phone, $result2->email, $result2->password, $result2->typeMember, $result2->isAdmin, $result2->feesPaid, $result2->accBalance, $result2->license, $result2->FInumber);
				
				}
			}else if($result->typeMember == "pilot" && $result->isAdmin == 0) {
			
				$query2 = $this->pdo->prepare('SELECT * FROM pilots WHERE email=:email');
		
				$query2->bindValue(':email', $email);
				$query2->execute();
		
				$result2 = $query2->fetch(PDO::FETCH_OBJ);
	
				return new Pilots($result2->firstName, $result2->lastName, $result2->idMember, $result2->address, $result2->gender, $result2->phone, $result2->email, $result2->password, $result2->typeMember, $result2->isAdmin, $result2->feesPaid, $result2->accBalance, $result2->license, $result2->FInumber);
			
			}
		}
	}
	
	public function register($firstName, $lastName, $address, $gender, $phone, $email, $password, $vpassword, $typeMember, $FInum, $isAdmin) {
		
		$error = false;
		$registerOK = false;
		$nbRows = 0;
		$nbRows0 = 0;
		
		
		if($firstName == NULL || $lastName == NULL || $address == NULL || $phone == NULL || $email == NULL || $password == NULL || $vpassword == NULL){
		
			$error = true;
			$errorMSG = "Some fields have to be filled out.";
			
		}else if($password == $vpassword){  //Si tous les champs sont remplis et si les mots de passe correspondent
		
			//On s'assure que l'utilisateur n'a pas utilisé son prénom ou son nom comme mot de passe
			if($firstName != $password && $lastName != $password){
			
				if(strlen($email) < 60){
					
					//On s'assure que le membre n'existe pas déjà dans la BDD
					$statement = $this->pdo->prepare("SELECT firstName, lastName, email FROM members WHERE email=:email || firstName=:firstName && lastName=:lastName");
					
					$statement->bindValue(':email', $email);
					$statement->bindValue(':firstName', $firstName);
					$statement->bindValue(':lastName', $lastName);
					
					if($statement->execute()){
					
						while($row = $statement->fetch()) {
						 $nbRows = $nbRows + 1;
						}
					}else {
					
						$error = true;
						$errorMSG = "Something went wrong. Please contact an administrator";
					
				}
				
			   
					// Si $nbRows est égal à 0 c'est que l'e-mail n'est pas déjà utilisé
					if($nbRows == 0){
					
						
						//On s'assure que l'e-mail entrée est valide
						if(filter_var($email, FILTER_VALIDATE_EMAIL)){
						
							//On vérifie que le mot de passe ne fait pas plus de 60 caractères (contrainte définie dans la base)
							if(strlen($password) < 60){
								
								//On vérifie que le prénom et le nom ne dépassent pas 60 caractères (contraintes définies dans la base)
								if(strlen($firstName) < 60 && strlen($lastName) < 60){
									
										//Tout est en ordre, on procède donc à la préparation de l'inscription dans la BDD en veillant à hasher le mdp par mesure de sécurité
										$passwordHash = sha1($password);
										$query2 = "INSERT INTO members (firstName, lastName, address, gender, phone, email, password, typeMember, isAdmin, feesPaid, accBalance) 
										VALUES (:firstName, :lastName, :address, :gender, :phone, :email, :password, :typeMember, :isAdmin, '0', '0')";
										$statement2 = $this->pdo->prepare($query2);
										
										$statement2->bindValue(':firstName', $firstName);
										$statement2->bindValue(':lastName', $lastName);
										$statement2->bindValue(':address', $address);
										$statement2->bindValue(':gender', $gender);									
										$statement2->bindValue(':phone', $phone);
										$statement2->bindValue(':email', $email);
										$statement2->bindValue(':password', $passwordHash);
										
									if($typeMember == "0") {
									
										$statement2->bindValue(':typeMember', 'member');
										if($isAdmin == "true") {
											$statement2->bindValue(':isAdmin', 1);
										}else $statement2->bindValue(':isAdmin', 0);
										$result2 = $statement2->execute();
							
									}else {
										
										if($FInum != NULL) {
											//On s'assure que le FInumber n'existe pas déjà dans la BDD
											$statement0 = $this->pdo->prepare("SELECT FInumber FROM pilots WHERE FInumber=:FInum");
						
											$statement0->bindValue(':FInum', $FInum);
						
											if($statement0->execute()){
							
												while($row0 = $statement0->fetch()) {
													$nbRows0 = $nbRows0 + 1;
												}
											}else {
												$error = true;
												$errorMSG = "Something went wrong. Please contact an administrator";
											
											}
										}
			   
										// Si $nbRows est égal à 0 c'est que le FInumber n'est pas déjà utilisé
										if($nbRows0 == 0 || $FInum == NULL){
										
											$statement2->bindValue(':typeMember', 'pilot');
											if($isAdmin == "true") {
												$statement2->bindValue(':isAdmin', 1);
											}else $statement2->bindValue(':isAdmin', 0);
											
											$result2 = $statement2->execute();
											
											if(!isset($memberManager)) $memberManager = ManagerFactory::getStaffManager();
											$memberList = $memberManager->findMemberByNames($firstName, $lastName);
											
											foreach($memberList as $member) {
												$idNewUser = $member->getIdMember();
											}
											
											//insert dans pilot
											$query3 = "INSERT INTO pilots (firstName, lastName, idMember, address, gender, phone, email, password, typeMember, isAdmin, feesPaid, accBalance, license, FInumber)
											VALUES (:firstName, :lastName, :idMember, :address, :gender, :phone, :email, :password, 'pilot', :isAdmin, '0', '0', '1', :FInumber)";
											
											$statement3 = $this->pdo->prepare($query3);
											
											$statement3->bindValue(':firstName', $firstName);
											$statement3->bindValue(':lastName', $lastName);
											$statement3->bindValue(':address', $address);
											$statement3->bindValue(':gender', $gender);									
											$statement3->bindValue(':phone', $phone);
											$statement3->bindValue(':email', $email);
											$statement3->bindValue(':password', $passwordHash);
											$statement3->bindValue(':idMember', $idNewUser);
											
											if($isAdmin == "true") {
												$statement3->bindValue(':isAdmin', 1);
											}else $statement3->bindValue(':isAdmin', 0);
											if($FInum != NULL) {
												$statement3->bindValue(':FInumber', $FInum);
											}else{
												$FInum = "none"; //insérera 0 puisque la colonne FInumber n'accepte que des nombres
												$statement3->bindValue(':FInumber', $FInum);
											}
											$result3 = $statement3->execute();
											if(!$result3) {
												$error = true;
												$errorMSG = "Something went wrong when inserting your information in pilot database. Please contact an administrator";
											}
										}
									}
									
									if($isAdmin == "true" && $result2) {
									
										if(!isset($memberManager)) $memberManager = ManagerFactory::getStaffManager();
											$memberList = $memberManager->findMemberByNames($firstName, $lastName);
											
										foreach($memberList as $member) {
											$idNewUser = $member->getIdMember();
										}
										
										//insert dans staff
										$query4 = "INSERT INTO staff (firstName, lastName, idMember, address, gender, phone, email, password, typeMember, isAdmin, feesPaid, accBalance) 
										VALUES (:firstName, :lastName, :idMember, :address, :gender, :phone, :email, :password, :typeMember, '1', '0', '0')";
										$statement4 = $this->pdo->prepare($query4);
										
										$statement4->bindValue(':firstName', $firstName);
										$statement4->bindValue(':lastName', $lastName);
										$statement4->bindValue(':address', $address);
										$statement4->bindValue(':gender', $gender);									
										$statement4->bindValue(':phone', $phone);
										$statement4->bindValue(':email', $email);
										$statement4->bindValue(':password', $passwordHash);
										$statement4->bindValue(':idMember', $idNewUser);
										if($typeMember == "0") {
											$statement4->bindValue(':typeMember', 'member');
										}else $statement4->bindValue(':typeMember', 'pilot');
										
										$result4 = $statement4->execute();
										if(!$result4) {
											$error = true;
											$errorMSG = "Something went wrong when inserting your information in staff database. Please contact an administrator";
										}
									}
										
										
									//On vérifie la réussite de la requête...
									if(isset($result2)){
										if($result2) {
											//On met la variable registerOK à vrai (l'inscription est finalisée)
											$registerOK = true;
											//On indique à l'utilisateur que l'inscription est courronnée de succès
											$registerMSG = "Registration successful. You can now log in.";
										}
									}
									
									//Sinon on spécifie à l'utilisateur que l'inscription a échoué.
									else{
										
										$error = true;
										$errorMSG = "An error occured when inserting your information in the member database. Please contact an administrator.";
										
									}
								}
								
								//Sinon on indique à l'utilisateur que son prénom et/ou son nom sont trop longs
								else{
								
									$error = true;
									$errorMSG = "Your first and last names mustn't exceed 60 characters.";
									
								}
							}

								//Si le mdp dépasse 60 caractères
								else{
								
									$error = true;
									$errorMSG = "Your password mustn't exceed 60 characters.";
									
								}
						}

							//Si l'e-mail est incorrecte
							else{
							
								$error = true;
								$errorMSG = "Email is incorrect.";
								
							}
					}
					
						//Si un utilisateur avec ces infos est déjà inscrit
						else{
						
							$error = true;
							$errorMSG = "A user is already registered with this information.";
							
						}
				}
				
					//Si l'e-mail excède 60 caractères
					else{
						
						$error = true;
						$errorMSG = "Email mustn't exceed 60 characters.";
						
					}
			}
			
			//Si le mot de passe est le même que le prénom et/ou le nom 
			else{
				
				$error = true;
				$errorMSG = "Your password mustn't be the same as your first name and/or your last name.";
				
			}
		}
		
			//Si les mots de passe ne correspondent pas
			else if($password != $vpassword){
			
				$error = true;
				$errorMSG = "Password and confirmation password must have the same value.";
				
			}
			
				/* Affichage des erreurs */	
			if($error == true) {echo '<p align="center" style="color:red;">'.$errorMSG.'</p>';}		
			
				/* Affichage de la réussite de l'inscription */
			if($registerOK == true && $error == false) {echo '<p align="center" style="color:green;">'.$registerMSG.'</p>';}
	}
	
	public function changePassword($email, $oldPassword, $newPassword, $retypedNewPass) {
		
		$oldPass = sha1($oldPassword);
		$newPass = sha1($newPassword);
		
		$select = $this->pdo->prepare('SELECT password FROM members WHERE email=:email');
		
		$select->bindValue(':email', $email);
		if($select->execute()) {
		
			$result = $select->fetch(PDO::FETCH_OBJ);
			
			if($result->password == $oldPass) {
				if($newPassword == $retypedNewPass) {
					$memberManager = ManagerFactory::getMembersManager();
					
					$memberManager->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$memberManager->pdo->beginTransaction();
					try {
						$query = $memberManager->pdo->prepare("
							UPDATE members SET password=:password
							WHERE email=:email
							");
						
						$query->bindValue(':password', $newPass);
						$query->bindValue(':email', $email);
						
						if($query->execute()) {
							
							$query->closeCursor();
							$memberManager->pdo->commit();
							
							return true;
										
							}else { echo "An error occured"; }
						
					}catch(Exception $e) {$memberManager->pdo->rollBack(); echo "Error".$e->getMessage(); }
				} else echo "The new password in the two fields isn't the same";
			} else echo "Wrong password";
		} else echo "Invalid e-mail address";
	}
	
	public function sendPassRecoveryMail($email) {
	
		$state = "An e-mail has been sent to '$email'";
		$header = "From: staff@goldenwings.com";
		$subject = "Recover your password on Golden Wings";
		
		
		$message = "Dear member, \n\n";
		$message .= "You requested that we help you to recover your password on Golden Wings.\n";
		$message .= "We have modified you password for: R3C0V3RY \n";
		$message .= "For safety reasons, we ask you to modify this password after logged in.\n\n\n";
		$message .= "Sincerely,\n\n";
		$message .= "Team Golden Wings.\n\n";
		$message .= "PS: Please do not answer to this e-mail.";
		
		ini_set("SMTP", "smtp.gmail.com");
		ini_set("smtp_port", 587);
		ini_set("sendmail_from", "nainfrag@gmail.com");
		ini_set("sendmail_path", "C:\wamp\www\GoldenWings\sendmail\sendmail.exe");
		if(mail($email, $subject, $message, $header)) echo $state;
		else { 
			$state = "Can't send an e-mail to '$email'";
			echo $state;
		}
		
	}
	
	public function passwordRecovery($email) {
	
		$memberManager = ManagerFactory::getMembersManager();
		
		$memberManager->sendPassRecoveryMail($email);
		
		$recovPass = sha1('R3C0V3RY');
					
		$memberManager->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$memberManager->pdo->beginTransaction();
		try {
			 $query = $memberManager->pdo->prepare("
			 UPDATE members SET password=:password
			 WHERE email=:email
			 ");
						
			$query->bindValue(':password', $recovPass);
			$query->bindValue(':email', $email);
						
			if($query->execute()) {
							
			$query->closeCursor();
			$memberManager->pdo->commit();
							
			return true;
										
			}else { echo "An error occured"; }
						
			}catch(Exception $e) {$memberManager->pdo->rollBack(); echo "Error".$e->getMessage(); }
	

	}
	
	public function findInstructors() {
	
		$results = array();
		
		if($_SESSION['user']->getTypeMember() == "member") {
		
			$query = $this->pdo->prepare("
			SELECT firstName, lastName, FInumber
			FROM pilots WHERE FInumber != :FInum && license = :license
			");
			
		}else {
		
			$query = $this->pdo->prepare("
			SELECT firstName, lastName, FInumber
			FROM pilots WHERE FInumber != :FInum && FInumber != :FInum2 && license = :license
			");
			
			$query->bindValue(':FInum2', $_SESSION['user']->getFInumber());
		}
		
		$query->bindValue(':FInum', 0);
		$query->bindValue(':license', 1);
		
		$query->execute();
		
		while($result = $query->fetch(PDO::FETCH_OBJ)) {
			$results[] = new Pilots($result->firstName, $result->lastName, $result->FInumber);
		}

		$query->closeCursor();

		return $results;
		
	}
	
	/* 
		Cette fonction permet à un pilote de se trouver dans la liste des instructeurs lors d'une réservation
		Ainsi le pilote peut réserver un avion pour lui ou prendre un vol d'instruction s'il juge par exemple
		ne pas être assez expérimenté
	*/
	public function findPilotById() {
	
		$results = array();
		
		$query = $this->pdo->prepare("
		SELECT firstName, lastName, FInumber
		FROM pilots WHERE idMember = :idM
		");
		
		$query->bindValue(':idM', $_SESSION['user']->getIdMember());
		
		$query->execute();
		
		while($result = $query->fetch(PDO::FETCH_OBJ)) {
			$results[] = new Pilots($result->firstName, $result->lastName, $result->FInumber);
		}

		$query->closeCursor();

		return $results;
		
	}
	
	/* Cette fonction permet de récupérer le FI number du pilote, ce qui évite d'avoir à le spécifier lors d'une location.
		Pratique quand par exemple un élève ne connaît pas le FI number de son instructeur.
	*/
	public function findInstructorByNames($fName, $lName) {
	
		$results = array();

		$query = $this->pdo->prepare("
		SELECT firstName, lastName, FInumber
		FROM pilots WHERE firstName = :fName && lastName = :lName
		");
		
		$query->bindValue(':fName', $fName);
		$query->bindValue(':lName', $lName);
		
		$query->execute();

		while($result = $query->fetch(PDO::FETCH_OBJ)) {
			$results[] = new Pilots($result->firstName, $result->lastName, $result->FInumber);
		}

		$query->closeCursor();

		return $results;	
	
	}
}	
?>