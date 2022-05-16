<script>
    $.ajax({
    "url": "http://localhost/Neotech/task7/process.php?action=login",
    "type": "POST",
    "contentType": "application/json",
    "data": JSON.stringify({"username": "reepal","password":"reepal123"}),
    dataType: 'json',
            //complete: function(data) {}
            success: function (data) {
                console.log(data);
            },
            error: function (error) {
                jsonValue = jQuery.parseJSON(error.responseText);
                console.log("error" + error.responseText);
            }
})
</script>