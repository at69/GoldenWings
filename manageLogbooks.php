<script type='text/javascript' src="js/manageLogbook.js"></script>
<link type="text/css" href="css/infogrid.css" rel="stylesheet">
<script type='text/javascript' src='js/infogrid.js'></script> 
<?php
require 'required.php';

if(!isset($logbookManager)) $logbookManager = ManagerFactory::getLogbookManager();

if(isset($_POST['displayAll'])) {
	
	$logbookList = $logbookManager->findAllLogbooks();
	
}else if(isset($_POST['dispByFlightDate'])) {
	
	$logbookList = $logbookManager->findLogbookByFlightDate($_POST['dispByFlightDate']);

}else if(isset($_POST['dispByDepartureAirfield'])) {

	$logbookList = $logbookManager->findLogbookByDepartureAirfield($_POST['dispByDepartureAirfield']);

}else if(isset($_POST['dispByArrivalAirfield'])) {

	$logbookList = $logbookManager->findLogbookByArrivalAirfield($_POST['dispByArrivalAirfield']);
	
}else if(isset($_POST['dispByPlane'])) {

	$logbookList = $logbookManager->findLogbookByPlane($_POST['dispByPlane']);

}else if(isset($_POST['dispByAirfield'])) {

	$logbookList = $logbookManager->findLogbookByAirfield($_POST['dispByAirfield']);

}else if(isset($_POST['dispByMember'])) {

	$logbookList = $logbookManager->findLogbookByMember($_POST['dispByMember']);

}else if(isset($_POST['firstName']) && isset($_POST['lastName'])) {
	
	$logbookList = $logbookManager->findLogbookByMemberNames($_POST['firstName'], $_POST['lastName']);

}else if(isset($_POST['dispByPICName'])) {

	$logbookList = $logbookManager->findLogbookByPICName($_POST['dispByPICName']);

}else if(isset($_POST['dispByFINum'])) {
	
	$logbookList = $logbookManager->findLogbookByFInumber($_POST['dispByFINum']);

}else if(isset($_POST['member_displayAll'])) {

	$logbookList2 = $logbookManager->member_displayAllMine($_SESSION['user']->getIdMember());
	
}else if(isset($_POST['pilot_displayAll'])) {

	$PICname = $_SESSION['user']->getFirstName().' '.$_SESSION['user']->getLastName();
	$logbookList2 = $logbookManager->pilot_displayAllMine($_SESSION['user']->getIdMember(), $_SESSION['user']->getFINumber(), $PICname);
	
}else if(isset($_POST['pilot_displayWhereIamPilot'])) {

	$PICname = $_SESSION['user']->getFirstName().' '.$_SESSION['user']->getLastName();
	$logbookList2 = $logbookManager->pilot_displayWhereIamPilot($PICname);

}else if(isset($_POST['pilot_displayWhereIamInstructor'])) {

	$logbookList2 = $logbookManager->pilot_displayWhereIamInstructor($_SESSION['user']->getFINumber());

}else if(isset($_POST['dispByMember2'])) {

	$logbookList2 = $logbookManager->findLogbookByMember($_SESSION['user']->getIdMember());

}else if(isset($_POST['dispMineByDate'])) {

	$logbookList2 = $logbookManager->displayMineByDate($_POST['dispMineByDate']);
	
}else if(isset($_POST['pilot_displayMineByFINumber'])) {

	$logbookList2 = $logbookManager->pilot_displayMineByFINumber($_SESSION['user']->getFINumber());
	
}else if(isset($_POST['dispMineByPlane'])) {

	$logbookList2 = $logbookManager->displayMineByPlane($_POST['dispMineByPlane']);
	
}else if(isset($_POST['dispMineByAirfield'])) {

	$logbookList2 = $logbookManager->displayMineByAirfield($_POST['dispMineByAirfield']);

}else if(isset($_POST['dispMineByDAirfield'])) {

	$logbookList2 = $logbookManager->displayMineByDepartureAirfield($_POST['dispMineByDAirfield']);

}else if(isset($_POST['dispMineByAAirfield'])) {

	$logbookList2 = $logbookManager->displayMineByArrivalAirfield($_POST['dispMineByAAirfield']);

}else if(isset($_POST['dispMineByPICName'])) {

	$logbookList2 = $logbookManager->displayMineByPICName($_POST['dispMineByPICName']);
	
}


	if(isset($logbookList)) {
	
		$count = 0;
		foreach($logbookList as $logbook) {
			$count = $count + 1;
		}
		
		if($count != 0) { ?>
	
			<table>
				<tr>
					<th>ID of member</th>
					<th>Flight Date</th>
					<th>Type of plane</th>
					<th>ID of plane</th>
					<th>Departure airfield</th>
					<th>Departure time</th>
					<th>Arrival airfield</th>
					<th>Arrival time</th>
					<th>Pilot in command (PIC)</th>
					<th>Flight Instructor number</th>
					<th>Dual time received</th>
					<th>Flight time as PIC</th>
					<th>Total flight duration</th>
				</tr>
<?php				
			foreach($logbookList as $logbook) { ?>
								
				<tr>
					<td><a onclick="displayByMember('<?php echo $logbook->getIdMember(); ?>')"><?php echo $logbook->getIdMember(); ?></a></td>
					<td><a onclick="displayByDate('<?php echo $logbook->getFlightDate(); ?>')"><?php echo $logbook->getFlightDate(); ?></a></td>
					<td><?php echo $logbook->getTypePlane(); ?></td>
					<td><a onclick="displayByPlane('<?php echo $logbook->getIdPlane(); ?>')"><?php echo $logbook->getIdPlane(); ?></a></td>
					<td><a onclick="displayByDepartureAirfield('<?php echo $logbook->getDepartureAirfield(); ?>')"><?php echo $logbook->getDepartureAirfield(); ?></a></td>
					<td><?php echo $logbook->getDepartureTime(); ?></td>
					<td><a onclick="displayByArrivalAirfield('<?php echo $logbook->getArrivalAirfield(); ?>')"><?php echo $logbook->getArrivalAirfield(); ?></a></td>
					<td><?php echo $logbook->getArrivalTime(); ?></td>
					<td><a onclick="displayByPICName('<?php echo $logbook->getPICName(); ?>')"><?php echo $logbook->getPICName(); ?></a></td>
					<td><a onclick="displayByFINumber('<?php echo $logbook->getFINumber(); ?>')"><?php echo $logbook->getFINumber(); ?></a></td>
					<td><?php echo $logbook->getDualTimeReceived(); ?></td>
					<td><?php echo $logbook->getFlightTimePIC(); ?></td>
					<td><?php echo $logbook->getTotalFlightDuration(); ?></td>	
				</tr>
							
<?php		}
						 ?>
			</table>
<?php	
		}else echo "<strong>No results<strong>";
	
	}else if(isset($logbookList2)) {
		
		$count = 0;
		foreach($logbookList2 as $logbook2) {
			$count = $count + 1;
		}
		
		if($count != 0) { ?>
	
			<table>
				<tr>
					<th>ID of member</th>
					<th>Flight Date</th>
					<th>Type of plane</th>
					<th>ID of plane</th>
					<th>Departure airfield</th>
					<th>Departure time</th>
					<th>Arrival airfield</th>
					<th>Arrival time</th>
					<th>Pilot in command (PIC)</th>
					<th>Flight Instructor number</th>
					<th>Dual time received</th>
					<th>Flight time as PIC</th>
					<th>Total flight duration</th>
				</tr>
<?php				
			foreach($logbookList2 as $logbook2) { ?>
								
				<tr>
					<!-- The if instructions that contain the "onclick" allow us to avoid the ability of the user to access logbooks of other users. Without this, all the onclick of the table would refer then to the another user! -->
					<td><a <?php if($logbook2->getIdMember() == $_SESSION['user']->getIdMember()) { ?> onclick="displayByMember2('<?php echo $logbook2->getIdMember(); ?>')" <?php } ?> ><?php echo $logbook2->getIdMember(); ?></a></td>
					<td><a onclick="displayMineByDate('<?php echo $logbook2->getFlightDate(); ?>')"><?php echo $logbook2->getFlightDate(); ?></a></td>
					<td><?php echo $logbook2->getTypePlane(); ?></td>
					<td><a onclick="displayMineByPlane('<?php echo $logbook2->getIdPlane(); ?>')"><?php echo $logbook2->getIdPlane(); ?></a></td>
					<td><a onclick="displayMineByDepartureAirfield('<?php echo $logbook2->getDepartureAirfield(); ?>')"><?php echo $logbook2->getDepartureAirfield(); ?></a></td>
					<td><?php echo $logbook2->getDepartureTime(); ?></td>
					<td><a onclick="displayMineByArrivalAirfield('<?php echo $logbook2->getArrivalAirfield(); ?>')"><?php echo $logbook2->getArrivalAirfield(); ?></a></td>
					<td><?php echo $logbook2->getArrivalTime(); ?></td>
					<td><a <?php if($logbook2->getPICName() == $_SESSION['user']->getFirstName().' '.$_SESSION['user']->getLastName()) { ?> onclick="displayMineByPICName('<?php echo $logbook2->getPICName(); ?>')" <?php } ?> ><?php echo $logbook2->getPICName(); ?></a></td>
					<td><a <?php if($_SESSION['user']->getTypeMember() == "pilot") { if($logbook2->getFINumber() == $_SESSION['user']->getFINumber()) { ?> onclick="pilot_displayMineByFINumber('<?php echo $logbook2->getFINumber(); ?>')" <?php } } ?> ><?php echo $logbook2->getFINumber(); ?></a></td>
					<td><?php echo $logbook2->getDualTimeReceived(); ?></td>
					<td><?php echo $logbook2->getFlightTimePIC(); ?></td>
					<td><?php echo $logbook2->getTotalFlightDuration(); ?></td>	
				</tr>
							
<?php		}
						 ?>
			</table>
<?php	
		}else echo "<strong>No results<strong>";
	}
?>