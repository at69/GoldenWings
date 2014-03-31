<?php
interface JourneyLogManager {
	
	function findAllJourneyLog();
	function findJourneyLogByFlightDate($flightDate);
	function findJourneyLogByAirfield($airfield);
	function findJourneyLogByDepartureAirfield($dAirfield);
	function findJourneyLogByArrivalAirfield($aAirfield);	
	function findJourneyLogByPlane($idPlane);
	function findJourneyLogByRentalId($idRental);
	
}

?>