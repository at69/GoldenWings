<?php
require 'required.php';

if(isset($_SESSION['user']) && $_SESSION['user']->getIsAdmin() == 1) { ?>
	
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
	<html>
		<head>
			<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
			<title>GoldenWings - Detailed account member</title>
			<link href="style.css" rel="stylesheet" type="text/css">
			<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
			<link type="text/css" href="css/table.css" rel="stylesheet">
		</head>
		<body>
		
			<div id="header">
				<?php include "header.php" ?>
			</div>
			<style type="text/css">
				td, th { border : 1px solid; border-collapse: collapse;}
			</style>
			
			<div style="margin-top: 35px; margin-left: 400px;">
			<form id="disp">
			Display option: <select name="dispOpt" id="dispOpt">
													<option>--Type of member--</option>
													<option>All members</option>
													<option>Simple members</option>
													<option>Pilots</option>
													<option>Staff members</option>
							</select>
			</form>
			</div>
			
			<script>	
				$(document).ready(function () {
					var selectMenu = document.getElementById("dispOpt");
					selectMenu.onchange = function(){
						var chosenOption = $(this).val();
						window.location.href = "manageMembers.php?display=" + chosenOption;
					}
				});

			</script>	
<?php

	if(isset($_GET['email']) && isset($_GET['typeMember'])) {
		if(!isset($membersManager)) $membersManager = ManagerFactory::getStaffManager();
		$memberByEmail = $membersManager->findSingleMemberByEmail($_GET['email'], $_GET['typeMember']);
		
		if(isset($memberByEmail)) {
		
			$count = 0;
			foreach($memberByEmail as $member) {
				$count = $count + 1;
			}
			
			if($count != 0) { ?>
			
				<center>
				<form action="#" method="POST">
					<table>
						<?php foreach($memberByEmail as $member) { ?>
								<tr>
           
									<td><label for="fname"><strong>First Name:</strong></label></td>
									<td><?php echo $member->getFirstName(); ?></td>
           
								</tr>
								<tr>
           
									<td><label for="lname"><strong>Last Name:</strong></label></td>
									<td><?php echo $member->getLastName(); ?></td>
           
								</tr>
								<tr>
           
									<td><label for="id"><strong>ID:</strong></label></td>
									<td><?php echo $member->getIdMember(); ?></td>
           
								</tr>
								<tr>
           
									<td><label for="address"><strong>Address:</strong></label></td>
									<td><?php echo $member->getAddress(); ?></td>
           
								</tr>
								<tr>
           
									<td><label for="gender"><strong>Gender:</strong></label></td>
									<td><?php echo $member->getGender(); ?></td>
           
								</tr>
								<tr>
           
									<td><label for="phone"><strong>Phone:</strong></label></td>
									<td><?php echo '0'.$member->getPhone(); ?></td>
           
								</tr>
								<tr>
           
									<td><label for="email"><strong>E-mail:</strong></label></td>
									<td><?php echo $member->getEmail(); ?></td>
           
								</tr>
								<tr>
           
									<td><label for="typeMember"><strong>Type of Member:</strong></label></td>
									<td><?php echo $member->getTypeMember(); ?></td>
           
								</tr>
								<tr>
           
									<td><label for="admin"><strong>Admin?:</strong></label></td>
									<td><?php if($member->getIsAdmin() == 0) echo "No"; else echo "Yes"; ?> </td>
           
								</tr>
								<tr>
           
									<td><label for="feesPaid"><strong>Fees paid?:</strong></label></td>
									<td><?php if($member->getFeesPaid() == 0) echo "No"; else echo "Yes"; ?> </td>
           
								</tr>
								<tr>
           
									<td><label for="accBalance"><strong>Account Balance:</strong></label></td>
									<td><?php echo $member->getAccBalance(); ?></td>
           
								</tr>
								<?php 
								if($member->getTypeMember() == "pilot") $license = $member->getLicense();
								if(isset($license)) { ?>
									<tr>
			   
										<td><label for="license"><strong>License:</strong></label></td>
										<td><?php if($member->getLicense() == 1) echo "Yes"; else echo "No"; ?></td>
			   
									</tr>
									<tr>
			   
										<td><label for="FInum"><strong>FI Number:</strong></label></td>
										<td><?php echo $member->getFInumber(); ?></td>
			   
									</tr>									
						<?php	} ?>
		
<?php						} ?>
					</table>
				</form>
				</center>
				<br/>
<?php		}else echo "<center><strong>No results<strong></center>";
		}
	} else echo "<br/><center><strong>You did not select an user.<strong></center>";
?>
		</body>
	</html>
<?php  } ?>
