<?php
require 'required.php';

if(isset($_SESSION['user'])) { ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
		<head>
			<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
			<title>GoldenWings - Plane rental</title>
			<link href="style.css" rel="stylesheet" type="text/css">
			<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
			<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
			<script type='text/javascript' src='js/infogrid.js'></script> 		
			<script type='text/javascript' src='js/manageRental.js'></script>
			<link type="text/css" href="css/table.css" rel="stylesheet">
			<link type="text/css" href="css/infogrid.css" rel="stylesheet">
		</head>
		<body>
		
			<div id="header">
				<?php include "header.php" ?>
			</div>
			<style type="text/css">
				h1 { margin-left: 200px; }
			</style>
	<div id="page-wrap" style="margin-left: 205px;">
<?php	
	if($_SESSION['user']->getIsAdmin() == 1) { 
	
		if(!isset($planeManager)) $planeManager = ManagerFactory::getPlanesManager();
		$planeList = $planeManager->findAllPlanes(); ?>
		
		<div style="margin-top: 35px; margin-left: 400px;">
			<form id="disp" method="post" action="">
			Display option: <select name="dispOpt" id="dispOpt">
			
													<option>--Sort rentals--</option>
													<option value="all" onclick="displayAll(); return false">All rentals</option>
													<?php if($_SESSION['user']->getTypeMember() == "pilot") { ?>
														<option onclick="displayMine(); return false">Mine</option> 
													<?php } ?>
													<option onclick="displayToday(); return false">Today</option>
													<option value="cWeek" onclick="displayThisWeek(); return false">This week</option>
													<optgroup label="By status">
														<option value="done" onclick="displayByStatus(this.value); return false">Rentals done</option>
														<option value="pending" onclick="displayByStatus(this.value); return false">Rentals pending</option>
														<option value="accepted" onclick="displayByStatus(this.value); return false">Rentals accepted</option>
													</optgroup>
													<optgroup label="By plane">
														<?php foreach($planeList as $plane) { ?>
														<option onclick="displayByPlane(this.value); return false"><?php echo $plane->getIdPlane(); ?></option> <?php } ?>
													</optgroup>
													
							</select>
			</form>
		</div>
			
		<div class="info-col">
			<dl>
				<dt id="starter"><h2><div id="title"></div></h2></dt>
				<dd><div id="result"></div></dd>
			</dl>
		</div>
<?php				
				
	}
	
?>
			
		<div class="info-col">
			<dl>
				<dt><h2>My undone flights</h2></dt>
				<dd>
					<input type="button" name="dispUndone" value="Display all" onclick="dispMyUndone(); return false"/>
					<div id="undoneR"></div>
				</dd>
				<dl>
					<dt><h2><div id="title2"></div></h2></dt>
					<dd><div id="result2"></div></dd>
				</dl>
			</dl>
		</div>
		
		<div class="info-col">
			<dl>
				<dt><h2>My past flights</h2></dt>
				<dd>
					<input type="button" name="dispDone" value="Display all" onclick="dispMyPast(); return false"/>
					<div id="pastR"></div>
				</dd>
				<dl>
					<dt><h2><div id="title3"></div></h2></dt>
					<dd><div id="result3"></div></dd>
				</dl>
			</dl>
		</div>
		
		<div class="info-col">
			<dl>
			
				<dt><h2>Rent a plane</h2></dt>
				<dd>
					Please answer this form:
					<form method="post" action="" style="margin-left: 83px;" onsubmit="addRental(this.idPlane.value, this.dateRental.value, this.depTime.value, this.arrTime.value, this.dAirfield.value, this.aAirfield.value, this.pilot.value); return false">
						<table>
							<tr>
								<td>Id of plane: </td>
								<td>
									<?php if(!isset($planeManager)) $planeManager = ManagerFactory::getPlanesManager();
										  $planeList = $planeManager->findAvailablePlanes(); ?>
									<select name="idPlane" id="idPlane">
											<option>--ID of Plane--</option>
											<?php foreach($planeList as $plane) { ?>
											<option><?php echo $plane->getIdPlane(); ?></option> <?php } ?>	
									</select>
								</td>
							</tr>
							
							<tr>
								<td><label for="dateRental">Date of reservation</label></td>
								<td>
									<input name="dateRental" id="dateRental" type="text" value="Format: YYYY-MM-DD" />
								</td>
							</tr>
							
							<tr>
								<td><label for="depTime">Departure time</label></td>
								<td><input name="depTime" id="depTime" type="text" value="Format: HH:MM:SS" /></td>
							</tr>
							
							<tr>
								<td><label for="arrTime">Arrival time</label></td>
								<td><input name="arrTime" id="arrTime" type="text" value="Format: HH:MM:SS" /></td>
							</tr>
							
							<tr>
								<td><label for="dAirfield">Departure airfield</label></td>
								<td><input name="dAirfield" id="dAirfield" type="text" value="4-capital letters code" /></td>
							</tr>
							
							<tr>
								<td><label for="aAirfield">Arrival airfield</label></td>
								<td><input name="aAirfield" id="aAirfield" type="text" value="4-capital letters code" /></td>
							</tr>
							
							<tr>
								<td>
									<?php if($_SESSION['user']->getTypeMember() == "pilot") echo "You or instructor";
																else echo "Instructor"; ?>
								</td>
								<td>
									<?php 	if(!isset($pilotManager)) $pilotManager = ManagerFactory::getMembersManager();
											$pilotsList = $pilotManager->findInstructors(); 
											if($_SESSION['user']->getTypeMember() == "pilot") {
												$pilotsList2 = $pilotManager->findPilotById();
											}
									?>
									<select name="pilot" id="pilot">
												<option>--Pilot--</option>
										<?php 
												if(isset($pilotsList2)) {
												foreach($pilotsList2 as $pilot2) { ?>
												<option><?php echo $pilot2->getFirstName().' '.$pilot2->getLastName(); ?></option> <?php } } ?>
												<?php foreach($pilotsList as $pilot) { ?>
												<option><?php echo $pilot->getFirstName().' '.$pilot->getLastName(); ?></option> <?php } ?>	
									</select>
								</td>
							</tr>

						</table>
						<br/>
							<input type="submit" name="add" value="Add!"/>
					</form>
					
					<div id="addResp" style="margin-top: 25px; margin-left: 82px; font-weight: bold;"></div>
				</dd>
			
			</dl>
			
		</div>
	</div>
		</body>
	</html>
<?php
}else {
	
	echo "You have no rights to access this page."; ?>
	<br/> 
	<a href="index.php">Return Home Page</a>
<?php } ?>