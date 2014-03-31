<?php
require 'required.php';

if(isset($_SESSION['user']) && $_SESSION['user']->getIsAdmin() == 1) { 
	
	if(!isset($planeManager)) $planeManager = ManagerFactory::getPlanesManager();
		
	if(isset($_GET['delete_id'])) {
		if($planeManager->deletePlane($_GET['delete_id'])) {
			
			unset($_GET['delete_id']);
			header('Location: managePlane.php');		
		}
	}
	
	$planeList = $planeManager->findAllPlanes();
	
	if(isset($_POST['modify'])) {
	
		foreach($planeList as $plane) {
	
			$newCost = $_POST['locCost'.$plane->getIdPlane()];
			$avail = $_POST['avail'.$plane->getIdPlane()];
			
			if($avail == "Yes") $newAvail = 1;
			else $newAvail = 0;
			
			$planeManager->updatePlane($plane->getIdPlane(), $newCost, $newAvail);
		}
		
		header('Location: managePlane.php');
		
	}else if(isset($_POST['add'])) {
	
		$planeManager->addPlane($_POST['type'], $_POST['idPlane'], $_POST['location'], $_POST['available']);
		header('Location: managePlane.php');		
	}
		
	

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
		<title>GoldenWings - Manage Planes</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
		<script type='text/javascript' src='js/infogrid.js'></script> 
		<script type='text/javascript' src='js/managePlane.js'></script> 
		<link type="text/css" href="css/table.css" rel="stylesheet">
		<link type="text/css" href="css/infogrid.css" rel="stylesheet">
	</head>
	<body>
	
		<div id="header">
			<?php include "header.php" ?>
		</div>
		<style type="text/css">
			table { margin-top : 10px; }
			h1 { margin-left: 200px; }
		</style>
		
	<div id="page-wrap" style="margin-left: 205px;">
	
		<div class="info-col">
			<dl>
			
				<dt><h2>List of journey logs</h2></dt>
				<dd>
					
					<form method="post" onsubmit="displayAll(); return false" action="">
						Sort options:  <input type="submit" value="All journey logs" /> <br/>					  
					</form>
					
					<form method="post" onsubmit="displayByDate(this.date.value); return false" action="" style="margin-left: 83px;">
						Enter a date <input name="date" id="date" type="text" value="Format: YYYY-MM-DD" /><input type="submit" value="Search" /> <br/>
					</form>
					
					<form method="post" onsubmit="displayByAirfield(this.airfield.value); return false" action="" style="margin-left: 83px;">
						Enter an airfield <input name="airfield" id="airfield" type="text" value="4-capital letters code" /><input type="submit" value="Search" /> <br/>
					</form>
					
					<form method="post" onsubmit="displayByDepartureAirfield(this.dAirfield.value); return false" action="" style="margin-left: 83px;">
						Enter a departure airfield <input name="dAirfield" id="dAirfield" type="text" value="4-capital letters code" /><input type="submit" value="Search" /> <br/>
					</form>
					
					<form method="post" onsubmit="displayByArrivalAirfield(this.aAirfield.value); return false" action="" style="margin-left: 83px;">
						Enter an arrival airfield <input name="aAirfield" id="aAirfield" type="text" value="4-capital letters code" /><input type="submit" value="Search" /> <br/>
					</form>
					
					<form method="post" onchange="displayByPlane(this.idPlane.value); return false" action="" style="margin-left: 83px;">
					
					<?php if(!isset($planeManager)) $planeManager = ManagerFactory::getPlanesManager();
						  $planeList = $planeManager->findAllPlanes(); ?>
						  
						Select an ID <select name="idPlane" id="idPlane">
										<option>--ID of Plane--</option>
										<?php foreach($planeList as $plane) { ?>
										<option><?php echo $plane->getIdPlane(); ?></option> <?php } ?>	
									</select>
					</form>
					
				</dd>
			
				<dl>
				
				<dt><h2><div id="title"></div></h2></dt>
				<dd><div id="result"></div></dd>
				
				</dl>
			
			</dl>
			
		</div>
		
		<?php if(isset($planeList)) { 
		
				$count = 0;
				foreach($planeList as $plane) { 
					$count = $count + 1;
				}
				if($count != 0) {
					
		?>
						<div class="info-col">
							<dl>
							<dt><h2>List of planes</h2></dt>
							<dd>
								<table>
									<tr>
										<th>ID</th>
										<th>Type</th>
										<th>Location cost</th>
										<th>Available</th>
										<th>Delete</th>
									</tr>
									
									<form action="#" method="POST">
								
									<?php foreach($planeList as $plane) { ?>
											
											<tr>
												<td><?php echo $plane->getIdPlane(); ?> </td>
												<td><?php echo $plane->getTypePlane(); ?> </td>
												<td><input type="text" name="locCost<?php echo $plane->getIdPlane(); ?>" id="locCost<?php echo $plane->getIdPlane(); ?>" value="<?php echo $plane->getLocationCost(); ?>"/></td>
												<td>
													<select name="avail<?php echo $plane->getIdPlane(); ?>" id="avail<?php echo $plane->getIdPlane(); ?>">
														<option>
														<?php if($plane->getAvailability() == 1) echo "Yes"; else echo "No"; ?> 
														</option>
														<option>
														<?php if($plane->getAvailability() == 1) echo "No"; else echo "Yes"; ?>
														</option>
												</td>
												<td><img id="<?php echo $plane->getIdPlane();?>" src="images/cross.png" onclick="location.href = 'managePlane.php?delete_id='+this.id;"/></td>
											<tr>

									<?php	} ?>
								
								</table>
							
								<br/>
								<strong>Modify everything : </strong><input type="submit" name="modify" value="OK" />
									</form>
							</dd>
							</dl>
						</div>
					
		<?php   }else echo '<h1><center>No planes on the database !</center></h1>';  ?>
						
				<br/>
				<div class="info-col">
					<dl>
					<dt><h2>Add a plane</h2></dt>
					<dd>
						
						<form action="#" method="POST">
							<table>
								<tr>
					
									<td><label for="type"><strong>Type of plane: </strong></label></td>
									<td><input type="text" name="type" id="type"/></td>
					
								</tr>
								
								<tr>
				   
									<td><label for="idPlane"><strong>ID of the plane: </strong></label></td>
									<td><input type="text" name="idPlane" id="idPlane"/></td>
				   
								</tr>
					
								<tr>
					
									<td><label for="location"><strong>Location cost: </strong></label></td>
									<td><input type="text" name="location" id="location"/></td>
					
								</tr>
								
								<tr>
								
									<td><label for="availability"><strong>Availability: </strong></label></td>
									<td>Yes: <input type="radio" name="available" value="1" checked=checked/> No : <input type="radio" name="available" value="0"/></td>
								</tr>
							</table>
							<br/>
							
							<input type="submit" name="add" value="Add!" />
							<br/>
						</form>
					</dd>
					</dl>
				</div>
					
	
    <?php  	  } ?>
	
	</div>
	</body>
</html>
<?php
}else {
	
	echo "You have no rights to access this page."; ?>
	<br/> 
	<a href="index.php">Return Home Page</a>
<?php }
?>