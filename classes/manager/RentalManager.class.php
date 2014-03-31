<?php
interface RentalManager {
	
	function findAllRentals();
	function findRentalsByStatus($status);
	function findRentalsByPlane($idPlane);
	function findRentalsByDate($date);
	function findRentalsByPilot($FInum);	
	function findRentalsByIdMember($idMember);
	function findMyUndoneFlights($idMember);
	function findMyPastFlights($idMember);
	function findMyUndoneByPlane($idPlane);
	function findMyUndoneByDate($date);
	function findMyUndoneByPilot($FInum);
	function findMyDoneByPlane($idPlane);
	function findMyDoneByDate($date);
	function findMyDoneByPilot($FInum);
	function findMyUndoneByStatus($status);
	function addRental($idPlane, $date, $dTime, $aTime, $dAirfield, $aAirfield, $pilot);
	function addRentalToLogbook($date, $idPlane, $dAirfield, $dTime, $aAirfield, $aTime, $picN, $FInum);
	function addRentalToJourneyLog($idRental, $date, $dAir, $dTime, $aAir, $aTime, $idPlane);
	function modifyAccountBalance($dTime, $aTime, $idPlane);
	function checkIfIHaveEnoughMoney($dTime, $aTime, $idPlane);
	function updateStatus($idRental, $statusBis);
	
}

?>