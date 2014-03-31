<?php
require 'required.php';

if (isset($_POST['changePass'])) {

	$MembersManager = ManagerFactory::getMembersManager();
	if($member = $MembersManager->changePassword($_POST['email'], $_POST['oldPass'], $_POST['newPass'], $_POST['cNewPass'])) {
		echo "Password successfully changed.";
	}
	
} else if(isset($_POST['reset'])) {
		
	$MembersManager = ManagerFactory::getMembersManager();
	$member = $MembersManager->passwordRecovery($_POST['mail']);

  }

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
		<title>GoldenWings - Personal account</title>
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
	
		<div id="header">
			<?php include "header.php" ?>
		</div>
		<style type="text/css">
			h1 { margin-left: 200px; }
		</style>
			
		<form action="account.php" method="POST">
		<style type="text/css">
			tr, td { text-align : left; align: left; }
		</style>
			
			<?php if(isset($_SESSION['user'])) { ?>
			
			<h1><strong>Password Changing</strong></h1> <br/>
			<center>
			<table>
			
			<tr>
           
            <td><label for="email"><strong>E-mail of this account:</strong></label></td>
            <td><input type="text" name="email" id="email"/></td>
           
            </tr>
			
			<tr>
           
            <td><label for="oldPass"><strong>Old password:</strong></label></td>
            <td><input type="password" name="oldPass" id="oldPass"/></td>
           
            </tr>	
			
			<tr>
           
            <td><label for="newPass"><strong>New password:</strong></label></td>
            <td><input type="password" name="newPass" id="newPass"/></td>
           
            </tr>
			
			<tr>
           
            <td><label for="cNewPass"><strong>New password (confirmation):</strong></label></td>
            <td><input type="password" name="cNewPass" id="cNewPass"/></td>
           
            </tr>			
			
			</table>
			<br/>
			
			<input type="submit" name="changePass" value="Change my password!"/> <br/> <br/> <?php } ?>
			</center>
			<h1><strong>Password Recovery</strong></h1> 
			<center>
			Will send you an e-mail with a new password. Then you have to change it after logged in. <br/><br/>
			
			<table>
			
			<tr>
           
            <td><label for="mail"><strong>E-mail of this account:</strong></label></td>
            <td><input type="text" name="mail" id="mail"/></td>
           
            </tr>
			
			</table>
			<br/>
			
			<input type="submit" name="reset" value="Send!"/> 
			
		</form>
		</center>
	</body>
</html>