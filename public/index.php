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

	<?php include('./layout/header.php'); ?>

	<main>

	
		<div class="banner"><b>Special offer:</b> Order before sunday to get free delivery on all orders over 300 SEK.</div>
		<div class="hero-container">
		<img src="img/Hero.png" alt="Fruits and smootie" class="img">
			<div class="hero-text">

			</div>
		</div>


		<div class="some-products">
      <br>
			<h2>Organic powder mixes of fruits & veggies - mix into water, plant-milk or a smoothie</h2>
			<div class="product-div" style="height: 300px;">

			<div class="product-column">Product 1</div>
			<div class="product-column">Product 2</div>
			<div class="product-column">Product 3</div>
			<div class="product-column">Product 4</div>
				
			</div>
			<h3><a class="button" href="products.php">View all our products</a></h3>
		</div>
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

