<?php
require 'required.php';

if(isset($_SESSION['user']) && $_SESSION['user']->getIsAdmin() == 1) { ?>
	
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
		<head>
			<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
			<title>GoldenWings - Manage Members</title>
			<link href="style.css" rel="stylesheet" type="text/css">
			<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
			<link type="text/css" href="css/table.css" rel="stylesheet">
		</head>
		<body>
		
			<div id="header">
				<?php include "header.php" ?>
			</div>
			<style type="text/css">
				h1 { margin-left: 200px; }
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

	<?php	if(!isset($membersManager)) $membersManager = ManagerFactory::getStaffManager();
				
				if(isset($_POST['modify'])) {
				
					if($_GET['display'] == "All members") {
					
						$memberList = $membersManager->findAllMembers();
						
					}else if($_GET['display'] == "Simple members") {
					
						$memberList = $membersManager->findSimpleMembers();
						
					}else if($_GET['display'] == "Pilots") {
					
						$memberList = $membersManager->findPilots();
						
					}else if($_GET['display'] == "Staff members") {
					
						$memberList = $membersManager->findStaffMembers();
						
					}	
					 
					foreach($memberList as $member) {
						
						$newTypeMember = $_POST['typeMember'.$member->getIdMember()];
						$newIsAdmin = $_POST['isAdmin'.$member->getIdMember()];
						$newFeesP = $_POST['feesPaid'.$member->getIdMember()];
										
						if($newIsAdmin == "Yes") $newAdmin = 1;
						else $newAdmin = 0;
										
						if($newFeesP == "Yes") $newFP = 1;
						else $newFP = 0;
										
						$newAccBalance = $_POST['accBal'.$member->getIdMember()];
										
						$membersManager->globalAllMembersUpdate($member->getEmail(), $newTypeMember, $newAdmin, $newFP, $newAccBalance);
					}
			
								
				}				
				
				
				if(isset($_GET['display'])) {	
					if($_GET['display'] == "All members") {
					
						$memberList = $membersManager->findAllMembers();
						
					}else if($_GET['display'] == "Simple members") {
					
						$memberList = $membersManager->findSimpleMembers();
						
					}else if($_GET['display'] == "Pilots") {
					
						$memberList = $membersManager->findPilots();
						
					}else if($_GET['display'] == "Staff members") {
					
						$memberList = $membersManager->findStaffMembers();
						
					}	
											
					if(isset($memberList)) { 
						
						echo "<h1>".$_GET['display']."</h1>";
						$count = 0;
						foreach($memberList as $member) { 
							$count = $count + 1;
						}
						if($count != 0) {
							
			?>
							<center>
								<table>
									<tr>
										<th>First Name</th>
										<th>Last Name</th>
										<th>ID</th>
										<th>Type of Member</th>
										<th>Staff Member?</th>
										<th>Fees Paid ?</th>
										<th>Account balance ($)</th>	
										<th>E-mail</th>								
									</tr>
									
									<form action="#" method="POST">
									
									<?php foreach($memberList as $member) { ?>
												
											<tr>
												<td><?php echo "<a href='showDetailedMember.php?email=".$member->getEmail()."&typeMember=".$member->getTypeMember()."'>".$member->getFirstName().'</a>'; ?></td>
												<td><?php echo $member->getLastName(); ?></td>
												<td><?php echo $member->getIdMember(); ?></td>				
												<td>
													<select name="typeMember<?php echo $member->getIdMember(); ?>" id="typeMember<?php echo $member->getIdMember(); ?>">
														<option>
														<?php if($member->getTypeMember() == "member") echo "member"; else echo "pilot"; ?> 
														</option>
														<option>
														<?php if($member->getTypeMember() == "member") echo "pilot"; else echo "member"; ?>
														</option>
													</select>
												</td>
												<td>
													<select name="isAdmin<?php echo $member->getIdMember(); ?>" id="isAdmin<?php echo $member->getIdMember(); ?>">
														<option>
														<?php if($member->getIsAdmin() == 0) echo "No"; else echo "Yes"; ?> 
														</option>
														<option>
														<?php if($member->getIsAdmin() == 1) echo "No"; else echo "Yes"; ?>
														</option>
													</select>
												</td>
												<td>
													<select name="feesPaid<?php echo $member->getIdMember(); ?>" id="isAdmin<?php echo $member->getIdMember(); ?>">
														<option>
														<?php if($member->getFeesPaid() == 0) echo "No"; else echo "Yes"; ?> 
														</option>
														<option>
														<?php if($member->getFeesPaid() == 1) echo "No"; else echo "Yes"; ?>
														</option>
													</select>
												</td>
												<td><input type="text" name="accBal<?php echo $member->getIdMember(); ?>" id="accBal<?php echo $member->getIdMember(); ?>" value="<?php echo $member->getAccBalance(); ?>"/></td>
												<td><?php echo $member->getEmail(); ?></td>
											<tr>

								<?php	} ?>
								</table>
											<br/>
											<strong>Modify everything: </strong><input type="submit" name="modify" value="OK" />
									</form>
							</center>
			<?php   	}else echo "<center><strong>No results<strong></center>";
					}  ?>

					<br/>
		<?php	} ?>
				</body>
	</html>
<?php
}else {
	
	echo "You have no rights to access this page."; ?>
	<br/> 
	<a href="index.php">Return Home Page</a>
<?php }
?>