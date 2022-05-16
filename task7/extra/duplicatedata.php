<?php
exit;
require 'function.php'; 

$dbConnection = new dbConnection();
$conn = $dbConnection->getConnection();

$x=1;
$col1 = 'Post Title';
$content = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Blog Example</title>
</head>

<body>
  <center>
    <h1>Blog Example</h1>
    <p>This is blog example.</p>
  </center>
</body>
</html>';
$col2 = base64_encode($content);
$col3 = 2;
$quantity = 993;

$query = "INSERT INTO `posts` (`posttitle`, `postbody`, `uid`) VALUES ('$col1', '$col2', '$col3') ";

while ($x <= $quantity)
{
     $col1;
     $col2;
     $col3;
     $x++;
     $query .= ", ('$col1', '$col2', '$col3') ";
}
//echo $query;

$registerUserQQ = $conn->query($query);

        if($registerUserQQ) {
          echo "success";
        } else {

          echo $query;
        }
?>