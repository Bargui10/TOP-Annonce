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

		// get annonce information
		$stmtCurrent = $conn->prepare('SELECT * FROM annonce where id = ?');
		$stmtCurrent->bindParam(1, $id, PDO::PARAM_INT);
		$stmtCurrent->execute(); 
		$dataCurrent = $stmtCurrent->fetch();
		echo "ID Annonce: " .$dataCurrent['id']. " Nom Annonce " . $dataCurrent['name'];

		// get vendeur information
		$stmtVendeur = $conn->prepare('SELECT * FROM users WHERE id =?');
		$stmtVendeur->bindParam(1, $dataCurrent['idvendeur'], PDO::PARAM_INT);
		$stmtVendeur->execute();
		$dataVendeur = $stmtVendeur->fetch();
		echo "<br>ID Vendeur: " .$dataVendeur['id']. " Nom Vendeur " . $dataVendeur['name'];

		// get other annonces from same vendeur
		$stmtAnnonces = $conn->prepare('SELECT * FROM annonce WHERE idvendeur= ? AND id<> ? ORDER BY popularite LIMIT 0,3');
		$stmtAnnonces->bindParam(1, $dataCurrent['idvendeur'], PDO::PARAM_INT);
		$stmtAnnonces->bindParam(2, $dataCurrent['id'], PDO::PARAM_INT);
		$stmtAnnonces->execute();
		$dataAnnonces = $stmtAnnonces->fetchAll();

		$annoncesCount = $stmtAnnonces->rowCount();
		if ($annoncesCount < 4) {
			# code...
			$getMore = TRUE;
			// fill the rest with other annonces (max = 4)

			// calculate how many left
			$nbToGet = 4- $annoncesCount;

			$stmtOtherAnnonces = $conn->prepare('SELECT * FROM annonce WHERE idvendeur <> ? ORDER BY popularite LIMIT 0,?');
			$stmtOtherAnnonces->bindParam(1, $dataCurrent['idvendeur'], PDO::PARAM_INT);
			$stmtOtherAnnonces->bindParam(2, $nbToGet, PDO::PARAM_INT);
			$stmtOtherAnnonces->execute();
			$dataOtherAnnonces = $stmtOtherAnnonces->fetchAll();
			$otherAnnoncesCount = $stmtOtherAnnonces->rowCount();


		}else {
			# code...
			$getMore = FALSE;
			$otherAnnoncesCount = 0;
		}
		echo "<br>Nb annonces By same vendeur: " .$annoncesCount;
		echo "<br>Nb other annonces: " .$otherAnnoncesCount;

		// signaler

		if(isset($_POST['signaler'])){
			if (isset($_SESSION['user_id'])) { // check if user is connected
				if (isset($_SESSION['annonces_signales']) and strpos($_SESSION['annonces_signales'], ".".$dataCurrent['id']."." )) {  // prevent user from signaling the same annonces many times
					# code...
					echo "Vous ne pouvez pas signaler la meme annonce plusieurs fois.";
				}
				else {
					# code...
					$stmtSignaler = $conn->prepare('UPDATE annonce set signals = signals + 1 WHERE id = ?');
					$stmtSignaler->bindParam(1, $dataCurrent['id'], PDO::PARAM_INT);
					$stmtSignaler->execute();

					if (isset($_SESSION['annonces_signales'])) {
						# code...
						$_SESSION['annonces_signales'] = $_SESSION['annonces_signales'].$dataCurrent['id'].".";

					}else {
						# code...
						$_SESSION['annonces_signales'] = ".".$dataCurrent['id']+".";

					}
					echo "<br>Annonce Signalée: ".$dataCurrent['id']. "  Annonces signalées: ".$_SESSION['annonces_signales'];
				}
				
				

			}else {
				# code...
				echo "<br>Vous devez etre connecté pour signaler une annonce";

			}
			

		}


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
                <img src="images/<?php echo $dataCurrent['image1']; ?>" alt="" width="100%" id="productImg">

                <div class="small-img-row">
                    <div class="small-img-col">
                        <img src="images/<?php echo $dataCurrent['image2']; ?>" alt="" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="images/<?php echo $dataCurrent['image3']; ?>" alt="" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="images/<?php echo $dataCurrent['image4']; ?>" alt="" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="images/<?php echo $dataCurrent['image5']; ?>" alt="" width="100%" class="small-img">
                    </div>
                </div>




            </div>
            <div class="col-2">
                <p>Home / T-Shirt</p>
                <h1><?php echo $dataCurrent['name']; ?></h1>
                <h4>$<?php echo number_format( $dataCurrent['price'], 2); ?></h4>
				<p>Emplacement: <?php echo $dataCurrent['ville']." - ".$dataCurrent['delegation'] ; ?></p>
				<br>
				<p>Vendeur: <?php echo $dataVendeur['name']; ?></p>
                <br>
                <button href="" onclick="change()" class="btn" id="contactText"><b>Appeler le vendeur</b> </button>
                
				<button href="" onclick="changeEmail()" class="btn" id="emailText"><b>Email du vendeur</b> </button>
                <br>

				<form action="" method="post">
					<div class="row">
						<div class="col-4">
							<input type="submit" name="signaler" class="btn btn-signal" value="Signaler l'annonce">

						</div>
					</div>
				</form>


				
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
            <a href="products.php">Voir plus</a>
        </div>
    </div>


<!--        Products        -->

	<div class="small-container">	
		<div class="row">

<a href=""></a>
			<!--        Add for loop here ( 4 items)        -->
			<?php
			if ($annoncesCount) {
				# code...
				foreach ($dataAnnonces as $dataAnnonce ) {
					# code...
					echo('
					<div class="col-4">
						<img src="images/product-4.jpg" alt="">
						<h4><a href="annonce-details.php?id='.$dataAnnonce["id"].'">'.$dataAnnonce["name"].'</a></h4>
						
						<p>$'.number_format( $dataAnnonce['price'], 2).'</p>
					</div>
					');
	
				}
			}
			if ($otherAnnoncesCount) {
				# code...
				foreach ($dataOtherAnnonces as $dataOtherAnnonce ) {
					# code...
					echo('
					<div class="col-4">
						<img src="images/product-4.jpg" alt="">
						<h4><a href="annonce-details.php?id='.$dataOtherAnnonce["id"].'">'.$dataOtherAnnonce["name"].'</a></h4>
						
						<p>$'.number_format( $dataOtherAnnonce['price'], 2).'</p>
					</div>
					');
	
				}
			}
			
			
			?>


		</div>

	</div>

	<!--		footer		-->
	<?php
		require("./bases/footer.php")
	?>



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
			let number = '<?php echo $dataVendeur['telephone']; ?>';
			document.getElementById("contactText").innerHTML = "<b>+216-"+ number+"</b>";
			
		}
		function changeEmail(){				// Hide Text And Show Email
			let email = '<?php echo $dataVendeur['email']; ?>';
			document.getElementById("emailText").innerHTML = "<b>"+email+"</b>";
			
		}
		


    </script>
</body>
</html>