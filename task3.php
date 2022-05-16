<?php
require 'connection.php';
$dbConnection = new dbConnection();
$conn = $dbConnection->getConnection();

$update ="UPDATE `menu` SET `price` = (`price` * 0.1) + `price`
		  WHERE `category` IN ('salads','soups')";
$updateQQ = $conn->query($update);

if($updateQQ) {
	echo "success";
} else {
	echo "Fail";
}
?>