<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Page</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/jquery-ui.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<?php include "js.php"; ?>
</head>

<body>
  <center>
    <h1>Login</h1>
    <h4 id="message" style="display: none;"></h4>
    Username : <input type="text" name="username" id="username"><br/><br/>
    Password : <input type="password" name="password" id="password">&nbsp;<span id="pswicon" class="fa fa-fw fa-eye fa-eye-slash field_icon" onclick="showHidePassword()"></span><br/><br/>
    <input type="button" name="btn" value="Login" onclick="validateSignIn();">
    <button onclick="window.open('register.php','_top');">Register</button>
  </center>
</body>
</html>