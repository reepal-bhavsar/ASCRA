<?php 
define(APIURL, 'http://localhost/Neotech/task7/');
?>
<script>
    var char = /^[a-zA-Z\s]+$/;
    var mailregx = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var noSpaceRegex = /^\S*$/;
    var atleast3CharRegx = /^([0-9a-zA-Z]){3,}$/;
    var atleast7CharRegx = /^([0-9a-zA-Z]){7,}$/;
    var apiUrl = '<?php echo APIURL; ?>';

    /*Start: Validate User Details*/
    function validateUserDetails() {
        var fname = $('#fname').val().trim();
        var lname = $('#lname').val().trim();
        var email = $('#emailaddress').val().trim();
        var username = $('#username').val().trim();
        var password = $('#password').val().trim();
        var confirmpass = $('#confirmpass').val().trim();

        if(fname == '') {
            showMessage('First name is required');
        } else if(!char.test(fname)) {
            showMessage('First name should be in proper format');
        } else if(lname == '') {
            showMessage('Last name is required');
        } else if(!char.test(lname)) {
            showMessage('Last name should be in proper format');
        } else if(email == '') {
            showMessage('Email Address is required');
        } else if(!mailregx.test(email)) {
            showMessage('Email Address should be in proper format');
        } else if(!noSpaceRegex.test(email)) {
            showMessage('Email Address should not contain any space');
        } else if(username == '') {
            showMessage('User name is required');
        } else if(!noSpaceRegex.test(username)) {
            showMessage('User name should not contain any space');
        } else if(!atleast3CharRegx.test(username)) {
            showMessage('User name should be at least 3 characters');
        } else if(username.length > 50) {
            showMessage('User name should not be more than 50 characters');
        } else if(password == '') {
            showMessage('Password is required');
        } else if(!noSpaceRegex.test(password)) {
            showMessage('Password should not contain any space');
        } else if(!atleast7CharRegx.test(password)) {
            showMessage('Password should be at least 7 characters');
        } else if(confirmpass !== password) {
            showMessage('Password and confirm password did not match');
        } else {
            userRegistration(fname,lname,email,username,password);
        }
    }
    /*End: Validate User Details*/

    /*Start: User Registration */
    function userRegistration(fname,lname,email,username,password) {
        var dataObject = {};
        var newObj = {};
        var myarray = dataObject;

        /*JSON Arguments*/
        dataObject.firstname = fname;
        dataObject.lastname = lname;
        dataObject.email = email;
        dataObject.username = username;
        dataObject.password = password;
        newObj= myarray;
        
        var url = apiUrl+'process.php?action=register';
        var data = ajaxCall(url,'POST',JSON.stringify(newObj));//Make AJAX Call For Registration

        var jsonResponse = JSON.parse(data.responseText);
        
        setTimeout(function() {
            
            if(data.status != 200 || jsonResponse.status != 200) {
                showMessage(jsonResponse.message);
            }
            else {
                showMessage(jsonResponse.message);
                
                setTimeout(function() {
                    
                },1000);
            }   
        },1000);                    
    }
    /*End: User Registration*/

    /*Start: Validate Sign-in*/
    function validateSignIn() {
        var username = $('#username').val().trim();
        var password = $('#password').val().trim();
        
        if(username == '') {
            showMessage('Username is required');
        } else if(password == '') {
            showMessage('Password is required');
        } else {
            signIn(username,password);
        }
    }
    /*End: Validate Sign-in*/

    /*Start: Sign-in */
    function signIn(usernm,password) {
        var dataObject = {};
        var newObj = {};
        var myarray = dataObject;

        /*JSON Arguments*/
        dataObject.username = usernm;
        dataObject.password = password;
        newObj= myarray;
        
        var url = apiUrl+'process.php?action=login';
        var data = ajaxCall(url,'POST',JSON.stringify(newObj));//Make AJAX Call For SignIn

        var jsonResponse = JSON.parse(data.responseText);
        //console.log(data.status);
        setTimeout(function() {
            
            if(data.status != 200 || jsonResponse.status != 200) {
                showMessage(jsonResponse.message);
            }
            else {
                showMessage(jsonResponse.message);
                
                setTimeout(function() {
                    window.location = "user/index.php";
                },1000);
            }   
        },1000);                    
    }
    /*End: Sign in*/

    /*Start: Ajax Call*/
    function ajaxCall(url,type,jsonData) {
        return $.ajax({
            async: false,
            type: type,
            url: url,
            data: jsonData,
            dataType: 'json',
            /*complete: function(data) {
                console.log("Com"+jsonData);
            },*/
            success: function (data) {
                //console.log(data);
            },
            error: function (error) {
                //jsonValue = jQuery.parseJSON(error.responseText);
                //console.log("error" + jsonData);
            }
        });
    }
    /*End: Ajex Call*/

    /*Start: Show message username validation*/
    function showMessage(msg) {
        document.getElementById('message').innerHTML = msg;
        $('#message').fadeIn('slow');
        setTimeout(function(){
            $('#message').fadeOut('slow');
        },4000);
    }
    /*End: Show message username validation*/

    /*Start: Show/Hide Password*/
    function showHidePassword() {
        var pswType = document.getElementById('password');
        var pswIcon = document.getElementById('pswicon');
        
        if(pswType.type === 'password') {
            pswIcon.classList.remove("fa-eye-slash");
            pswType.type = "text";
        } else {
            pswIcon.classList.add("fa-eye-slash");
            pswType.type = "password";
        }
    }
    /*End: Show/Hide Password*/
</script>