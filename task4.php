<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Task 4</title>

  <!--  jQuery -->
  <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/themes/base/jquery-ui.css" rel="stylesheet" />
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/jquery-ui.min.js"></script>
</head>

<body>
  <center>
    <h3>Date Format</h3>
    <form id="dateForm" name="dateForm">
      <div>
        <label for="date1">Date 1 : </label>
        <input type="text" id="date1" readonly />
      </div><br />
      <div>
        <label for="date2">Date 2 : </label>
        <input type="text" id="date2" readonly />
      </div><br />
      <div>
        <label for="date3">Date 3 : </label>
        <input type="text" id="date3" readonly />
      </div><br />
      <button type="button" onclick="transformDateFormat()">Submit</button><br /><br />
    </form>
    <div><span id="result"></span></div><br />
  </center>
  <script type="text/javascript">
    $(document).ready(function () {
        $('#date1').datepicker({dateFormat: 'yy/mm/dd'});
        $('#date2').datepicker({dateFormat: 'dd/mm/yy'});
        $('#date3').datepicker({dateFormat: 'mm-dd-yy'});
        $('#date1').datepicker('setDate', new Date());
        $('#date2').datepicker('setDate', new Date());
        $('#date3').datepicker('setDate', new Date());
    });

    /*Start: Validate form date*/
    function transformDateFormat() {
      var date1 = $('#date1').val().replace(/\//g, '');
      var date2 = $('#date2').val().split('/').reverse().join('');
      var date3 = $('#date3').val().split('-');
      var newDate3 = date3[2]+date3[0]+date3[1];

      const dateArray = new Array(date1,date2,newDate3);
      document.getElementById("result").innerHTML=dateArray;
    }
    /*End: Validate form date*/
  </script>
</body>
</html>