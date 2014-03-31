<?php
require_once 'AbstractPdoManager.class.php';

class PdoPlanesManager extends AbstractPdoManager{

	public function findAllPlanes() {
	
		$results = array();

		$query = $this->pdo->prepare("SELECT typePlane, idPlane, locationCost, availability FROM planes");
		$query->execute();

		while($result = $query->fetch(PDO::FETCH_OBJ)) {
			$results[] = new Planes($result->typePlane, $result->idPlane, $result->locationCost, $result->availability);
		}

		$query->closeCursor();

		return $results;		
	}
	
	public function findAvailablePlanes() {

		$results = array();
		$available = "1";

		$query = $this->pdo->prepare("SELECT typePlane, idPlane, locationCost, availability FROM planes
		WHERE availability=:availability");
		
		$query->bindValue(':availability', $available);
		
		$query->execute();

		while($result = $query->fetch(PDO::FETCH_OBJ)) {
			$results[] = new Planes($result->typePlane, $result->idPlane, $result->locationCost, $result->availability);
		}

		$query->closeCursor();

		return $results;		
	
	}
	
	public function addPlane($typePlane, $idPlane, $locationCost, $availability) {
	
		$query = "INSERT INTO planes (typePlane, idPlane, locationCost, availability) 
		VALUES (:typePlane, :idPlane, :locationCost, :availability)";
		
		$statement = $this->pdo->prepare($query);
										
		$statement->bindValue(':typePlane', $typePlane);
		$statement->bindValue(':idPlane', $idPlane);
		$statement->bindValue(':locationCost', $locationCost);
		$statement->bindValue(':availability', $availability);
		
		if($statement->execute()) return true;
	}
	
	public function updatePlane($idPlane, $newLocationCost, $availability) {
	
		$planeManager = ManagerFactory::getPlanesManager();
					
		$planeManager->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$planeManager->pdo->beginTransaction();
		try {
				$query = $planeManager->pdo->prepare("
				UPDATE planes SET locationCost=:newLocationCost, availability=:availability
				WHERE idPlane=:idPlane
				");
						
				$query->bindValue(':idPlane', $idPlane);
				$query->bindValue(':newLocationCost', $newLocationCost);
				$query->bindValue(':availability', $availability);
						
				if($query->execute()) {
							
					$query->closeCursor();
					$planeManager->pdo->commit();
							
					return true;
										
				}else { echo "An error occured"; }
						
			}catch(Exception $e) {$planeManager->pdo->rollBack(); echo "Error".$e->getMessage(); }
	}
	
	public function deletePlane($idPlane) {
	
		$planeManager = ManagerFactory::getPlanesManager();
					
		$planeManager->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$planeManager->pdo->beginTransaction();
		try {
				$query = $planeManager->pdo->prepare("
				DELETE FROM planes WHERE idPlane=:idPlane
				");
						
				$query->bindValue(':idPlane', $idPlane);
						
				if($query->execute()) {
							
					$query->closeCursor();
					$planeManager->pdo->commit();
							
					return true;
										
				}else { echo "An error occured"; }
						
			}catch(Exception $e) {$planeManager->pdo->rollBack(); echo "Error".$e->getMessage(); }
	
	}
	
	
}	
?>