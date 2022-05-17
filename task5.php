<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Task 1</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/jquery-ui.min.js"></script>
</head>

<body>
  <center>
    <h1>Crates Calculator</h1>
    <form action="" method="post">
    	Total Items : <input type="number" name="totalitems" id="totalitems" placeholder="Eg. 16"><br/><br/>
	    Large Crates : <input type="number" name="largecrate" id="largecrate" placeholder="Eg. 2"><br/><br/>
	    Small Crates : <input type="number" name="smallcrate" id="smallcrate" placeholder="Eg. 10"><br/><br/>
	    <input type="submit" name="submit" value="Submit">
    </form><br/><br/>

    <?php
	if(isset($_POST['submit'])) {
		$totalItems = $_POST['totalitems'];
		$largeCrate = $_POST['largecrate'];
		$smallCrate = $_POST['smallcrate'];

		$totalLargeCrates = 0;
		$totalSmallCrates = 0;

		if($largeCrate>0) {
			if($totalItems>0) {
				for ($k = 0 ; $k < $largeCrate; $k++) {
					 $totalItems -= 5;
					 $totalLargeCrates++;
					 if($totalItems <5 && $smallCrate>0) {
					 	break;
					 }
				}
			}
		}

		if($totalItems>0) {
			if($totalItems <= $smallCrate) {
				$totalSmallCrates = $totalItems;
			} else {
				echo "-1";exit;
			}
		}

		$totalCrates = $totalLargeCrates + $totalSmallCrates;
		echo "Total Crates =".$totalCrates." (Large Crates = ".$totalLargeCrates.", Small Crates = ".$totalSmallCrates.")";
	}
	?>
  </center>  
</body>
</html>