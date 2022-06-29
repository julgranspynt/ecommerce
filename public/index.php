<?php 
require('../src/config.php');
include('./layout/header.php'); 

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style2.css?v=<?php echo time();?>">
	<title>Landing page</title>
</head>
<body>

	<main>

	
		<div class="banner"><b>Special offer:</b> Order before sunday to get free delivery on all orders over 300 SEK.</div>
		<div class="hero-container">
		<img src="img/Hero.png" alt="Fruits and smootie" class="img">
			<div class="hero-text">

			</div>
		</div>


		<div class="some-products">
      <br>
      <br>
			<legend>Organic powder mixes of fruits & veggies - mix into water, plant-milk or a smoothie</legend>
			<div class="product-div" style="height: 300px;">

			<div class="product-column"><img src="img/Calmgurkmeja.png" height="350px" width="auto"></div>
			<div class="product-column"><img src="img/Collagenkiss.png" height="350px" width="auto"></div>
			<div class="product-column"><img src="img/Tropical.png" height="350px" width="auto"></div>
			<div class="product-column"><img src="img/Matchapower.png" height="350px" width="auto"></div>
				
		</div>
    <div class="text-div">
      <div class="text-column"><b><legend>Gurkmeja Latte för<br> Immunförsvar Boost</legend></b></div>
      <div class="text-column"><b><legend>Collagen Booster för<br> Hud, Hår & Naglar</legend></b></div>
      <div class="text-column"><b><legend>Superfood för <br>hormonbalans</legend></b></div>
      <div class="text-column"><b><legend>Matcha Latte för<br> Ökad Fokus och Energi</legend></b></div>
    </div>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>

		  <legend><a class="button" href="products.php">View all our products</a></legend>
    
    <br>
    <br>
    <br>
<div class="gallery">
<div id="multi-item-example" class="carousel slide carousel-multi-item carousel-multi-item-2" data-ride="carousel">

  <div class="carousel-inner" role="listbox">

    <div class="carousel-item active">

      <div class="col-md-3 mb-3">
        <div class="card">
          <img class="img-fluid" src="img/smootie4.png"
            alt="Card image cap" height="350px" width="auto">
        </div>
      </div>

      <div class="col-md-3 mb-3">
        <div class="card">
          <img class="img-fluid" src="img/smootie7.png"
            alt="Card image cap" height="350px" width="auto">
        </div>
      </div>

      <div class="col-md-3 mb-3">
        <div class="card">
          <img class="img-fluid" src="img/smootie6.png"
            alt="Card image cap" height="350px" width="auto">
        </div>
      </div>

      <div class="col-md-3 mb-3">
        <div class="card">
          <img class="img-fluid" src="img/smootie5.png"
            alt="Card image cap" height="350px" width="auto">
        </div>
      </div>

    </div>

    <div class="carousel-item">

      <div class="col-md-3 mb-3">
        <div class="card">
          <img class="img-fluid" src="img/smootie1.png"
            alt="Card image cap" height="350px" width="auto">
        </div>
      </div>

      <div class="col-md-3 mb-3">
        <div class="card">
          <img class="img-fluid" src="img/smootie2.png"
            alt="Card image cap" height="350px" width="auto">
        </div>
      </div>

      <div class="col-md-3 mb-3">
        <div class="card">
          <img class="img-fluid" src="img/smootie3.png"
            alt="Card image cap" height="350px" width="auto">
        </div>
      </div>

      <div class="col-md-3 mb-3">
        <div class="card">
          <img class="img-fluid" src="img/smootie8.png"
            alt="Card image cap" height="350px" width="auto">
        </div>
      </div>
</div>
</div>

	<?php include('./layout/footer.php'); ?>

  <script>

if ( window.history.replaceState ) {window.history.replaceState( null, null, window.location.href );}
</script>  
</body>
</html>

