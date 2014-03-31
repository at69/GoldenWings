<?php
interface LogbookManager {
	
	function findAllLogbooks();
	function findLogbookByMember($idMember);
	function findLogbookByMemberNames($fName, $lName);
	function findLogbookByFlightDate($flightDate);
	function findLogbookByPlane($idPlane);
	function findLogbookByDepartureAirfield($dAirfield);
	function findLogbookByArrivalAirfield($aAirfield);
	function findLogbookByAirfield($airfield);
	function findLogbookByPICName($PICName);
	function findLogbookByFInumber($FInumber);
	function member_displayAllMine($idMember);
	function pilot_displayAllMine($idMember, $FInum, $PICname);
	function pilot_displayWhereIamPilot($PICname);
	function pilot_displayWhereIamInstructor($FInumber);
	function displayMineByDate($date);
	function displayMineByPlane($idPlane);
	function displayMineByAirfield($airfield);
	function displayMineByDepartureAirfield($airfield);
	function displayMineByArrivalAirfield($airfield);
	function displayMineByPICName($PICname);
	function pilot_displayMineByFINumber($FInum);
	
}


?>