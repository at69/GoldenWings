<script type='text/javascript' src='js/managePlane.js'></script> 
<?php
require 'required.php';
	
if(!isset($journeyLogManager)) $journeyLogManager = ManagerFactory::getJourneyLogManager();

if(isset($_POST['displayAll'])) {
	
	$journeyLogList = $journeyLogManager->findAllJourneyLog();
	
}else if(isset($_POST['dispByFlightDate'])) {
	
	$journeyLogList = $journeyLogManager->findJourneyLogByFlightDate($_POST['dispByFlightDate']);

}else if(isset($_POST['dispByDepartureAirfield'])) {

	$journeyLogList = $journeyLogManager->findJourneyLogByDepartureAirfield($_POST['dispByDepartureAirfield']);

}else if(isset($_POST['dispByArrivalAirfield'])) {

	$journeyLogList = $journeyLogManager->findJourneyLogByArrivalAirfield($_POST['dispByArrivalAirfield']);
	
}else if(isset($_POST['dispByPlane'])) {

	$journeyLogList = $journeyLogManager->findJourneyLogByPlane($_POST['dispByPlane']);

}else if(isset($_POST['dispByAirfield'])) {

	$journeyLogList = $journeyLogManager->findJourneyLogByAirfield($_POST['dispByAirfield']);

}
	
	if(isset($journeyLogList)) {
		$count = 0;
		foreach($journeyLogList as $journeyLog) {
			$count = $count + 1;
		}
		
		if($count != 0) { ?>
			
			<table>
				<tr>
					<th>Flight date</th>
					<th>Departure airfield</th>
					<th>Departure time</th>
					<th>Arrival airfield</th>
					<th>Arrival time</th>
					<th>Flight duration</th>
					<th>ID of Plane</th>
				</tr>
<?php				
			foreach($journeyLogList as $journeyLog) { ?>
								
				<tr>
					<td><a onclick="displayByDate('<?php echo $journeyLog->getFlightDate(); ?>')"><?php echo $journeyLog->getFlightDate(); ?></a></td>
					<td><a onclick="displayByDepartureAirfield('<?php echo $journeyLog->getDepartureAirfield(); ?>')"><?php echo $journeyLog->getDepartureAirfield(); ?></a></td>
					<td><?php echo $journeyLog->getDepartureTime(); ?></td>
					<td><a onclick="displayByArrivalAirfield('<?php echo $journeyLog->getArrivalAirfield(); ?>')"><?php echo $journeyLog->getArrivalAirfield(); ?></a></td>
					<td><?php echo $journeyLog->getArrivalTime(); ?></td>
					<td><?php echo $journeyLog->getFlightDuration(); ?></td>
					<td><a onclick="displayByPlane('<?php echo $journeyLog->getIdPlane(); ?>')"><?php echo $journeyLog->getIdPlane(); ?></a></td>
				</tr>
							
<?php		}
						 ?>
			</table>
<?php	
		}else echo "<strong>No results<strong>";
	
	}

?>