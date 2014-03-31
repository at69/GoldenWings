<?php

require 'required.php';

$membersManager = ManagerFactory::getMembersManager();

if(isset($_POST['register'])) {
	if($_POST['typeMember'] == "0" && $_POST['isAdmin'] == "false") {
				
		$member = $membersManager->register($_POST['fname'], $_POST['lname'], $_POST['address'], $_POST['gender'], $_POST['phone'], $_POST['email'], $_POST['pass'], $_POST['pass2'], $_POST['typeMember'], $_POST['FInum'], $_POST['isAdmin']);
	}else if(isset($_POST['FInum']) && isset($_POST['proof']) && $_POST['proof'] == "P170T" && $_POST['isAdmin'] == "false") {
			
		$pilot = $membersManager->register($_POST['fname'], $_POST['lname'], $_POST['address'], $_POST['gender'], $_POST['phone'], $_POST['email'], $_POST['pass'], $_POST['pass2'], $_POST['typeMember'], $_POST['FInum'], $_POST['isAdmin']);
	}else if($_POST['isAdmin'] == "true" && $_POST['proof2'] == "S74Ff") {
			
		$staff = $membersManager->register($_POST['fname'], $_POST['lname'], $_POST['address'], $_POST['gender'], $_POST['phone'], $_POST['email'], $_POST['pass'], $_POST['pass2'], $_POST['typeMember'], $_POST['FInum'], $_POST['isAdmin']);
	}
}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
		<title>GoldenWings - Registration</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="js/register.js"></script>
	</head>
	<body>
	
		<div id="header">
			<?php include "header.php" ?>
		</div>

	
		<form action="#" method="POST"> <?php // onSubmit="signin(this.fname.value, this.lname.value, this.address.value, this.gender[0].checked, this.phone.value, this.email.value, this.pass.value, this.pass2.value, this.typeMember.value, this.proof.value, this.FInum.value, this.isAdmin[0].checked, this.proof2.value); return false" ?>
		<div id="msg"></div>
		<style type="text/css">
			table { width : 50%; }
			tr { width : 50%; text-align : left; }
			h1 { margin-left: 200px; }
		</style>	
			
			<h1>About you</h1>
			<center>
				<table>
					<tr>
					
						<td><label for="fname"><strong>First Name:</strong></label></td>
						<td><input type="text" name="fname" id="fname"/></td>
											
					</tr>
					<tr id="fn" style="display: none;"><td><div id="er_msg_fname"></div></td></tr>	
				   <tr>
				   
						<td><label for="lname"><strong>Last Name:</strong></label></td>
						<td><input type="text" name="lname" id="lname"/></td>
					
				   </tr>
				   <tr id="ln" style="display: none;"><td><div id="er_msg_lname"></div></td></tr> 
				   <tr>
				   
						<td><label for="address"><strong>Address:</strong></label></td>
						<td><input type="text" name="address" id="address"/></td>
					
				   </tr>
					<tr id="adr" style="display: none;"><td><div id="er_msg_adr"></div></td></tr>
					<tr>
					
						<td><label for="gender"><strong>Gender:</strong></label></td>
						<td><strong>Male</strong><input type="radio" name="gender" value="male" checked=checked/>
						<strong>Female</strong><input type="radio" name="gender" value="female"/></td>
					
					</tr>
					
					<tr>
					
						<td><label for="phone"><strong>Phone number:</strong></label></td>
						<td><input type="text" name="phone" id="phone"/></td>
					
					</tr>
					<tr id="ph" style="display: none;"><td><div id="er_msg_phone"></div></td></tr>
					<tr>
					
						<td><label for="email"><strong>E-mail:</strong></label></td>
						<td><input type="text" name="email" id="email"/></td>
				   
					</tr>
					<tr id="eml" style="display: none;"><td><div id="er_msg_eml"></div></td></tr>
					<tr>
				   
						<td><label for="pass"><strong>Password:</strong></label></td>
						<td><input type="password" name="pass" id="pass"/></td>
					
					</tr>
					<tr id="passw" style="display: none;"><td><div id="er_msg_pass"></div></td></tr>
					<tr>
					
						<td><label for="pass2"><strong>Password Confirmation:</strong></label></td>
						<td><input type="password" name="pass2" id="pass2"/></td>
					
					</tr>
					<tr id="passw2" style="display: none;"><td><div id="er_msg_pass2"></div></td></tr>
				</table>
				
				<br/>
			</center>
			
			<h1>Account rights</h1>
			<center>
				<table>
					<tr>
						
						<td><label for="typeMember"><strong>Type of account:</strong></label></td>
						<td><select name="typeMember" id="typeMember" onchange="showHide('isPilot0'); showHide('isPilot1');">
														<option value="0">Member</option>
														<option value="1">Pilot</option>
							</select></td>
					
					</tr>
					
					<script>
						function showHide (id) {
						  //if the element is hidden, showHide = block; else showHide = hidden
						  var showHide = (document.getElementById(id).style.display == 'none' ) ? 'block' : 'none';
						  //new value for the element
						  document.getElementById(id).style.display = showHide
						}
					</script>
					
					<tr id="isPilot0" style="display: none;">
						
						<td><label for="FInum"><strong>FI number:</strong></label></td>
						<td><input type="text" name="FInum" id="FInum" /></td>
						
					</tr>
					<tr id="fi" style="display: none;"><td><div id="er_msg_fi"></div></td></tr>
				</table>
				
				<div id="isPilot1" style="display: none;">
				
					<div id="phr0" style="margin-left: -445px;">
						Flight Instructor number, only if you are an instructor.
					</div>
					
					<br/>
				
					<table>
					
						<tr>
							<td><label for="proof"><strong>Pilots password:</strong></label></td>
							<td><input type="password" name="proof" id="proof"/></td>
						</tr>
						<tr id="p_pass" style="display: none;"><td><div id="er_msg_p_pass"></div></td></tr>
					</table>
					
					<div id="phr1" style="margin-left: -187px;">
						Password that will prove that you are a pilot. Nothing will happen if you enter a wrong password.</div>
						<br/><br/>
					
					
				</div>
				
				<table>
				
					<tr>
						<td><label for="isAdmin"><strong>Staff?:</strong></label></td>
						<td><strong>Yes</strong><input type="radio" name="isAdmin" value="true" onChange="showHide('isStaff0'); showHide('isStaff1');"/>
						<strong>No</strong><input type="radio" name="isAdmin" value="false" checked=checked onChange="showHide('isStaff0'); showHide('isStaff1');"/></td>	
					</tr>
					
					
					<tr id="isStaff0" style="display: none;">
						<td><label for="proof2"><strong>Staff password:</strong></label></td>
						<td><input type="password" name="proof2" id="proof2"/></td>
					</tr>
					<tr id="s_pass" style="display: none;"><td><div id="er_msg_s_pass"></div></td></tr>
				</table>
				
				<div id="isStaff1" style="display: none;">
					<div id="phr2" style="margin-left: -457px;">Password that will prove that you are a staff member.</div>
					<div id="phr3" style="margin-left: -467px;">Nothing will happen if you enter a wrong password.</div>
				</div>
				<br/><br/>
				
				<input type="submit" name="register" value="Submit"/>
				
			</form> <br/><br/>
					<strong><a href="login.php"><h2 style="margin-left: -620px;">Log in here</h2></a></strong> 
		</center>
		<br/>
	</body>
</html>