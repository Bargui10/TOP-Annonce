<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<title>Top Annonces</title>
</head>
<body>

	
	<?php
		require("./bases/navbar.php");
		require("connect.php");
	?>


	<div class="header">
		<div class="container">
			<div style="margin-top: 10px;" class="row">
				<div class="col-2">
					<h1>Trouvez les meilleures annonces <br> en Tunisie</h1>
					<p>Chez Top Annonces, cherchez les bonnes affaires, <br> ou publiez vos propres annonces, C'EST GRATUIT ! </p>
					<a href="" class="btn">En Savoir Plus &#8594;</a>
					<br>
					<img src="images/tunisia.png" id="tunisia" alt="">

				</div>
				<div class="col-2">
					<!--	src="https://image.similarpng.com/very-thumbnail/2021/04/Tunisia-flag-icon-on-transparent-background-PNG.png"	-->
					<img src="images/image1.png" alt="">
				</div>

			</div>
		</div>
	</div>


    <!--        Form        -->
        <div class="container">
            <div class="row">
               
                    <div class="form-container filter-container">
                        <div class="form-btn">
                            <span onclick="register()">Rechercher sur Top Annonces</span>
                            <hr id="Indicator">
                        </div>

                        
                        <form id="RegisterForm" action="">
							<div class="row">
									<input type="text" placeholder="Rechercher sur Top Annonces" >
								
							</div>
							<div class="row">
									<input type="number" placeholder="Prix Minimum">

									<input type="number" placeholder="Prix Maximum">

							</div>
							
							<select name="" id="">
								<option value="">Ville</option>
								<option value="">Ariana</option>
								<option value="">Ben Arous</option>
								<option value="">Bizerte</option>
								<option value="">Béja</option>
								<option value="">Gabes</option>
								<option value="">Gafsa</option>
								<option value="">Jendouba</option>
								<option value="">Kairouan</option>
								<option value="">Kasserine</option>
								<option value="">Kébili</option>
								<option value="">La Manouba</option>
								<option value="">Le Kef</option>
								<option value="">Mahdia</option>
								<option value="">Monastir</option>
								<option value="">Médenine</option>
								<option value="">Nabeul</option>
								<option value="">Sfax</option>
								<option value="">Sidi Bou Zid</option>
								<option value="">Siliana</option>
								<option value="">Sousse</option>
								<option value="">Tataouine</option>
								<option value="">Tozeur</option>
								<option value="">Tunis</option>
								<option value="">Zaghouan</option>
							</select>
							<select name="" id="">
								<option value="">Délégation</option>
								<option value="">Autres Villes</option>
							</select>
							<select name="" id="">
								<option value="">Catégorie</option>
								<option value="">Véhicules</option>
								<option value="">MAison et Jardin</option>
								<option value="">Emploi et Services</option>
								<option value="">Immobilier</option>
								<option value="">Habillement et Bien Etre</option>
								<option value="">Informatique et Multimédia</option>
								<option value="">Loisirs et Divertissement</option>
								<option value="">Autres</option>
							</select>
							<select name="" id="">
								<option value="">Sous-catégorie</option>
								<option value="">Autres</option>
							</select>

							<button type="submit" class="btn">Filtrer</button>
                        </form>

                    </div>
            </div>
        </div>

	<!------- featured categories ---------->
	<div class="categories">
		<div class="small-container">
			<h2 class="title">Top Catégories</h2>
			<div class="row">
				<div class="col-3">
					<img src="images/category-1.jpg" alt="">
					<h3>Habillement</h3>
				</div>
				<div class="col-3">
					<img src="images/category-2.jpg" alt="">
					<h3>Divertissement</h3>
				</div>
				<div class="col-3">
					<img src="images/category-3.jpg" alt="">
					<h3>Informatique & Multimédia</h3>
				</div>
	
			</div>
		</div>
		
	</div>

		<!------- featured products ---------->

	<div class="small-container">
		
		<h2 class="title">Annonces à la une</h2>
		
		<div class="row">
			
			<div class="col-4">
				<a href="product-details.html"><img src="images/product-1.jpg" alt=""></a>
				<a href="product-details.html"><h4>Red Printed T-shirt</h4></a>
				<div class="rating">
					<i class="fa fa-star" ></i>
					<i class="fa fa-star" ></i>
					<i class="fa fa-star" ></i>
					<i class="fa fa-star-half-o" ></i>
					<i class="fa fa-star-o" ></i>
				</div>
				<p>$50.000</p>
			</div>
			<div class="col-4">
				<img src="images/House-1.png" alt="">
				<h4>Maison Moderne</h4>
				<div class="rating">
					<i class="fa fa-star" ></i>
					<i class="fa fa-star" ></i>
					<i class="fa fa-star" ></i>
					<i class="fa fa-star-half-o" ></i>
					<i class="fa fa-star-o" ></i>
				</div>
				<p>$300,000.00</p>
			</div>
			<div class="col-4">
				<img src="images/product-2.jpg" alt="">
				<h4>Red Printed T-shirt</h4>
				<div class="rating">
					<i class="fa fa-star" ></i>
					<i class="fa fa-star" ></i>
					<i class="fa fa-star" ></i>
					<i class="fa fa-star" ></i>
					<i class="fa fa-star-o" ></i>
				</div>
				<p>$50.000</p>
			</div>
			<div class="col-4">
				<img src="images/product-3.jpg" alt="">
				<h4>Red Printed T-shirt</h4>
				<div class="rating">
					<i class="fa fa-star" ></i>
					<i class="fa fa-star" ></i>
					<i class="fa fa-star" ></i>
					<i class="fa fa-star" ></i>
					<i class="fa fa-star-half-o" ></i>
				</div>
				<p>$50.000</p>
			</div>
			
		</div>


		<h2 class="title">Annonces récents</h2>
		
		
		<div class="row">
			
			<div class="col-4">
				<img src="images/car-2.png" alt="">
				<h4>Mitsubishi Outlander À Vendre</h4>
				<div class="rating">
					<i class="fa fa-star" ></i>
					<i class="fa fa-star" ></i>
					<i class="fa fa-star" ></i>
					<i class="fa fa-star-half-o" ></i>
					<i class="fa fa-star-o" ></i>
				</div>
				<p>$175,000.00</p>
			</div>
			<div class="col-4">
				<img src="images/House-2.png" alt="">
				<h4>Maison coquette moderne</h4>
				<div class="rating">
					<i class="fa fa-star" ></i>
					<i class="fa fa-star" ></i>
					<i class="fa fa-star" ></i>
					<i class="fa fa-star" ></i>
					<i class="fa fa-star-o" ></i>
				</div>
				<p>$210,000.00</p>
			</div>
			<div class="col-4">
				<img src="images/car-1.png" alt="">
				<h4>À Vendre Voiture Nissan Bleue</h4>
				<div class="rating">
					<i class="fa fa-star" ></i>
					<i class="fa fa-star" ></i>
					<i class="fa fa-star" ></i>
					<i class="fa fa-star" ></i>
					<i class="fa fa-star-half-o" ></i>
				</div>
				<p>$80,000.00</p>
			</div>
			<div class="col-4">
				<img src="images/car-3.png" alt="">
				<h4>Voiture BMW Blanche</h4>
				<div class="rating">
					<i class="fa fa-star" ></i>
					<i class="fa fa-star" ></i>
					<i class="fa fa-star" ></i>
					<i class="fa fa-star-o" ></i>
					<i class="fa fa-star-o" ></i>
				</div>
				<p>$190,000.00</p>
			</div>
			
		</div>


		<div class="row">
			<div class="col-4">
				<img src="images/product-9.jpg" alt="">
				<h4>Red Printed T-shirt</h4>
				<div class="rating">
					<i class="fa fa-star" ></i>
					<i class="fa fa-star" ></i>
					<i class="fa fa-star" ></i>
					<i class="fa fa-star-half-o" ></i>
					<i class="fa fa-star-o" ></i>
				</div>
				<p>$50.000</p>
			</div>
			<div class="col-4">
				<img src="images/product-10.jpg" alt="">
				<h4>Red Printed T-shirt</h4>
				<div class="rating">
					<i class="fa fa-star" ></i>
					<i class="fa fa-star" ></i>
					<i class="fa fa-star" ></i>
					<i class="fa fa-star" ></i>
					<i class="fa fa-star-o" ></i>
				</div>
				<p>$50.000</p>
			</div>
			<div class="col-4">
				<img src="images/product-11.jpg" alt="">
				<h4>Red Printed T-shirt</h4>
				<div class="rating">
					<i class="fa fa-star" ></i>
					<i class="fa fa-star" ></i>
					<i class="fa fa-star" ></i>
					<i class="fa fa-star" ></i>
					<i class="fa fa-star-half-o" ></i>
				</div>
				<p>$50.000</p>
			</div>
			<div class="col-4">
				<img src="images/product-12.jpg" alt="">
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

	<!--		OFFERS		-->

	<div class="offer">
		<div class="small-container">
			<div class="row">
				<div class="col-2">
					<img src="images/watch.png" class="offer-img" alt="">
				</div>
				<div class="col-2">
					<p>Disponible exclusivement chez Top Annonces</p>
					<h1>Smart Band 4</h1>
					<small>Surveillez votre santé avec le nouveau NBS05 Blue Bluetooth 4.0 Smart Bracelet. Fonction multiple,suivi de la santé,Suivi de la condition physique </small>
					<a href="" class="btn">Voir Détails &#8594;</a>
				</div>

			</div>
		</div>
	</div>




	<!--		TESTIMONIALS		-->
	<div class="testimonial">
		<div class="small-container">
			<div class="row">
				<!--INDIV TESTIMONIAL-->
				<?php
					$stmt = $conn->prepare('SELECT * FROM avis ORDER BY rating DESC LIMIT 0,3'); 
					if ($stmt) {
						# code...
						$stmt->execute(); 
						$rows = $stmt->rowCount();
						$data = $stmt->fetchAll();

						foreach ($data as $col) {
							# code...
							$stmtImage = $conn->prepare('SELECT name,image FROM users WHERE id = ?'); 
							$stmtImage->bindParam(1, $col[2], PDO::PARAM_INT);
							$stmtImage->execute();
							$dataUser = $stmtImage->fetch();
							echo('
							<div class="col-3">
								<i class="fa fa-quote-left" ></i>

								<p>'.$col[1].'</p>	<!-- avis.description -->
								<div class="rating">
								
							');//<!--echo end-->
								$avis = $col[3];
								for ($i=1; $i <= $avis ; $i++) { 
									# code...
									echo('<i class="fa fa-star" ></i>');

								}
								if ($avis < 5) {
									# code...
									$total = $avis;
									while ($total < 5) {
										# code...
										echo('<i class="fa fa-star-o" ></i>');
										$total +=1;
									}
								}
								
								//<!--echo start-->
								echo('
								</div>
								<img src="images/'.$dataUser[2].'" alt="">
								<h3>'.$dataUser[1].'</h3> <!-- user.name -->
							</div>
							');

						}
					}
				?>
			</div>
		</div>
	</div>


<!--		TESTIMONIALS		-->
	<div class="testimonial">
		<div class="small-container">
			<div class="row">
				<!--INDIV TESTIMONIAL-->
				<div class="col-3">
					<i class="fa fa-quote-left" ></i>

					<p>Top Annonces est un site magnifique qui a une interface utilisateur ergonomique.</p>	
					<div class="rating">
						<i class="fa fa-star" ></i>
						<i class="fa fa-star" ></i>
						<i class="fa fa-star" ></i>
						<i class="fa fa-star-half-o" ></i>
						<i class="fa fa-star-o" ></i>
					</div>
					<img src="images/user-1.png" alt="">
					<h3>Alice Parker</h3>
				</div>
				
			</div>
		</div>
	</div>

	<!--		BRANDS		-->

	<div class="brands">
		<div class="small-container">
			<div class="row">
				<div class="col-5">
					<img src="images/logo-godrej.png" alt="">
				</div>
				<div class="col-5">
					<img src="images/logo-oppo.png" alt="">
				</div>
				<div class="col-5">
					<img src="images/logo-coca-cola.png" alt="">
				</div>
				<div class="col-5">
					<img src="images/logo-paypal.png" alt="">
				</div>
				<div class="col-5">
					<img src="images/logo-philips.png" alt="">
				</div>
			</div>
		</div>
	</div>

	<!--		footer		-->
	<?php
		require("./bases/footer.php")
	?>


</body>
</html>