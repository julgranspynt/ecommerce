$(function() {
    $(".delbutton").click(function(){

     var element = $(this);
  
     var del_id = element.attr("id");
   
     var info = 'id=' + del_id;
     if(confirm("Sure you want to delete this product? There is NO undo!")) {
        $.ajax({
         type: "GET",
         url: "delete.php",
         data: info,
         success: function(data){ 
         alert("Ok, it's gone now");
         }
      });
      $(this).parents("#data_products").animate({ backgroundColor: "#fbc7c7" }, "fast")
        .animate({ opacity: "hide" }, "slow");
      }
     return false;
    });
    });