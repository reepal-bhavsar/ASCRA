<?php
require 'function.php'; 
//session_start();
$dbConnection = new dbConnection();
$conn = $dbConnection->getConnection();

/*Start: Register Api*/
if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'register') {
	try {
		$firstname = '';
		$lastname = '';
		$email = '';
		$username = '';
		$password = '';

		$data = json_decode(file_get_contents('php://input'));
		//echo $data;
		$firstname = $data->firstname;
		$lastname = $data->lastname;
		$email = $data->email;
		$username = $data->username;
		$password = $data->password;

		if(empty($firstname) || empty($lastname) || empty($email) || empty($username) || empty($password)) {
			deliveryResponse(400,'All the fields are required.',NULL);
		} else {

			$userExist = checkUserExist($username,$email,1);//Check if user already exist

			if($userExist == 'exist') {
				deliveryResponse(400,'User already exist.',NULL);
			} else {
				$registerUser = "INSERT INTO users(fname,lname,email,uname,upassword)
				VALUES('$firstname','$lastname','$email','$username','$password')";
				$registerUserQQ = $conn->query($registerUser);

				if($registerUserQQ) {
					deliveryResponse(200,'User registration successful.',NULL);
				} else {

					deliveryResponse(400,'Error in user registration.',NULL);
				}
			}
		}
	} catch (Exception $e) {
		deliveryResponse(400,'Bad request'.$e,NULL);
	}
}
/*End: Register Api*/

/*Start: Login Api*/
if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'login') {
	try {
		$username = '';
		$password = '';

		$data = json_decode(file_get_contents('php://input'));

		$username = $data->username;
		$password = $data->password;

		if(empty($username) || empty($password)) {
			deliveryResponse(400,'Username and password are required.',NULL);
		} else {
			$res = checkUserExist($username,$password,0);
			if($res != 'fail') {
				foreach ($res as $key => $value) {
					if($key == 'uid') {
						$uid = $value;
					} elseif ($key == 'fname') {
						$fname = $value;
					} elseif ($key == 'lname') {
						$lname = $value;
					}
				}

				/*Start: Set Session*/
				$_SESSION['uid'] = $uid;
				$_SESSION['fname'] = $fname;
				$_SESSION['lname'] = $lname;
				/*End: Set Session*/

				deliveryResponse(200,'Login successfull.',NULL);
			} else {
				deliveryResponse(400,'User does not exist.',NULL);
			}
		}
	} catch (Exception $e) {
		deliveryResponse(400,'Bad request.'.$e,NULL);
	}
}
/*End: Login Api*/

/*Start: View Data Api*/
if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'viewData') {
	try {
		$uid = '';
		$data = json_decode(file_get_contents('php://input'));
		$uid = $data->uid;
		
		if(empty($uid)) {
			deliveryResponse(400,'Invalid user.',$uid);
		} else {

			$viewData = "SELECT postid,posttitle,postbody FROM posts 
			WHERE uid = '$uid'";
			$viewDataQQ = $conn->query($viewData);
			$viewDataRR = $viewDataQQ->fetchAll();
			$viewDataNN = count($viewDataRR);

			if($viewDataNN > 0) {

				$i = 0;
				$responseArray = array();
				
				foreach ($viewDataRR as $key => $value) {
					$responseArray[$i]['postid'] = $value['postid'];
					$responseArray[$i]['posttitle'] = $value['posttitle'];
					$responseArray[$i]['postbody'] = $value['postbody'];
					$i++;
				}

				deliveryResponse(200,'Post details.',$responseArray);
			} else {
				deliveryResponse(400,'Bad request.'.$e,NULL);
			}
		}
	} catch (Exception $e) {
		deliveryResponse(400,'Bad request.'.$e,NULL);
	}
}
/*End: View Data Api*/
?>