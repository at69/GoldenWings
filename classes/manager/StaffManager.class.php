<?php
interface StaffManager {
	
	function findAllMembers();
	function findMemberByNames($fName, $lName);
	function findSingleMemberByEmail($email, $typeMember);
	function findSimpleMembers();
	function findPilots();
	function findStaffMembers();
	function globalAllMembersUpdate($email, $typeMember, $isAdmin, $feesPaid, $accBalance);
}

?>