<?php
require 'connection.php';
$dbConnection = new dbConnection();
$conn = $dbConnection->getConnection();

$update ="UPDATE recipes r 
			JOIN ingredients i ON r.recipeId = i.recipeId
			SET r.cost = r.cost + 2
			WHERE i.name = 'tuna'";
$updateQQ = $conn->query($update);

if($updateQQ) {
	echo "success";
} else {
	echo "Fail";
}
?>