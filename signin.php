<script type='text/javascript' src='js/register.js'></script> 
<?php
require 'required.php';

$membersManager = ManagerFactory::getMembersManager();

if($_POST['typeMember'] == "0" && $_POST['isAdmin'] == "false") {
			
	$member = $membersManager->register($_POST['fname'], $_POST['lname'], $_POST['address'], $_POST['gender'], $_POST['phone'], $_POST['email'], $_POST['pass'], $_POST['pass2'], $_POST['typeMember'], $_POST['FInum'], $_POST['isAdmin']);
}else if(isset($_POST['FInum']) && isset($_POST['proof']) && $_POST['proof'] == "P170T" && $_POST['isAdmin'] == "false") {
		
	$pilot = $membersManager->register($_POST['fname'], $_POST['lname'], $_POST['address'], $_POST['gender'], $_POST['phone'], $_POST['email'], $_POST['pass'], $_POST['pass2'], $_POST['typeMember'], $_POST['FInum'], $_POST['isAdmin']);
}else if($_POST['isAdmin'] == "true" && $_POST['proof2'] == "S74Ff") {
		
	$staff = $membersManager->register($_POST['fname'], $_POST['lname'], $_POST['address'], $_POST['gender'], $_POST['phone'], $_POST['email'], $_POST['pass'], $_POST['pass2'], $_POST['typeMember'], $_POST['FInum'], $_POST['isAdmin']);
}

?>