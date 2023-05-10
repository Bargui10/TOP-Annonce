
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<title>Top Annonces - Annonces</title>
</head>
<body>
		
	<!--navbar-->
	<?php
		require("./bases/navbar.php");
		require("connect.php");

		// Get the total number of records from our table "students".
		$total_pages = $conn->query('SELECT * FROM annonce')->rowCount();
		//echo("Row Count = $total_pages");
		// Check if the page number is specified and check if it's a number, if not return the default page number which is 1.
		$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

		// Number of results to show on each page.
		$num_results_on_page = 6;

		// Check TRI Type 
		  
        if(!empty($_GET['tri_submit'])){  
			if(!empty($_GET['tri_choix'])) {  
				$selected = $_GET['tri_choix'];  
				echo 'You have chosen: ' . $selected;  
				$stmt = $conn->prepare('SELECT * FROM annonce ORDER BY ? LIMIT ?,?'); 
				$stmt->bindParam(1, $selected);

				$getted = "YES";
				

			} else {  
				echo 'Please select the value. Going default..'; 
				$stmt = $conn->prepare('SELECT * FROM annonce ORDER BY name LIMIT ?,?'); 
				$getted = "NO";
			}  

			
        } else{
			$stmt = $conn->prepare('SELECT * FROM annonce ORDER BY name LIMIT ?,?'); 
			$getted = "NO NO";
		}

		echo " GET = " .$getted;

		

		if ($stmt) {
		// Calculate the page to get the results we need from our table.
		$calc_page = ($page - 1) * $num_results_on_page;
		if ($getted=="YES") {
			# code...
			$stmt->bindParam(2, $calc_page, PDO::PARAM_INT);
			$stmt->bindParam(3, $num_results_on_page,PDO::PARAM_INT);
		}else {
			# code...
			$stmt->bindParam(1, $calc_page, PDO::PARAM_INT);
			$stmt->bindParam(2, $num_results_on_page,PDO::PARAM_INT);
		}
		

		// Execute & Get the results...
		$stmt->execute(); 
		//echo("<br> Result = $result");
		
	?>

	<div class="small-container">	
        
        <div class="row row-2">
            <h2>Annonces</h2>
			<form action="" method="get">
				<select name="tri_choix" id="">
					<option value="name">Tri par défaut</option>
					<option value="price ASC">Trier par prix ascendant</option>
					<option value="price DESC">Trier par prix descendant</option>
					<option value="popularite DESC">Trier par popularité</option>
				</select>
				<input style="width:20%;" type = "submit" name = "tri_submit" value = "OK">  
			</form>
            
        </div>

			<!--
			<table>table here
				<?php //$row = $stmt->fetch(PDO::FETCH_ASSOC); while($row): ?>
					<tr>
						<td>Name: <?php //echo $row['name']; ?></td>
						<td>Price: <?php //echo $row['price']; ?></td>
						<td>Details: <?php// echo $row['details']; ?></td>
					</tr>
				<?php //$row = $stmt->fetch(PDO::FETCH_ASSOC); endwhile; ?>
			 </table>
				-->

				<!--
					while row:
						if 

				-->


				<?php
						
						/*
						// test
						$col = 0;
						$rows = 10;
						for ($i=0; $i < $rows; $i++) { 
							# code...
							
							if ($col % 4 == 0) {
								# code...
								echo("<br> LINE <br>");
							}
							$col +=1;
							echo("COL  ");
							if ($col % 4 == 0 or $col == $rows) {
								# code...
								echo("<br> END LINE <br>");
							}

						}*/
						
						$col = 0;
						$rows = $stmt->rowCount();
						$data = $stmt->fetchAll();
						
						echo("<br> Annonces dans cette page: $rows sur $total_pages<br> <br>");


						for ($i=0; $i < $rows+1; $i++) { 
							
							if ($col % 4 == 0) {
								echo('<div class="row">');
								
							}

							if ($i ==0 ) {
								$one = current($data);
							}else {
								$one =  next($data);
							}

							$col +=1;
							
							//echo(" $one['name']  $one['price'] || ");
							if ($one) {
								//echo(" $one[1] - $one[2] | ");

								?>
								
								<div class="col-4">
									<img src="images/product-1.jpg" alt="">
									<h4><a href="annonce-details.php?id=<?php echo $one[0]; ?>"><?php echo $one[1]; ?></a></h4>
									<div class="rating">
										<i class="fa fa-star" ></i>
										<i class="fa fa-star" ></i>
										<i class="fa fa-star" ></i>
										<i class="fa fa-star-half-o" ></i>
										<i class="fa fa-star-o" ></i>
									</div>
									<p><?php echo "$ " .number_format( $one[2], 2) ; //price?></p>
								</div>

							<?php
							}
							
							if ($col % 4 == 0 or $col == ($rows)) {
								echo("</div>");
							}

						}
						
				?>


			<?php  /*
				$itemsPerLine = 0;
				while($row = $stmt->fetch(PDO::FETCH_ASSOC)): 
					if($itemsPerLine %4 == 0):
					?>

					<div class="row">
					<?php endif; ?>


					<div class="col-4">
						<img src="images/product-1.jpg" alt="">
						<h4><?php echo $row['name']; ?></h4>
						<div class="rating">
							<i class="fa fa-star" ></i>
							<i class="fa fa-star" ></i>
							<i class="fa fa-star" ></i>
							<i class="fa fa-star-half-o" ></i>
							<i class="fa fa-star-o" ></i>
						</div>
						<p><?php echo $row['price']; ?></p>
					</div>
					
					<?php
					if($itemsPerLine % 4 == 0):

					?>

						</div>
					<?php 	//$itemsPerLine = 1;
							endif;
						$itemsPerLine += 1;?>
					
			<?php endwhile; 
			
			*/?>


			<!--		PAGINATION		-->

			<?php if (ceil($total_pages / $num_results_on_page) > 0): ?>
			<div class="page-btn">
				<?php if ($page > 1): ?>
				<span class="prev"><a href="products.php?page=<?php echo $page-1 ?>">Prev</a></span>
				<?php endif; ?>

				<?php if ($page > 3): ?>
				<span class="start"><a href="products.php?page=1">1</a></span>
				<span class="dots">...</span>
				<?php endif; ?>

				<?php if ($page-2 > 0): ?><span class="page"><a href="products.php?page=<?php echo $page-2 ?>"><?php echo $page-2 ?></a></span><?php endif; ?>
				<?php if ($page-1 > 0): ?><span class="page"><a href="products.php?page=<?php echo $page-1 ?>"><?php echo $page-1 ?></a></span><?php endif; ?>

				<span class="currentpage"><a href="products.php?page=<?php echo $page ?>"><?php echo $page ?></a></span>

				<?php if ($page+1 < ceil($total_pages / $num_results_on_page)+1): ?><span class="page"><a href="products.php?page=<?php echo $page+1 ?>"><?php echo $page+1 ?></a></span><?php endif; ?>
				<?php if ($page+2 < ceil($total_pages / $num_results_on_page)+1): ?><span class="page"><a href="products.php?page=<?php echo $page+2 ?>"><?php echo $page+2 ?></a></span><?php endif; ?>

				<?php if ($page < ceil($total_pages / $num_results_on_page)-2): ?>
				<span class="dots">...</span>
				<span class="end"><a href="products.php?page=<?php echo ceil($total_pages / $num_results_on_page) ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a></span>
				<?php endif; ?>

				<?php if ($page < ceil($total_pages / $num_results_on_page)): ?>
				<span class="next"><a href="products.php?page=<?php echo $page+1 ?>"> Next </a></span>
				<?php endif; ?>
			</div>
			<?php endif; ?>
        
			<?php
				//$stmt->close();
				}
			?>
			<br>




		<!--
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
		-->
		
		<!--
				<div class="page-btn">
            <span>1</span>
            <span>2</span>
            <span>3</span>
            <span>4</span>
            <span>&#8594;</span>

        </div>
		-->
        
	</div>

	<!--		footer		-->
	<?php
		require("./bases/footer.php")
	?>

</body>
</html>