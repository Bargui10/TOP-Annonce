<?php
include 'connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login_admin.php');
};

if(isset($_POST['add_product'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);

   $price = $_POST['price'];
   $price = filter_var($price, FILTER_SANITIZE_STRING);

   $details = $_POST['details'];
   $details = filter_var($details, FILTER_SANITIZE_STRING);

   $ville = $_POST['ville'];
   $ville = filter_var($ville, FILTER_SANITIZE_STRING);
   
   $delegation = $_POST['delegation'];
   $delegation = filter_var($delegation, FILTER_SANITIZE_STRING);

   $categorie = $_POST['categorie'];
   $categorie = filter_var($categorie, FILTER_SANITIZE_STRING);

   $sous_categorie = $_POST['sous_categorie'];
   $sous_categorie = filter_var($sous_categorie, FILTER_SANITIZE_STRING);


   //* add image
   /*
   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $image_size_01 = $_FILES['image']['size'];
   $image_tmp_name_01 = $_FILES['image']['tmp_name'];
   $image_folder_01 = 'uploaded_img/'.$image;
*/




    if(isset($_FILES['files'])){
        $errors= array();

        $images_list = array();

        foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
            $file_name = $key.$_FILES['files']['name'][$key];
            $file_size =$_FILES['files']['size'][$key];
            $file_tmp =$_FILES['files']['tmp_name'][$key];
            
            
            if($file_size > 2097152){
                $errors[]='File size must be less than 2 MB';
            }

            $desired_dir="uploaded_img";
            if(empty($errors)==true){
                if(is_dir($desired_dir)==false){
                    mkdir("$desired_dir", 0700);// Create directory if it does not exist
                }
                if(is_dir("$desired_dir/".$file_name)==false){
                    move_uploaded_file($file_tmp,"uploaded_img/".$file_name);
                }else{                                  //rename the file if another one exist
                    $new_dir="uploaded_img/".$file_name.time();
                    rename($file_tmp,$new_dir) ;               
                }
                
                array_push($images_list, $file_name);

            }else{
                    print_r($errors);
            }
        }
        if(empty($errors)  and count($images_list) == 5 ){
            echo "Images Success. Adding annonce";

            try{     

                // check if annonce name exists                
                $select_annonce = $conn->prepare("SELECT * FROM `annonce` WHERE name = ?");
                $select_annonce->execute([$name]);

                if($select_annonce->rowCount() > 0){
                    $message[] = 'annonce name already exist!';
                }else{
                    // insert annonce
                    $query = "INSERT into annonce(idvendeur, name, price, details, ville, delegation, categorie, sous_categorie, image1, image2, image3, image4, image5)
                            VALUES(:idvendeur, :name, :price, :details, :ville, :delegation, :categorie, :sous_categorie, :image1, :image2, :image3, :image4, :image5)";

                    $insert = $conn->prepare($query);
                    $insert->execute(
                        array(
                        ':idvendeur' =>$_SESSION['user_id'],
                        ':name'=>$name,
                        ':price'=>$price,
                        ':details'=>$details,
                        ':ville'=>$ville,
                        ':delegation'=>$delegation,
                        ':categorie'=>$categorie,
                        ':sous_categorie'=>$sous_categorie,
                        ':image1'=>$images_list[0],
                        ':image2'=>$images_list[1],
                        ':image3'=>$images_list[2],
                        ':image4'=>$images_list[3],
                        ':image5'=>$images_list[4])
                    );
                
                }


            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
        else {
            # code...
            // there are errors somewhere
            echo "Des erreurs ont été rencontré";
            print_r($errors);
        }
    }



  
/*
   $select_annonce = $conn->prepare("SELECT * FROM `annonce` WHERE name = ?");
   $select_annonce->execute([$name]);

   if($select_annonce->rowCount() > 0){
      $message[] = 'annonce name already exist!';
   }else{

      $insert_annonce = $conn->prepare("INSERT INTO `annonce`(name, price , details, ville , delegation , categorie, sous_categorie, image) VALUES(?,?,?,?,?,?,?,?)");
      $insert_annonce->execute([$name, $price , $details , $ville , $delegation , $categorie , $sous_categorie , $image]);

      if($insert_annonce){
         if($image_size_01 > 2000000){
            $message[] = 'image size is too large!';
         }else{
            move_uploaded_file($image_tmp_name_01, $image_folder_01);
            $message[] = 'Annonce ajoutée avec succès!';
         } }
    }
*/
};
?>



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
		<div class="container">
			<div class="navbar">
				<div class="logo">
					<a href="index.html"><img src="images/logo.png" width="125px" alt="logo"> </a>
				</div>
				<nav>
					<ul>
						<li><a href="index.html">Accueil</a></li>
						<li><a href="products.html">Produits</a></li>
						<li><a href="">Info</a></li>
						<li><a href="">Contact</a></li>
						<li><a href="account.html">Mon Compte</a></li>
					</ul>
				</nav>
				<a href="myads.html"><img src="images/storefront.png" alt="" width="35px" height="35px"></a>
			</div>

		</div>


    <!--        Annonces      -->
    <div class="container publish-page">
        <h2>Publiez Une Nouvelle Annonce</h2>
        <hr>
                    <?php
                        if(isset($message)){
                        foreach($message as $message){
                            echo '
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span>'.$message.'</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            ';
                        }
                        }
            ?>


        <div class="row">
           
                <div class="form-container publish-container">
                    <div class="form-btn">
                        <span onclick="register()">Saisir les informations</span>
                        <hr id="Indicator">
                    </div>

                    
                    <form id="" method="post" enctype="multipart/form-data">
                        <div class="row">
                                <input type="text" placeholder="Titre" name ="name" required>
                            
                        </div>
                        <div class="row">
                                <input type="number" placeholder="Prix" name="price" required>

                                <input type="text" placeholder="details" name="details" required>

                        </div>

                        <select name="ville" required id="">
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

                        <select name="delegation" required id="">
                            <option value="delegation">Délégation</option>
                            <option value="autre">Autres Villes</option>
                        </select>
                        <select name="categorie" required id="">
                            <option value="">Catégorie</option>
                            <option value="vehicules">Véhicules</option>
                            <option value="maison et jardin">MAison et Jardin</option>
                            <option value="emploi et services">Emploi et Services</option>
                            <option value="immobilier">Immobilier</option>
                            <option value="habillement et bien etre">Habillement et Bien Etre</option>
                            <option value="informatique et multimédia">Informatique et Multimédia</option>
                            <option value="loisirs et divertissement">Loisirs et Divertissement</option>
                            <option value="autres">Autres</option>
                        </select>
                        <select name="sous_categorie" required id="">
                            <option value="sous-catégorie">Sous-catégorie</option>
                            <option value="autre">Autres</option>
                        </select>
                        <br>
                     
                        <hr class="hr-publish">
                        <div class="row">
                            <span>Choisir Photos</span>
                            <input type="file" name="files[]" multiple accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
                            
                        </div>
					
                        <button type="submit" name="add_product" class="btn">Publier Annonce</button>
                    </form>

                </div>
        </div>
        <br> <br>
        

    </div>

    <div class="small-container cart-page admin-page">
        <hr>
        <h3>Résumé</h3>
        <table>
            <tr>
                <th>Annonce</th>
                <th>Prix</th>
                <th>Ville</th>
                <th>Catégorie</th>

            </tr>
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="images/buy-1.jpg" alt="">
                        <div>
                            <p>Titre</p>
                            <small>Regina Phalange</small>
                            <br>
                            
                        </div>
                    </div>
                </td>
                <td><p>$00.00</p></td>
                <td><p>Ville</p></td>
                <td><p>Catégorie</p></td>


            </tr>
            
        </table>

        <hr>
        
        
        
    </div>

	<!--		footer		-->

	<div class="footer">
		<div class="container">
			<div class="row">
				<div class="footer-col-1">
					<h3>Télécharger L'App</h3>
					<p>Télécharger Notre Application pour Android et iOS.</p>
					<div class="app-logo">
						<img src="images/play-store.png" alt="">
						<img src="images/app-store.png" alt="">
					</div>
				</div>
				<div class="footer-col-2">
					<img src="images/logo-white.png" alt="">
					<p>Top Annonces a Pour But de Rendre les Petites Annonces Accessibles Pour Tous les Tunisien(ne)s.</p>
				</div>
				<div class="footer-col-3">
					<h3>Liens Utiles</h3>
					<ul>
						<li>Coupons</li>
						<li>Blog</li>
						<li>S.A.V</li>
						<li>Affiliale</li>
					</ul>
				</div>
				<div class="footer-col-4">
					<h3>Liens Utiles</h3>
					<ul>
						<li>Facebook</li>
						<li>Twitter</li>
						<li>Instagram</li>
						<li>Youtube</li>
					</ul>
				</div>
			</div>
			<hr>
			<p class="copyright">Copyright 2022 FBS & IB</p>

		</div>
	</div>



</body>
</html>