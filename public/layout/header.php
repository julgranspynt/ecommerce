<?
require('../src/dbconnect.php');
?>

<link rel="stylesheet" href="css/style.css?v=<?php echo time();?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<nav>
    <div class ="header-column">
      <div class="header">
        <div class="navigation">
        <a href="./mypage.php"><ion-icon name="person-outline" class="icon"></ion-icon></a>
        <a href="./logout.php"><ion-icon  name="log-in-outline" class="icon"></ion-icon></a>
        <a href="#"><ion-icon  name="cart-outline" class="icon"></ion-icon></i></a>
        <a href="#"><ion-icon  name="search-outline" class="icon"></ion-icon></a>
        </div>
         <div class="logo-img">
         <a href="./index.php"><img src="./img/LOGOwithoutcircle.png" alt="" width ="350px" height="200px"></a>
        </div>
      </div>
</div>
</nav>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
