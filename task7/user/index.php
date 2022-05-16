<?php
  //error_reporting(E_ALL);
  include $_SERVER['DOCUMENT_ROOT']."/Neotech/task7/function.php";//access root path in "include"
  $url = 'http://localhost/Neotech/task7/process.php?action=viewData';

  $requestArray = json_encode(array("uid"=>$_SESSION["uid"]));

  $result = curlCall($url,$requestArray,"POST");//CURL call to view post data
  $decodeResult = json_decode($result,true);
  //print_r($decodeResult);

  if($decodeResult['status'] != 200) {
    $responseData = $decodeResult['message'];
  } else {
    $responseData = $decodeResult['res'];
  }
  print_r($responseData);
?>