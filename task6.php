<?php
	error_reporting(E_ERROR | E_PARSE);

	$jsonData = '{"apiVersion": "2.1","videos": [{"id": "253","category": "Music","title": "Jingle Bells","duration": 457,"viewCount": 88270796}]}';
	
	$getViwcount = getViewCount($jsonData);//Call viewCount function
	echo "View Count: ".$getViwcount;

	/*Start: Get view count value from jsonData*/
	function getViewCount($jsonData) {

		$resJsonData = json_decode($jsonData, true);

		/*foreach($resJsonData['videos'] as $res){
			return $res['viewCount'];
		}*/

		foreach($resJsonData as $key=>$value)  {
		   foreach ($value as $val=>$res ) {
		      return $res['viewCount'];
		   }
		}
	}
	/*End: Get view count value from jsonData*/
?>