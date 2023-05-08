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


    <!--        Annonces      -->
    <div class="small-container cart-page admin-page">
        <h2>Administrateur</h2>
        <hr>
        <h3>ANNONCES</h3>
        <a href="publish.html" class="btn">Ajouter Une Annonce</a>

        <table>
            <tr>
                <th>Annonce</th>
                <th>Prix</th>
                <th>Ville</th>
                <th>Signalé</th>
                <th>Actions</th>

            </tr>
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="images/buy-1.jpg" alt="">
                        <div>
                            <p>Red Printed T-shirt</p>
                            <small>Regina Phalange</small>
                            <br>
                            
                        </div>
                    </div>
                </td>
                <td><p>$50.00</p></td>
                <td><p>Tunis</p></td>
                <td><p>3 Fois</p></td>

                <td><a href=""> <b>Supprimer</b> </a> <br> <a href=""> <b>Contacter Vendeur</b> </a></td>

            </tr>
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="images/buy-2.jpg" alt="">
                        <div>
                            <p>Black Sneakers</p>
                            <small>Ken Adams</small>
                            <br>
                            
                        </div>
                    </div>
                </td>
                <td><p>$50.00</p></td>
                <td><p>Tunis</p></td>
                <td><p>3 Fois</p></td>

                <td><a href=""> <b>Supprimer</b> </a> <br> <a href=""> <b>Contacter Vendeur</b> </a></td>

            </tr>
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="images/buy-3.jpg" alt="">
                        <div>
                            <p>Black Trousers</p>
                            <small>Ross Dino</small>
                            <br>
                            
                        </div>
                    </div>
                </td>
                <td><p>$50.00</p></td>
                <td><p>Tunis</p></td>
                <td><p>3 Fois</p></td>

                <td><a href=""> <b>Supprimer</b> </a> <br> <a href=""> <b>Contacter Vendeur</b> </a></td>

            </tr>
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="images/buy-1.jpg" alt="">
                        <div>
                            <p>Red Printed T-shirt</p>
                            <small>Chanchan Man</small>
                            <br>
                            
                        </div>
                    </div>
                </td>
                <td><p>$50.00</p></td>
                <td><p>Tunis</p></td>
                <td><p>3 Fois</p></td>

                <td><a href=""> <b>Supprimer</b> </a> <br> <a href=""> <b>Contacter Vendeur</b> </a></td>

            </tr>

        </table>

        <div class="page-btn">
            <span>1</span>
            <span>2</span>
            <span>3</span>
            <span>4</span>
            <span>&#8594;</span>

        </div>
        <hr>
        <h3>UTILISATEURS</h3>
        <a href="account.html" class="btn">Ajouter Un Utilisateur</a>

        <table>
            <tr>
                <th>Utilisateur</th>
                <th>Popularité</th>
                <th>Ville</th>
                <th>Signalé</th>
                <th>Actions</th>

            </tr>
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="images/Gicon-2.png" alt="">
                        <div>
                            <p>Ken Adams</p>
                            <small>ken@adams.com</small>
                            <br>
                            
                        </div>
                    </div>
                </td>
                <td><p>1</p></td>
                <td><p>Ben Arous</p></td>
                <td><p>3 Fois</p></td>

                <td><a href=""> <b>Supprimer</b> </a> <br> <a href=""> <b>Contacter Vendeur</b> </a></td>

            </tr>
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="images/Gicon-3.png" alt="">
                        <div>
                            <p>Regina Phalange</p>
                            <small>regina@phalange.com</small>
                            <br>
                            
                        </div>
                    </div>
                </td>
                <td><p>2</p></td>
                <td><p>Nabeul</p></td>
                <td><p>0 Fois</p></td>

                <td><a href=""> <b>Supprimer</b> </a> <br> <a href=""> <b>Contacter Vendeur</b> </a></td>

            </tr>
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="images/Gicon-4.png" alt="">
                        <div>
                            <p>Rachel Green</p>
                            <small>rach@gr.com</small>
                            <br>
                            
                        </div>
                    </div>
                </td>
                <td><p>4</p></td>
                <td><p>Bizerte</p></td>
                <td><p>2 Fois</p></td>

                <td><a href=""> <b>Supprimer</b> </a> <br> <a href=""> <b>Contacter Vendeur</b> </a></td>

            </tr>
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="images/Gicon-5.png" alt="">
                        <div>
                            <p>Chanchan Man</p>
                            <small>chan@dler.com</small>
                            <br>
                            
                        </div>
                    </div>
                </td>
                <td><p>3</p></td>
                <td><p>Tunis</p></td>
                <td><p>0 Fois</p></td>

                <td><a href=""> <b>Supprimer</b> </a> <br> <a href=""> <b>Contacter Vendeur</b> </a></td>

            </tr>
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="images/Gicon-2.png" alt="">
                        <div>
                            <p>Ross Dino</p>
                            <small>ross@geller.com</small>
                            <br>
                            
                        </div>
                    </div>
                </td>
                <td><p>5</p></td>
                <td><p>Tunis</p></td>
                <td><p>3 Fois</p></td>

                <td><a href=""> <b>Supprimer</b> </a> <br> <a href=""> <b>Contacter Vendeur</b> </a></td>

            </tr>
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="images/Gicon-1.png" alt="">
                        <div>
                            <p>Monica</p>
                            <small>big@mon.com</small>
                            <br>
                            
                        </div>
                    </div>
                </td>
                <td><p>6</p></td>
                <td><p>Tunis</p></td>
                <td><p>1 Fois</p></td>

                <td><a href=""> <b>Supprimer</b> </a> <br> <a href=""> <b>Contacter Vendeur</b> </a></td>

            </tr>


        </table>
        
        
        <div class="total-price">

            <table>
                <tr>
                    <td>Nombre d'annonces</td>
                    <td>214</td>

                </tr>
                <tr>
                    <td>Nombre de vendeurs</td>
                    <td>175</td>
                    
                </tr>
                <tr>
                    <td>Nombre de visites</td>
                    <td>52 041</td>
                    
                </tr>
            </table>
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
		require("./bases/footer.php")
	?>



</body>
</html>