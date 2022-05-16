<?php 
require 'config/connection.php'; 

/*Start: Check if user exist*/
function checkUserExist($username,$data,$status) {
	
	global $conn;
	/*1 = registration, 0 = login*/

	if($status == 1) {
		$fetchUserDataStr = "uid";
		$whereConditionStr = "email = '$data'";
	} else {
		$fetchUserDataStr = "uid,fname,lname";
		$whereConditionStr = "upassword = '$data' AND status = 0";
	}
	
	$checkUserExist = "SELECT $fetchUserDataStr FROM users 
	WHERE uname = '$username' AND utype = 0 AND $whereConditionStr";
	$checkUserExistQQ = $conn->query($checkUserExist);
	$checkUserExistRR = $checkUserExistQQ->fetchAll();
	$checkUserExistNN = count($checkUserExistRR);

	if($checkUserExistNN > 0)
	{
		if($status == 1) {
			return "exist";//User already exist
		} else {
			$uid = $checkUserExistRR[0]['uid'];
			$fname = $checkUserExistRR[0]['fname'];
			$lname = $checkUserExistRR[0]['lname'];

			return array("uid"=>$uid,"fname"=>$fname,"lname"=>$lname);
		}
	}
	else
	{
		return "fail";
	}
}
/*End: Check if user exist*/

/*Start: API Delivery Response*/
function deliveryResponse($status,$msg,$res) {
	$responseArray = array("status"=>$status,"message"=>$msg,"res"=>$res);
	echo json_encode($responseArray);
}
/*End: API Delivery Response*/

/*Start: API Call with CURL*/
function curlCall($url,$args=array(),$method) {
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);  
	curl_setopt($ch,CURLOPT_POSTFIELDS,$args);
	curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'$method');
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
}
/*End: API Call with CURL*/
?>