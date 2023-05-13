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



		//SELECT * from annonce a, users u WHERE u.id = a.idvendeur AND u.vip = 1 ORDER BY a.popularite DESC LIMIT 0,4; 

		$stmtBestAnnonces = $conn->prepare('SELECT a.id, a.price,a.name, a.datepublication, a.image1 from annonce a, users u WHERE u.id = a.idvendeur AND u.vip = 1 ORDER BY a.popularite DESC LIMIT 0,4');
		$stmtBestAnnonces->execute(); 
		$bestAnnonces = $stmtBestAnnonces->fetchAll();
		//echo "ID Annonce: " .$bestAnnonces['id']. " Nom Annonce " . $bestAnnonces['name'];

		$stmtNewAnnonces = $conn->prepare('SELECT * from annonce  ORDER BY datepublication DESC, popularite DESC LIMIT 0,8');
		$stmtNewAnnonces->execute(); 
		$newAnnonces = $stmtNewAnnonces->fetchAll();
		//echo "ID Annonce: " .$bestAnnonces['id']. " Nom Annonce " . $bestAnnonces['name'];

		// categories and their images
		$stmtCategories = $conn->prepare('SELECT DISTINCT categorie, image1 from annonce where categorie <> "" GROUP BY categorie LIMIT 0,3; ');
		$stmtCategories->execute();
		$listeCategories = $stmtCategories->fetchAll();



		//
		
		// Check TRI Type 
		
		if (isset($_POST['filter_submit'])) {
			# code...
			echo"<br>button set";

			if (!empty($_POST['filter_name']) and !empty($_POST['filter_min'])  and !empty($_POST['filter_max']) and !empty($_POST['filter_ville'])  and  !empty($_POST['filter_categorie']) ) {
				echo"<br>first";

				$stmt = $conn->prepare('SELECT * FROM annonce where name LIKE ? AND price BETWEEN ? AND ? AND ville = ? AND categorie = ? ORDER BY name ASC'); 

				$stmt->bindParam(1, $_POST['filter_name'], PDO::PARAM_STR);
				$stmt->bindParam(2, $_POST['filter_min'], PDO::PARAM_INT);
				$stmt->bindParam(3, $_POST['filter_max'], PDO::PARAM_INT);
				$stmt->bindParam(4, $_POST['filter_ville'], PDO::PARAM_STR);
				$stmt->bindParam(5, $_POST['filter_categorie'], PDO::PARAM_STR);

			} // name, prix mi, prix max, ville, délégation, catégorie, sous-catégorie
			elseif (!empty($_POST['filter_name']) and !empty($_POST['filter_min'])  and !empty($_POST['filter_max']) and !empty($_POST['filter_ville']) ) {
				echo"<br>second";

				$stmt = $conn->prepare('SELECT * FROM annonce where name LIKE ? AND price BETWEEN ? AND ? AND ville = ? ORDER BY name ASC'); 

				$stmt->bindParam(1, $_POST['filter_name'], PDO::PARAM_STR);
				$stmt->bindParam(2, $_POST['filter_min'], PDO::PARAM_INT);
				$stmt->bindParam(3, $_POST['filter_max'], PDO::PARAM_INT);
				$stmt->bindParam(4, $_POST['filter_ville'], PDO::PARAM_STR);

			}
			elseif (!empty($_POST['filter_name']) and !empty($_POST['filter_min'])  and !empty($_POST['filter_max'])  ) {
				echo"<br>third";
				
				$stmt = $conn->prepare('SELECT * FROM annonce where name LIKE ? AND price BETWEEN ? AND ? ORDER BY name ASC'); 

				$stmt->bindParam(1, $_POST['filter_name'], PDO::PARAM_STR);
				$stmt->bindParam(2, $_POST['filter_min'], PDO::PARAM_INT);
				$stmt->bindParam(3, $_POST['filter_max'], PDO::PARAM_INT);

			}
			elseif (!empty($_POST['filter_name']) and !empty($_POST['filter_min'])  ) {
				echo"<br>fourth";

				$stmt = $conn->prepare('SELECT * FROM annonce where name LIKE ? AND price >= ? ORDER BY name ASC'); 

				$stmt->bindParam(1, $_POST['filter_name'], PDO::PARAM_STR);
				$stmt->bindParam(2, $_POST['filter_min'], PDO::PARAM_INT);

			}
			
			elseif (!empty($_POST['filter_name']) and !empty($_POST['filter_max'])  ) {
				echo"<br>fifth";

				$stmt = $conn->prepare('SELECT * FROM annonce where name LIKE ? AND price <= ? ORDER BY name ASC'); 

				$stmt->bindParam(1, $_POST['filter_name'], PDO::PARAM_STR);
				$stmt->bindParam(2, $_POST['filter_max'], PDO::PARAM_INT);

			}
			elseif (!empty($_POST['filter_name']) ) {
				echo"<br>sixth";

				$stmt = $conn->prepare('SELECT * FROM annonce where name LIKE ? ORDER BY popularite ASC'); 

				$stmt->bindParam(1, $_POST['filter_name'], PDO::PARAM_STR);

			}
			elseif (!empty($_POST['filter_categorie']) ) {
				echo"<br>seventh";

				$stmt = $conn->prepare('SELECT * FROM annonce where categorie LIKE ? ORDER BY name ASC'); 

				$stmt->bindParam(1, $_POST['filter_categorie'], PDO::PARAM_STR);

			}
			elseif (!empty($_POST['filter_ville']) ) {
				echo"<br>ninth";

				$stmt = $conn->prepare('SELECT * FROM annonce where ville LIKE ? ORDER BY name ASC'); 

				$stmt->bindParam(1, $_POST['filter_ville'], PDO::PARAM_STR);

			}
			elseif (!empty($_POST['filter_min']) ) {
				echo"<br>tenth";

				$stmt = $conn->prepare('SELECT * FROM annonce where price >= ? ORDER BY price ASC'); 

				$stmt->bindParam(1, $_POST['filter_min'], PDO::PARAM_INT);

			}
			elseif (!empty($_POST['filter_max']) ) {
				echo"<br>eleventh";

				$stmt = $conn->prepare('SELECT * FROM annonce where price <= ? ORDER BY price ASC'); 

				$stmt->bindParam(1, $_POST['filter_max'], PDO::PARAM_INT);

			}else {
				# code...
				echo"<br>twelvth";

				$stmt = $conn->prepare('SELECT * FROM annonce ORDER BY popularite ASC'); 

			}

			$stmt->execute();
			$filtered_annonces = $stmt->fetchAll();
		

		}

		

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

                        
                        <form id="RegisterForm" action="" method="post">
							<div class="row">
								<input type="text" name="filter_name" placeholder="Rechercher sur Top Annonces" >
							</div>
							<div class="row">
								<input type="number" name="filter_min" placeholder="Prix Minimum">
								<input type="number" name="filter_max" placeholder="Prix Maximum">
							</div>
							
							<select name="filter_ville" id="">
								<option value="">Ville</option>
								<option value="Ariana">Ariana</option>
								<option value="Ben Arous">Ben Arous</option>
								<option value="Bizerte">Bizerte</option>
								<option value="Béja">Béja</option>
								<option value="Gabes">Gabes</option>
								<option value="Gafsa">Gafsa</option>
								<option value="Jendouba">Jendouba</option>
								<option value="Kairouan">Kairouan</option>
								<option value="Kasserine">Kasserine</option>
								<option value="Kébili">Kébili</option>
								<option value="La Manouba">La Manouba</option>
								<option value="Le Kef">Le Kef</option>
								<option value="Mahdia">Mahdia</option>
								<option value="Monastir">Monastir</option>
								<option value="Médenine">Médenine</option>
								<option value="Nabeul">Nabeul</option>
								<option value="Sfax">Sfax</option>
								<option value="Sidi Bou Zid">Sidi Bou Zid</option>
								<option value="Siliana">Siliana</option>
								<option value="Sousse">Sousse</option>
								<option value="Tataouine">Tataouine</option>
								<option value="Tozeur">Tozeur</option>
								<option value="Tunis">Tunis</option>
								<option value="Zaghouan">Zaghouan</option>
							</select>
						
							<select name="filter_categorie" id="">
								<option value="">Catégorie</option>
								<option value="vehicules">Véhicules</option>
								<option value="maison">MAison et Jardin</option>
								<option value="emploi">Emploi et Services</option>
								<option value="immobilier">Immobilier</option>
								<option value="habillement">Habillement et Bien Etre</option>
								<option value="informatique">Informatique et Multimédia</option>
								<option value="loisirs">Loisirs et Divertissement</option>
								<option value="autres">Autres</option>
							</select>
							

							<button name="filter_submit" type="submit" class="btn">Filtrer</button>
                        </form>

                    </div>
            </div>
        </div>
		
	<!--	FILTER RESULTS	 -->
	

		<?php
			// s'il ya des annonces qui correspondent aux résultats de recherches de l'utilisateur:
			if (isset($stmt)) {
				# code...
			
			if ($stmt->rowCount() > 0) {
				# code...
				
				?>
				<div class="small-container">
					<h2 class="title">Résultats de recherche</h2>
					
					<div class="row">
					<?php
						foreach ($filtered_annonces as $filtered_annonce ) {
							# code...
							echo('
								<div class="col-4">
									<a href="annonce-details.php?id='.$filtered_annonce['id'].'"><img src="uploaded_img/'.$filtered_annonce['image1'].'" alt=""></a>
									<a href="annonce-details.php?id='.$filtered_annonce['id'].'"><h4>'.$filtered_annonce['name'].'</h4></a>
									
									<p>$ '.number_format( $filtered_annonce['price'], 2).'</p>
									<p>Publiée le '. date( "m/d/Y", strtotime($filtered_annonce['datepublication'])) .'</p>
								</div>

							');

						}
					
					?>
							
							
					</div>
				</div>

		<?php
			}	
		}	
		
		?>

		
				
				
			


	<!------- featured categories ---------->
	<div class="categories">
		<div class="small-container">
			<h2 class="title">Top Catégories</h2>
			<div class="row">

			<?php
				foreach ($listeCategories as $itemCategorie ) {
					# code...
					echo('
						<div class="col-3">
							<a href="products.php?categorie='.$itemCategorie["categorie"].'"><img src="uploaded_img/'.$itemCategorie["image1"].'" alt=""></a>
							<h3>'.$itemCategorie["categorie"].'</h3>
						</div>
					');
				}
			
			?>

			</div>
		</div>
		
	</div>

		<!------- featured products ---------->

	<div class="small-container">
		
		<h2 class="title">Annonces à la une</h2>
		
		<div class="row">
			<?php
				foreach ($bestAnnonces as $bestAnnonce ) {
					# code...
					echo('
						<div class="col-4">
							<a href="annonce-details.php?id='.$bestAnnonce['id'].'"><img src="uploaded_img/'.$bestAnnonce['image1'].'" alt=""></a>
							<a href="annonce-details.php?id='.$bestAnnonce['id'].'"><h4>'.$bestAnnonce['name'].'</h4></a>
							<div class="rating">
								<i class="fa fa-star" ></i>
								<i class="fa fa-star" ></i>
								<i class="fa fa-star" ></i>
								<i class="fa fa-star" ></i>
								<i class="fa fa-star" ></i>
							</div>
							<p>$ '.number_format( $bestAnnonce['price'], 2).'</p>
							<p>Publiée le '. date( "m/d/Y", strtotime($bestAnnonce['datepublication'])) .'</p>
						</div>

					');

				}
			
			?>
			
			
			
		</div>


		<h2 class="title">Annonces récents</h2>
		
		
		<div class="row">
			
			<?php
				foreach ($newAnnonces as $newAnnonce ) {
					# code...
					echo('
						<div class="col-4">
							<a href="annonce-details.php?id='.$newAnnonce['id'].'"><img src="uploaded_img/'.$newAnnonce['image1'].'" alt=""></a>
							<a href="annonce-details.php?id='.$newAnnonce['id'].'"><h4>'.$newAnnonce['name'].'</h4></a>
							
							<p>$ '.number_format( $newAnnonce['price'], 2).'</p>
							<p>Publiée le '. date( "m/d/Y", strtotime($newAnnonce['datepublication'])) .'</p>

						</div>

					');

				}
			?>
			
			
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
					$stmtAvis = $conn->prepare('SELECT * FROM avis ORDER BY rating DESC LIMIT 0,3'); 
					if ($stmtAvis) {
						# code...
						$stmtAvis->execute(); 
						$rows = $stmtAvis->rowCount();
						$data = $stmtAvis->fetchAll();

						foreach ($data as $col) {
							# code...
							$stmtImage = $conn->prepare('SELECT name,image FROM users WHERE id = ?'); 
							$stmtImage->bindParam(1, $col['user'], PDO::PARAM_INT);
							$stmtImage->execute();
							$dataUser = $stmtImage->fetch();

							echo('
							<div class="col-3">
								<i class="fa fa-quote-left" ></i>

								<p>'.$col['description'].'</p>	<!-- avis.description -->
								<div class="rating">
								
							');//<!--echo end-->
								$avis = $col['rating'];
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
								<img src="uploaded_img/'.$dataUser['image'].'" alt=""> <!-- user.image -->
								<h3>'.$dataUser['name'].'</h3> <!-- user.name -->
							</div>
							');

						}
					}
				?>
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