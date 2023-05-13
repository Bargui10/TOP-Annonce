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

        if (isset($_SESSION['user_id'])) {
            # code...
            $stmtUser = $conn->prepare('SELECT * FROM users where id = ?'); 
            $stmtUser->bindParam(1, $_SESSION['user_id'], PDO::PARAM_INT);
    
            $stmtUser->execute(); 
            $user = $stmtUser->fetch();


            if ($user['role'] == "vendeur") {
                # code...
                $stmtAnnonces = $conn->prepare('SELECT * FROM annonce where idvendeur = ? ORDER BY price ASC'); 
                $stmtAnnonces->bindParam(1, $_SESSION['user_id'], PDO::PARAM_INT);

                $stmtAnnonces->execute(); 
                $rows = $stmtAnnonces->rowCount();
                $annonces = $stmtAnnonces->fetchAll();

                // devenir vip
                if (isset($_GET['vip']) and  $_GET['vip'] == "yes") {
                    # code...
                    $stmtUpdate = $conn->prepare('UPDATE user set vip = 1 where id = ?'); 
                    $stmtUpdate->bindParam(1, $_SESSION['user_id'], PDO::PARAM_INT);
            
                    $stmtUpdate->execute(); 

                }


                        // delete annonce
                if (isset($_GET['deleteAnnonce'])) {
                    # code...
                    $delete_annonce_id = $_GET['deleteAnnonce'];
                    $delete_annonce_image = $conn->prepare("SELECT * FROM `annonce` WHERE id = ?");
                    $delete_annonce_image->execute([$delete_annonce_id]);
                    $fetch_delete_image = $delete_annonce_image->fetch(PDO::FETCH_ASSOC);

                    if ($fetch_delete_image['image1']) {
                        # code...
                        unlink('./uploaded_img/'.$fetch_delete_image['image1']);
                    }
                    if ($fetch_delete_image['image2']) {
                        # code...
                        unlink('./uploaded_img/'.$fetch_delete_image['image2']);
                    }
                    if ($fetch_delete_image['image3']) {
                        # code...
                        unlink('./uploaded_img/'.$fetch_delete_image['image3']);
                    }
                    if ($fetch_delete_image['image4']) {
                        # code...
                        unlink('./uploaded_img/'.$fetch_delete_image['image4']);
                    }
                    if ($fetch_delete_image['image5']) {
                        # code...
                        unlink('./uploaded_img/'.$fetch_delete_image['image5']);
                    }

                    $delete_annonce = $conn->prepare("DELETE FROM `annonce` WHERE id = ?");
                    $delete_annonce->execute([$delete_annonce_id]);

                    header('location:myads.php');

        }


        

            }
            

        }else {
            # code...
            echo("Vous n'etes pas connecté.. Redirection dans 5 secondes..");
            sleep(5);
            header("location:account.php");

        }
        
	?>


    <!--        Cart Items Details      -->
    <div class="small-container cart-page">

    <?php
        echo('
        <p>Bonjour</p>
        <h1>'.$user["name"].'</h1>
        <h4>Email: '.$user["email"].'</h4>
        <h4>Date Naissance: '.$user["datenaissance"].'</h4>
        <h4>Role: '.$user["role"].'</h4>
        <br>
        ');
    ?>
        
        <hr><br>


        <?php
            echo("Session user_id: " .$_SESSION['user_id']); 
        ?>

        <?php
            if ($user['role'] == "vendeur") {
                echo('
                    <h2>Mes Annonces</h2>
                    <br>
                    <a href="publish.php" class="btn">Ajouter Une Annonce</a>
                    <a href="myads.php?vip=yes" class="btn">Devenir VIP pour augmenter la visibilité</a>

                    
                    <table>
                        <tr>
                            <th>Annonce</th>
                            <th>Prix</th>
                            <th>Ville</th>
                            <th>Actions</th>

                        </tr>
                ');

                foreach ($annonces as $annonce) {
                    # code...
                
                    echo('
                    
                
                        <tr>
                            <td>
                                <div class="cart-info">
                                    <img src="images/'.$annonce['image1'].'" alt="">
                                    <div>
                                        <p>'.$annonce['name'].'</p>
                                        <small>Prix: $'.number_format( $annonce['price'], 2).'</small>
                                        <br>
                                    </div>
                                </div>
                            </td>
                            <td>$<input type="number" value="'.$annonce['price'].'"></td>
                            <td><input type="text" value="'.$annonce['ville'].'"></td>
                            <td><a href="myads.php?deleteAnnonce='.$annonce["id"].'"> <b>Supprimer</b> </a> </td>

                        </tr>');
                    }  //end table annonce
                    
                    echo('
                        </table>

                        <br> 
                    ');

            
            } // end role = vendeur
            else {
                # code...
                echo("Conected as normal user: " .$_SESSION['user_id']); 
                echo'<a href="updateaccount.php?becomeVendeur=yes" class="btn">Devenir Vendeur</a>';
                echo'<a href="updateaccount.php?becomeVendeur=no?role=utilisateur" class="btn">Modifier mes infos</a>';


            }
        ?>


            

        <?php
            require("addRating.php");
        ?>
        

    </div>

	<!--		footer		-->
	<?php
		require("./bases/footer.php")
	?>



</body>
</html>