<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<title>Top Annonces - Produits</title>
</head>
<body>
		
	<!--navbar-->
	<?php
		require("./bases/navbar.php");
		require("connect.php");

		// Get the total number of records from our table "students".
		$total_pages = $conn->query('SELECT * FROM produits')->num_rows;

		// Check if the page number is specified and check if it's a number, if not return the default page number which is 1.
		$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

		// Number of results to show on each page.
		$num_results_on_page = 5;

		if ($stmt = $conn->prepare('SELECT * FROM students ORDER BY name LIMIT ?,?')) {
		// Calculate the page to get the results we need from our table.
		$calc_page = ($page - 1) * $num_results_on_page;
		$stmt->bind_param('ii', $calc_page, $num_results_on_page);
		$stmt->execute(); 
		// Get the results...
		$result = $stmt->get_result();
		}
	?>

	<div class="small-container">	
        
        <div class="row row-2">
            <h2>Produits</h2>
            <select name="" id="">
                <option value="tri_defaut">Tri par défaut</option>
                <option value="tri_prix_asc">Trier par prix ascendant</option>
				<option value="tri_prix_desc">Trier par prix descendant</option>
                <option value="tri_popularite">Trier par popularité</option>
                <option value="tri_avis">Trier par avis</option>
            </select>
        </div>

        <?php while ($row = $result->fetch_assoc()): ?>
				<tr>
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['age']; ?></td>
					<td><?php echo $row['joined']; ?></td>
				</tr>
		<?php endwhile; ?>

		<div class="row">
			<div class="col-4">
				<img src="images/product-1.jpg" alt="">
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

        
		<div class="row">
			<div class="col-4">
				<img src="images/product-5.jpg" alt="">
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
				<img src="images/product-6.jpg" alt="">
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
				<img src="images/product-7.jpg" alt="">
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
				<img src="images/product-8.jpg" alt="">
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

        <div class="page-btn">
            <span>1</span>
            <span>2</span>
            <span>3</span>
            <span>4</span>
            <span>&#8594;</span>

        </div>
	</div>

	<!--		footer		-->
	<?php
		require("./bases/footer.php");
	?>

</body>
		
</html>
		