<?php
interface PlanesManager {
	
	function findAllPlanes();
	function findAvailablePlanes();
	function addPlane($typePlane, $idPlane, $locationCost, $availability);
	function updatePlane($idPlane, $newLocationCost, $availability);
	function deletePlane($idPlane);
}

?>