<div class="container">
	<div class="navbar">
		<div class="logo">
			<a href="index.html"><img src="images/logo.png" width="125px" alt="logo"> </a>
		</div>
		<nav>
			<ul>
				<li><a href="index.php">Accueil</a></li>
				<li><a href="products.php">Produits</a></li>
				<li><a href="info.php">Info</a></li>
				<li><a href="contact.php">Contact</a></li>
                <?php
                    session_start();
                    
	                if(isset($_SESSION['user_id'])){
		                $user_id = $_SESSION['user_id'];
                        echo("<li><a href='myads.php'>Mon Compte<img src='images/storefront.png' alt='' width='35px' height='35px'></a></li>");
						//logout
						echo('
							<li>
								<form action="" method="post">
									<button type="submit" name="logout">Logout</button>
								</form>
							</li>
						');

					}elseif(isset($_SESSION['admin_id'])){
						$admin_id = $_SESSION['admin_id'];
                        echo("<li><a href='admin.php'>Page Admin</a></li>");
						//logout
						echo('
							<li>
								<form action="" method="post">
									<button type="submit" name="logout">Logout</button>
								</form>
							</li>
						');

					}
					else{
		                $user_id = '';
                        echo("<li><a href='account.php'>Login</a></li>");

 	                };

					if (isset($_POST['logout'])) {
						# code...
						session_destroy();
						header("location:account.php");
					}
                ?>

			</ul>
		</nav>
	</div>

	
	

</div>
