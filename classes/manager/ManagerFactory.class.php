<?php
require_once 'classes/manager/pdo/PdoMembersManager.class.php';
require_once 'classes/manager/pdo/PdoStaffManager.class.php';
require_once 'classes/manager/pdo/PdoPlanesManager.class.php';
require_once 'classes/manager/pdo/PdoRentalManager.class.php';
require_once 'classes/manager/pdo/PdoJourneyLogManager.class.php';
require_once 'classes/manager/pdo/PdoLogbookManager.class.php';

final class ManagerFactory {
	
	private static $pdo = true;
	
	private function __construct() {}
	
	public static function getMembersManager() {
		if(self::$pdo) {
			return new PdoMembersManager();
		} 
	}
	
	public static function getStaffManager() {
		if(self::$pdo) {
			return new PdoStaffManager();
		} 
	}
	
	public static function getPlanesManager() {
		if(self::$pdo) {
			return new PdoPlanesManager();
		} 
	}	
	
	public static function getRentalManager() {
		if(self::$pdo) {
			return new PdoRentalManager();
		}
	}
	
	public static function getJourneyLogManager() {
		if(self::$pdo) {
			return new PdoJourneyLogManager();
		}
	}
	
	public static function getLogbookManager() {
		if(self::$pdo) {
			return new PdoLogbookManager();
		}
	}
	
}

?>