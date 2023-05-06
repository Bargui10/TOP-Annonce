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
 	                }else{
		                $user_id = '';
                        echo("<li><a href='account.php'>Login</a></li>");
 	                };
                ?>

			</ul>
		</nav>
	</div>

</div>
