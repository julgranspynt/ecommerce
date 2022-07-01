<html>
<head>
<title>Search</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

</head>
<body>
<script>
    
$(document).ready(function(e){
    $("#search").keyup(function(){
        $("#show_up").show();
        var text = $(this).val();
        ajax({
            type: 'GET',
            url: 'search.php',
            data: 'txt=' + text,
            success: function(data){
                $("#show_up").html(data);
            }
        });
    })
});
</script>
<input type="text" name="products" id="search"/>
<div id="show_up">

</div>
</body>
</html>