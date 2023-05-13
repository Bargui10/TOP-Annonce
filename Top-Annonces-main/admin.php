<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<title>ADMIN</title>
</head>
<body>

   
    <?php
		require("./bases/navbar.php");
		require("connect.php");
	
        if (!isset($_SESSION['admin_id'])) {
            # code...
            echo("You are not connected.. redirecting in 5 seconds..");
            sleep(5);
            header("location:login_admin.php");

        }
        // common
        $num_results_on_page = 5;

        // annonces
        $total_annonces = $conn->query('SELECT COUNT(*) FROM annonce')->fetch()[0];
        echo("Annonces Count = $total_annonces");
        $page_annonces = isset($_GET['page_annonces']) && is_numeric($_GET['page_annonces']) ? $_GET['page_annonces'] : 1;
        $stmt_annonces = $conn->prepare('SELECT * FROM annonce ORDER BY name LIMIT ?,?'); 
        $calc_page = ($page_annonces - 1) * $num_results_on_page;
        $stmt_annonces->bindParam(1, $calc_page, PDO::PARAM_INT);
		$stmt_annonces->bindParam(2, $num_results_on_page,PDO::PARAM_INT);
		$stmt_annonces->execute(); 
        $annonces = $stmt_annonces->fetchAll();


        // utilisateurs
        $total_users = $conn->query('SELECT COUNT(*) FROM users where role="utilisateur"')->fetch()[0];
        echo("<br>Users Count = $total_users");
        $page_users = isset($_GET['page_users']) && is_numeric($_GET['page_users']) ? $_GET['page_users'] : 1;
        $stmt_users = $conn->prepare('SELECT * FROM users where role="utilisateur" ORDER BY name LIMIT ?,?'); 
        $calc_page_users = ($page_users - 1) * $num_results_on_page;
        $stmt_users->bindParam(1, $calc_page_users, PDO::PARAM_INT);
		$stmt_users->bindParam(2, $num_results_on_page,PDO::PARAM_INT);
		$stmt_users->execute(); 
        $users = $stmt_users->fetchAll();
        

        // vendeurs
        $total_vendeurs = $conn->query('SELECT COUNT(*) FROM users where role="vendeur"')->fetch()[0];
        echo("<br>Vendeurs Count = $total_vendeurs");
        $page_vendeurs = isset($_GET['page_vendeurs']) && is_numeric($_GET['page_vendeurs']) ? $_GET['page_vendeurs'] : 1;
        $stmt_vendeurs = $conn->prepare('SELECT * FROM users where role = "vendeur" ORDER BY name LIMIT ?,?'); 
        $calc_page_vendeurs = ($page_vendeurs - 1) * $num_results_on_page;
        $stmt_vendeurs->bindParam(1, $calc_page_vendeurs, PDO::PARAM_INT);
		$stmt_vendeurs->bindParam(2, $num_results_on_page,PDO::PARAM_INT);
		$stmt_vendeurs->execute(); 
        $vendeurs = $stmt_vendeurs->fetchAll();



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

            header('location:admin.php');

        }

        // delete user
        if (isset($_GET['deleteUser'])) {
            # code...
            
        }

        // delete vendeur
        if (isset($_GET['deleteVendeur'])) {
            # code...
            
        }
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

            <?php
                foreach ($annonces as $annonce) {
                    # code...
                    // get vendeur information
                    $stmtVendeur = $conn->prepare('SELECT * FROM users WHERE id =?');
                    $stmtVendeur->bindParam(1, $annonce['idvendeur'], PDO::PARAM_INT);
                    $stmtVendeur->execute();
                    $dataVendeur = $stmtVendeur->fetch();
                    echo "<br>ID Vendeur from annonce: " .$annonce['idvendeur']." - ID Vendeur: " .$dataVendeur['id']. " - Nom Vendeur " . $dataVendeur['name'];

                    echo('
                    <tr>
                        <td>
                            <div class="cart-info">
                                <img src="images/buy-1.jpg" alt="">  <!--    Change to user s picture    -->
                                <div>
                                    <p>'.$annonce['name'].'</p>
                                    <small>'.$dataVendeur['name'].'</small>
                                    <br>
                                    
                                </div>
                            </div>
                        </td>
                        <td><p>$'.number_format( $annonce['price'], 2).'</p></td>
                        <td><p>'.$annonce['ville'].'</p></td>
                        <td><p>'.$annonce['signals'].' Fois</p></td>

                        <td><a href="admin.php?deleteAnnonce='.$annonce["id"].'"> <b>Supprimer</b> </a> <br> <a href="mailto:'.$dataVendeur['email'].'"> <b>Contacter Vendeur</b> </a></td>

                    </tr>
                    ');
                }
            ?>
            



        </table>

        <!--    Pagination on annonces     -->

        <?php if (ceil($total_annonces / $num_results_on_page) > 0): ?>
			<div class="page-btn">
				<?php if ($page_annonces > 1): ?>
				<span class="prev"><a href="admin.php?page_annonces=<?php echo $page_annonces-1 ?>">Prev</a></span>
				<?php endif; ?>

				<?php if ($page_annonces > 3): ?>
				<span class="start"><a href="admin.php?page_annonces=1">1</a></span>
				<span class="dots">...</span>
				<?php endif; ?>

				<?php if ($page_annonces-2 > 0): ?><span class="page"><a href="admin.php?page_annonces=<?php echo $page_annonces-2 ?>"><?php echo $page_annonces-2 ?></a></span><?php endif; ?>
				<?php if ($page_annonces-1 > 0): ?><span class="page"><a href="admin.php?page_annonces=<?php echo $page_annonces-1 ?>"><?php echo $page_annonces-1 ?></a></span><?php endif; ?>

				<span class="currentpage"><a href="admin.php?page_annonces=<?php echo $page_annonces ?>"><?php echo $page_annonces ?></a></span>

				<?php if ($page_annonces+1 < ceil($total_annonces / $num_results_on_page)+1): ?><span class="page"><a href="admin.php?page_annonces=<?php echo $page_annonces+1 ?>"><?php echo $page_annonces+1 ?></a></span><?php endif; ?>
				<?php if ($page_annonces+2 < ceil($total_annonces / $num_results_on_page)+1): ?><span class="page"><a href="admin.php?page_annonces=<?php echo $page_annonces+2 ?>"><?php echo $page_annonces+2 ?></a></span><?php endif; ?>

				<?php if ($page_annonces < ceil($total_annonces / $num_results_on_page)-2): ?>
				<span class="dots">...</span>
				<span class="end"><a href="admin.php?page_annonces=<?php echo ceil($total_annonces / $num_results_on_page) ?>"><?php echo ceil($total_annonces / $num_results_on_page) ?></a></span>
				<?php endif; ?>

				<?php if ($page_annonces < ceil($total_annonces / $num_results_on_page)): ?>
				<span class="next"><a href="admin.php?page_annonces=<?php echo $page_annonces+1 ?>"> Next </a></span>
				<?php endif; ?>
			</div>
			<?php endif; ?>

    
        <hr>

        <!--    UTILISATEURS    -->
        <h3>UTILISATEURS</h3>
        <a href="account.html" class="btn">Ajouter Un Utilisateur</a>

        <table>
            <tr>
                <th>Utilisateur</th>
                <th>telephone</th>
                <th>Nom - Prénom</th>
                <th>C.I.N</th>
                <th>Actions</th>

            </tr>

            <?php
                foreach ($users as $user) {
                    # code...
                    echo('
                    <tr>
                        <td>
                            <div class="cart-info">
                                <img src="images/Gicon-2.png" alt=""> <!--  change to user s image  -->
                                <div>
                                    <p>'.$user["name"].'</p>    <!--  name     -->
                                    <small>'.$user["email"].'</small>   <!--  email     -->
                                    <br>
                                    
                                </div>
                            </div>
                        </td>
                        <td><p>'.$user["telephone"].'</p></td>       <!--  telephone     -->
                        <td><p>'.$user["nom"].' - '.$user["prenom"].'</p></td>    <!--  nom - prenom     -->
                        <td><p>'.$user["cin"].'</p></td>     <!--  cin     -->

                        <td><a href="admin.php?deleteUser='.$user["id"].'"> <b>Bloquer</b> </a> <br> <a href="mailto:'.$user["email"].'"> <b>Contacter Utilisateur</b> </a></td>

                    </tr>
                    
                    ');
                }
            
            ?>
            
        </table>

        
        <!--    Pagination on users     -->

        <?php if (ceil($total_users / $num_results_on_page) > 0): ?>
			<div class="page-btn">
				<?php if ($page_users > 1): ?>
				<span class="prev"><a href="admin.php?page_users=<?php echo $page_users-1 ?>">Prev</a></span>
				<?php endif; ?>

				<?php if ($page_users > 3): ?>
				<span class="start"><a href="admin.php?page_users=1">1</a></span>
				<span class="dots">...</span>
				<?php endif; ?>

				<?php if ($page_users-2 > 0): ?><span class="page"><a href="admin.php?page_users=<?php echo $page_users-2 ?>"><?php echo $page_users-2 ?></a></span><?php endif; ?>
				<?php if ($page_users-1 > 0): ?><span class="page"><a href="admin.php?page_users=<?php echo $page_users-1 ?>"><?php echo $page_users-1 ?></a></span><?php endif; ?>

				<span class="currentpage"><a href="admin.php?page_users=<?php echo $page_users ?>"><?php echo $page_users ?></a></span>

				<?php if ($page_users+1 < ceil($total_users / $num_results_on_page)+1): ?><span class="page"><a href="admin.php?page_users=<?php echo $page_users+1 ?>"><?php echo $page_users+1 ?></a></span><?php endif; ?>
				<?php if ($page_users+2 < ceil($total_users / $num_results_on_page)+1): ?><span class="page"><a href="admin.php?page_users=<?php echo $page_users+2 ?>"><?php echo $page_users+2 ?></a></span><?php endif; ?>

				<?php if ($page_users < ceil($total_users / $num_results_on_page)-2): ?>
				<span class="dots">...</span>
				<span class="end"><a href="admin.php?page_users=<?php echo ceil($total_users / $num_results_on_page) ?>"><?php echo ceil($total_users / $num_results_on_page) ?></a></span>
				<?php endif; ?>

				<?php if ($page_users < ceil($total_users / $num_results_on_page)): ?>
				<span class="next"><a href="admin.php?page_users=<?php echo $page_users+1 ?>"> Next </a></span>
				<?php endif; ?>
			</div>
			<?php endif; ?>

    
        <hr>

        
        <!--    VENDEURS    -->
        <h3>VENDEURS</h3>
        <a href="account.html" class="btn">Ajouter Un Vendeur</a>

        <table>
            <tr>
                <th>Vendeur</th>
                <th>telephone</th>
                <th>Nom - Prénom</th>
                <th>C.I.N</th>
                <th>Actions</th>

            </tr>

            <?php
                foreach ($vendeurs as $vendeur) {
                    # code...
                    echo('
                    <tr>
                        <td>
                            <div class="cart-info">
                                <img src="images/Gicon-2.png" alt=""> <!--  change to vendeur s image  -->
                                <div>
                                    <p>'.$vendeur["name"].'</p>    <!--  name     -->
                                    <small>'.$vendeur["email"].'</small> <!--  email     -->
                                    <br>
                                    
                                </div>
                            </div>
                        </td>
                        <td><p>'.$vendeur["telephone"].'</p></td>       <!--  telephone     -->
                        <td><p>'.$vendeur["nom"].' - '.$vendeur["prenom"].'</p></td>    <!--  nom - prenom     -->
                        <td><p>'.$vendeur["cin"].'</p></td>     <!--  cin     -->

                        <td><a href="admin.php?deleteVendeur='.$vendeur["id"].'"> <b>Bloquer</b> </a> <br> <a href="mailto:'.$vendeur["email"].'"> <b>Contacter Vendeur</b> </a></td>

                    </tr>
                    
                    ');
                }
            
            ?>
            
        </table>

        
        <!--    Pagination on vendeurs     -->

        <?php if (ceil($total_vendeurs / $num_results_on_page) > 0): ?>
			<div class="page-btn">
				<?php if ($page_vendeurs > 1): ?>
				<span class="prev"><a href="admin.php?page_vendeurs=<?php echo $page_vendeurs-1 ?>">Prev</a></span>
				<?php endif; ?>

				<?php if ($page_vendeurs > 3): ?>
				<span class="start"><a href="admin.php?page_vendeurs=1">1</a></span>
				<span class="dots">...</span>
				<?php endif; ?>

				<?php if ($page_vendeurs-2 > 0): ?><span class="page"><a href="admin.php?page_vendeurs=<?php echo $page_vendeurs-2 ?>"><?php echo $page_vendeurs-2 ?></a></span><?php endif; ?>
				<?php if ($page_vendeurs-1 > 0): ?><span class="page"><a href="admin.php?page_vendeurs=<?php echo $page_vendeurs-1 ?>"><?php echo $page_vendeurs-1 ?></a></span><?php endif; ?>

				<span class="currentpage"><a href="admin.php?page_vendeurs=<?php echo $page_vendeurs ?>"><?php echo $page_vendeurs ?></a></span>

				<?php if ($page_vendeurs+1 < ceil($total_vendeurs / $num_results_on_page)+1): ?><span class="page"><a href="admin.php?page_vendeurs=<?php echo $page_vendeurs+1 ?>"><?php echo $page_vendeurs+1 ?></a></span><?php endif; ?>
				<?php if ($page_vendeurs+2 < ceil($total_vendeurs / $num_results_on_page)+1): ?><span class="page"><a href="admin.php?page_vendeurs=<?php echo $page_vendeurs+2 ?>"><?php echo $page_vendeurs+2 ?></a></span><?php endif; ?>

				<?php if ($page_vendeurs < ceil($total_vendeurs / $num_results_on_page)-2): ?>
				<span class="dots">...</span>
				<span class="end"><a href="admin.php?page_vendeurs=<?php echo ceil($total_vendeurs / $num_results_on_page) ?>"><?php echo ceil($total_vendeurs / $num_results_on_page) ?></a></span>
				<?php endif; ?>

				<?php if ($page_vendeurs < ceil($total_vendeurs / $num_results_on_page)): ?>
				<span class="next"><a href="admin.php?page_vendeurs=<?php echo $page_vendeurs+1 ?>"> Next </a></span>
				<?php endif; ?>
			</div>
			<?php endif; ?>

    
        <hr>



        
        
        <div class="total-price">

            <table>
                <tr>
                    <td>Nombre d'annonces</td>
                    <td><?php echo $total_annonces;?></td>

                </tr>
                <tr>
                    <td>Nombre d'utilisateurs</td>
                    <td><?php echo $total_users;?></td>
                    
                </tr>
                <tr>
                    <td>Nombre de vendeurs</td>
                    <td><?php echo $total_vendeurs;?></td>
                    
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