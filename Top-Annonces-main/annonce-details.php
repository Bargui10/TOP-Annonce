<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<title>Top Annonces - Details</title>
</head>
<body>

		
	<?php
		require("./bases/navbar.php");

		require("connect.php");
		// Check if the page number is specified and check if it's a number, if not return the default page number which is 1.
		$id = isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : 1;

		$stmtCurrent = $conn->prepare('SELECT * FROM annonce where id = ?');
		$stmtCurrent->bindParam(1, $id, PDO::PARAM_INT);
		$stmtCurrent->execute(); 
		$dataCurrent = $stmtCurrent->fetch();
		echo "ID " .$dataCurrent['id']. " Name " . $dataCurrent['name'];


		/*
		// Number of results to show on each page.
		$num_results_on_page = 4;

		if ($stmt = $conn->prepare('SELECT * FROM annonce ORDER BY name LIMIT ?,?')) {

		$stmt->bindParam(1, 1, PDO::PARAM_INT);
		$stmt->bindParam(2, $num_results_on_page,PDO::PARAM_INT);

		// Execute & Get the results...
		$stmt->execute(); 
		//echo("<br> Result = $result");
		*/

	?>


<!--        Single Product Details      -->

    <div class="small-container single-product">
        <div class="row">
            <div class="col-2">
                <img src="images/gallery-1.jpg" alt="" width="100%" id="productImg">

                <div class="small-img-row">
                    <div class="small-img-col">
                        <img src="images/gallery-1.jpg" alt="" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="images/gallery-2.jpg" alt="" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="images/gallery-3.jpg" alt="" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="images/gallery-4.jpg" alt="" width="100%" class="small-img">
                    </div>
                </div>




            </div>
            <div class="col-2">
                <p>Home / T-Shirt</p>
                <h1><?php echo $dataCurrent['name']; ?></h1>
                <h4>$<?php echo number_format( $dataCurrent['price'], 2); ?></h4>
				<h4>Ville: <?php echo $dataCurrent['ville']; ?></h4>
				<br>
				<small>Vendeur: Foulen Ben Foulen</small>
                <br>
                <button href="" onclick="change()" class="btn" id="contactText"><b>Contacter le vendeur</b> </button>
                <br>
				<a href="" class="btn btn-signal">Signaler l'annonce</a>
				
                <h3>Détails du Produit <i class="fa fa-indent"></i></h3>
                <br>
                <p> <?php echo $dataCurrent['details']; ?> </p>
            </div>
        </div>
    </div>


<!--        Title       -->

    <div class="small-container">
        <div class="row row-2">
            <h2>Produits Similaires</h2>
            <p>Voir Plus</p>
        </div>
    </div>


<!--        Products        -->

	<div class="small-container">	
		<div class="row">


			<!--        Add for loop here ( 4 items)        -->

			<div class="col-4">
				<img src="images/product-4.jpg" alt="">
				<h4>Red Printed T-shirt</h4>
				<div class="rating">
					<i class="fa fa-star" ></i>
					<i class="fa fa-star" ></i>
					<i class="fa fa-star" ></i>
					<i class="fa fa-star-o" ></i>
					<i class="fa fa-star-o" ></i>
				</div>
				<p>$50.000</p>
			</div>


		</div>

	</div>

	<!--		footer		-->

	<div class="footer">
		<div class="container">
			<div class="row">
				<div class="footer-col-1">
					<h3>Télécharger L'App</h3>
					<p>Télécharger Notre Application pour Android et iOS.</p>
					<div class="app-logo">
						<img src="images/play-store.png" alt="">
						<img src="images/app-store.png" alt="">
					</div>
				</div>
				<div class="footer-col-2">
					<img src="images/logo-white.png" alt="">
					<p>Top Annonces a Pour But de Rendre les Petites Annonces Accessibles Pour Tous les Tunisien(ne)s.</p>
				</div>
				<div class="footer-col-3">
					<h3>Liens Utiles</h3>
					<ul>
						<li>Coupons</li>
						<li>Blog</li>
						<li>S.A.V</li>
						<li>Affiliale</li>
					</ul>
				</div>
				<div class="footer-col-4">
					<h3>Liens Utiles</h3>
					<ul>
						<li>Facebook</li>
						<li>Twitter</li>
						<li>Instagram</li>
						<li>Youtube</li>
					</ul>
				</div>
			</div>
			<hr>
			<p class="copyright">Copyright 2022 FBS & IB</p>

		</div>
	</div>



    <!--    JS For Product Gallery-->
    <script>
        var productImg = document.getElementById("productImg");
        var smallImg = document.getElementsByClassName("small-img"); //array

        smallImg[0].onclick = function(){
            productImg.src = smallImg[0].src;
        }
        smallImg[1].onclick = function(){
            productImg.src = smallImg[1].src;
        }
        smallImg[2].onclick = function(){
            productImg.src = smallImg[2].src;
        }
        smallImg[3].onclick = function(){
            productImg.src = smallImg[3].src;
        }

		function change(){				// Hide Text And Show Number
			document.getElementById("contactText").innerHTML = "<b>+21699111000</b>";
		}
		


    </script>
</body>
</html>