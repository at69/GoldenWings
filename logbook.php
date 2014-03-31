<?php
require 'required.php';

if(isset($_SESSION['user'])) { ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
		<head>
			<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
			<title>GoldenWings - Logbooks</title>
			<link href="style.css" rel="stylesheet" type="text/css">
			<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
			<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
			<script type='text/javascript' src='js/infogrid.js'></script> 	
			<script type='text/javascript' src='js/manageLogbook.js'></script>
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
	<div id="page-wrap-log" style="margin-left: 205px;" >
<?php
	if($_SESSION['user']->getIsAdmin() == 1) {
	
		if(!isset($logbookManager)) $logbookManager = ManagerFactory::getLogbookManager(); ?>
		
		<div class="info-col">
			<dl>
				
				<dt><h2>List of logbooks</h2>
				<dd>
					
					<form method="post" onsubmit="displayAll(); return false" action="">
						Sort options:  <input type="submit" value="All logbooks" /> <br/>
					</form>
					
					<form method="post" onsubmit="displayByMember(this.idMember.value); return false" action="" style="margin-left: 83px;">
						Enter an ID member <input name="idMember" id="idMember" type="text" /><input type="submit" value="Search" /> <br/>
					</form>
					
					<form method="post" onsubmit="displayByMemberNames(this.fName.value, this.lName.value); return false" action="" style="margin-left: 83px;">
						First name <input name="fName" id="fName" type="text" /><br/>
						Last name <input name="lName" id="lName" type="text" /><br/>
						<input type="submit" value="Search" /> <br/>
					</form>
					
					<form method="post" onsubmit="displayByDate(this.date.value); return false" action="" style="margin-left: 83px;">
						Enter a date <input name="date" id="date" type="text" value="Format: YYYY-MM-DD" /><input type="submit" value="Search" /> <br/>
					</form>
					
					<?php if(!isset($planeManager)) $planeManager = ManagerFactory::getPlanesManager();
						  $planeList = $planeManager->findAllPlanes(); ?>
						  
					<form method="post" onchange="displayByPlane(this.idPlane.value); return false" action="" style="margin-left: 83px;">
	  
						Select an ID <select name="idPlane" id="idPlane">
										<option>--ID of Plane--</option>
										<?php foreach($planeList as $plane) { ?>
										<option><?php echo $plane->getIdPlane(); ?></option> <?php } ?>	
									</select>
					</form>
					
					<form method="post" onsubmit="displayByAirfield(this.airfield.value); return false" action="" style="margin-left: 83px;">
						Enter an airfield <input name="airfield" id="airfield" type="text" value="4-capital letters code"/><input type="submit" value="Search" /> <br/>
					</form>
					
					<form method="post" onsubmit="displayByDepartureAirfield(this.dAirfield.value); return false" action="" style="margin-left: 83px;">
						Enter a departure airfield <input name="dAirfield" id="dAirfield" type="text" value="4-capital letters code" /><input type="submit" value="Search" /> <br/>
					</form>
					
					<form method="post" onsubmit="displayByArrivalAirfield(this.aAirfield.value); return false" action="" style="margin-left: 83px;">
						Enter an arrival airfield <input name="aAirfield" id="aAirfield" type="text" value="4-capital letters code" /><input type="submit" value="Search" /> <br/>
					</form>
					
					<form method="post" onsubmit="displayByPICName(this.picName.value); return false" action="" style="margin-left: 83px;">
						Name of the pilot in command <input name="picName" id="picName" type="text" /><input type="submit" value="Search" /> <br/>
					</form>
					
					<form method="post" onsubmit="displayByFINumber(this.fiNum.value); return false" action="" style="margin-left: 83px;">
						Flight Instructor Number <input name="fiNum" id="fiNum" type="text" /><input type="submit" value="Search" /> <br/>
					</form>
					
				</dd>

				<dl>
			
				<dt><h2><div id="title"></div></h2></dt>
				<dd><div id="result"></div></dd>
	
				</dl>
				
			</dl>
		</div>
<?php	

	}
	
	if(!isset($logbookManager)) $logbookManager = ManagerFactory::getLogbookManager(); ?>
	
	<div class="info-col">
			<dl>
				
				<dt><h2>List of my logbooks</h2>
				<dd>
	
<?php			if($_SESSION['user']->getTypeMember() == 'member') { ?>
					
					<form method="post" onsubmit="member_displayAllMine(); return false" action="">
						Sort options:  <input type="submit" value="All my logbooks" /> <br/>
					</form>
	
<?php			}else { ?>
				
					<form method="post" onsubmit="pilot_displayAllMine(); return false" action="">
						Sort options:  <input type="submit" value="All my logbooks" /> <br/>
					</form>
					
					<form method="post" onsubmit="pilot_displayWhereIamPilot(); return false" action="" style="margin-left: 83px;">
						Where I am pilot <input type="submit" value="All my logbooks" /> <br/>
					</form>
					
					<form method="post" onsubmit="pilot_displayWhereIamInstructor(); return false" action="" style="margin-left: 83px;">
						Where I am instructor  <input type="submit" value="All my logbooks" /> <br/>
					</form>
				
<?php			}
?>

				<form method="post" onsubmit="displayMineByDate(this.date.value); return false" action="" style="margin-left: 83px;">
						Enter a date <input name="date" id="date" type="text" value="Format: YYYY-MM-DD" /><input type="submit" value="Search" /> <br/>
					</form>
					
					<?php if(!isset($planeManager)) $planeManager = ManagerFactory::getPlanesManager();
						  $planeList = $planeManager->findAllPlanes(); ?>
						  
					<form method="post" onchange="displayMineByPlane(this.idPlane.value); return false" action="" style="margin-left: 83px;">
	  
						Select an ID <select name="idPlane" id="idPlane">
										<option>--ID of Plane--</option>
										<?php foreach($planeList as $plane) { ?>
										<option><?php echo $plane->getIdPlane(); ?></option> <?php } ?>	
									</select>
					</form>
					
					<form method="post" onsubmit="displayMineByAirfield(this.airfield.value); return false" action="" style="margin-left: 83px;">
						Enter an airfield <input name="airfield" id="airfield" type="text" value="4-capital letters code"/><input type="submit" value="Search" /> <br/>
					</form>
					
					<form method="post" onsubmit="displayMineByDepartureAirfield(this.dAirfield.value); return false" action="" style="margin-left: 83px;">
						Enter a departure airfield <input name="dAirfield" id="dAirfield" type="text" value="4-capital letters code" /><input type="submit" value="Search" /> <br/>
					</form>
					
					<form method="post" onsubmit="displayMineByArrivalAirfield(this.aAirfield.value); return false" action="" style="margin-left: 83px;">
						Enter an arrival airfield <input name="aAirfield" id="aAirfield" type="text" value="4-capital letters code" /><input type="submit" value="Search" /> <br/>
					</form>

				</dd>

				<dl>
			
				<dt><h2><div id="title2"></div></h2></dt>
				<dd><div id="result2"></div></dd>
	
				</dl>
				
			</dl>
		</div>
	</div>
<?php	
 
}else {
	
		echo "You have no rights to access this page."; ?>
		<br/> 
		<a href="index.php">Return Home Page</a>
	
<?php }

?>