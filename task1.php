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
    <h1>Validate Username</h1>
    <h4 id="message" style="display: none;"></h4>
    Username : <input type="text" name="username" id="username" placeholder="Eg: User_user123"><br/><br/>
    <input type="button" name="btn" value="Submit" onclick="validateUsername()">
  </center>

  <script type="text/javascript">
    /*?=. {4} minimun 4 character, [a-z] start with letters only, [a-z\d]* accepts 0 or many letters and digits, _? accepts 0 or 1 underscore, [a-z\d]+ accepts one or many letters and digits*/
    var atleast4CharRegx = /^(?=.{4})[a-z][a-z\d]*_?[a-z\d]+$/; 

    /*Start: Validate Usename*/
    function validateUsername() {
      var username = $('#username').val();
      if(!atleast4CharRegx.test(username)) {
        showMessage("Invalid username");
      } else {
        showMessage("Valid username");
      }
    }
    /*End: Validate username*/

    /*Start: Show message username validation*/
    function showMessage(msg) {
      document.getElementById('message').innerHTML = msg;
      $('#message').fadeIn('slow');
      setTimeout(function(){
        $('#message').fadeOut('slow');
      },4000);
    }
    /*End: Show message username validation*/
  </script>
</body>
</html>