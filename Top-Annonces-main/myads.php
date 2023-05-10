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

    
    <?php
		require("./bases/navbar.php");
		require("connect.php");
		
	?>


    <!--        Cart Items Details      -->
    <div class="small-container cart-page">

        <p>Bonjour</p>
        <h1>Ken Adams</h1>
        <h4>Email: ken@adams.com</h4>
        <h4>Ville: Tunis</h4>
        <br>
        <small>Date d'inscription: 11/12/2022</small>
        <hr><br>


        <?php
            echo("Session email: ".$_SESSION['email']."<br> Session user_id: " .$_SESSION['user_id']);
            require("addRating.php");
        ?>

        <h2>Mes Annonces</h2>
        <br>
        <a href="publish.html" class="btn">Ajouter Une Annonce</a>

        <table>
            <tr>
                <th>Annonce</th>
                <th>Prix</th>
                <th>Ville</th>

            </tr>
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="images/buy-1.jpg" alt="">
                        <div>
                            <p>Red Printed T-shirt</p>
                            <small>Prix: $50.00</small>
                            <br>
                            <a href="">Supprimer</a>
                        </div>
                    </div>
                </td>
                <td>$<input type="number" value="50.00"></td>
                <td><input type="text" value="Tunis"></td>

            </tr>
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="images/buy-2.jpg" alt="">
                        <div>
                            <p>Red Printed T-shirt</p>
                            <small>Prix: $60.00</small>
                            <br>
                            <a href="">Supprimer</a>
                        </div>
                    </div>
                </td>
                <td>$<input type="number" value="60.00"></td>
                <td><input type="text" value="Tunis"></td>

            </tr>
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="images/buy-3.jpg" alt="">
                        <div>
                            <p>Red Printed T-shirt</p>
                            <small>Prix: $85.00</small>
                            <br>
                            <a href="">Supprimer</a>
                        </div>
                    </div>
                </td>
                <td>$<input type="number" value="85.00"></td>
                <td><input type="text" value="Ben Arous"></td>

            </tr>
        </table>


    </div>

	<!--		footer		-->
	<?php
		require("./bases/footer.php")
	?>



</body>
</html>