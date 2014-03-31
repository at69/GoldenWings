<?php
interface MembersManager {
	
	function authenticate($email, $password);
	function register($firstName, $lastName, $address, $gender, $phone, $email, $password, $vpassword, $typeMember, $FInumber, $isAdmin);
	function changePassword($email, $oldPassword, $newPassword, $retypedNewPass);
	function sendPassRecoveryMail($email);
	function passwordRecovery($email);
	function findInstructors();
	function findPilotById();
	function findInstructorByNames($fName, $lName);
	
}

?>