<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="css/style.css?v=<?php echo time();?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
</head>

<body>
  <nav>
    <div class ="header-column">
      <div class="header">

        <div class="navigation">
          <a href="./mypage.php"><ion-icon name="person-outline" class="icon"></ion-icon></a>
          <a href="./logout.php"><ion-icon  name="log-in-outline" class="icon"></ion-icon></a>
          <a href="./search.php"><ion-icon  name="search-outline" class="icon"></ion-icon></a>
          <a href="#"><ion-icon  name="cart-outline" class="icon"></ion-icon>
            <?php include('cart.php') ?>
          </a>
        </div>
        
        <div class="logo-img">
          <a href="./index.php"><img src="./img/LOGOwithoutcircle.png" alt="" width ="350px" height="200px"></a>
        </div>

      </div>
    </div>
  </nav>

<script>
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
  var myDropdown = document.getElementById("myDropdown");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  }
}
</script>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>

