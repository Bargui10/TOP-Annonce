


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
    ?>

<?php
    include 'connect.php';

    if (!isset($_SESSION['admin_id']) and !isset($_SESSION['user_id'])  ) {
        # code...
        echo("you cant publish , redirecting in 5 seconds");
        sleep(5);
        header("location:account.php");
    }

    if(isset($_POST['update'])){

        /*
                            ':name'=>$name,
                            ':email'=>$email,
                            ':password'=>$password,
                            ':image'=>$images_list[0]
                            ':datenaissance'=>$datenaissance,
                            ':telephone'=>$telephone,
                            ':cin'=>$cin,
                            ':nom'=>$nom,
                            ':prenom'=>$prenom,
        */ 
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);

    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);

    $password = $_POST['password'];
    $password = sha1( filter_var($password, FILTER_SANITIZE_STRING));

    $datenaissance = $_POST['datenaissance'];
    $datenaissance =  filter_var($datenaissance, FILTER_SANITIZE_STRING);

    $telephone = $_POST['telephone'];
    $telephone = filter_var($telephone, FILTER_SANITIZE_STRING);

    $cin = $_POST['cin'];
    $cin = filter_var($cin, FILTER_SANITIZE_STRING);

    $nom = $_POST['nom'];
    $nom = filter_var($nom, FILTER_SANITIZE_STRING);

    $prenom = $_POST['prenom'];
    $prenom = filter_var($prenom, FILTER_SANITIZE_STRING);


    //* add image
   
    $image = $_FILES['file']['name'];
    $image = filter_var($image, FILTER_SANITIZE_STRING);
    $image_size_01 = $_FILES['file']['size'];
    $image_tmp_name_01 = $_FILES['file']['tmp_name'];
    $image_folder_01 = 'uploaded_img/'.$image;
    




        if(isset($_FILES['file'])){
            $errors= array();


           
            if(empty($errors)  ){

                try{     
                    if ( ($_GET['role']) == "utilisateur") {
                        # code...
                        $role = 'utilisateur';
                    }else {
                        # code...
                        $role = 'vendeur';

                    }

                        // update user
                        $query = "UPDATE users SET name=:name, email=:email, datenaissance=:datenaissance, password=:password, image=:image, role=:role,telephone= :telephone, cin= :cin,nom=:nom, prenom= :prenom WHERE id = :id ";

                        $insert = $conn->prepare($query);
                        $insert->execute(
                            array(
                            ':name'=>$name,
                            ':email'=>$email,
                            ':password'=>$password,
                            ':image'=>$image,
                            ':role'=> $role,
                            ':datenaissance'=>$datenaissance,
                            ':telephone'=>$telephone,
                            ':cin'=>$cin,
                            ':nom'=>$nom,
                            ':prenom'=>$prenom,
                            ':id' =>$_SESSION['user_id'],
                            )
                        );

                        echo"<br>Modified successfully";

                    }
                    catch(PDOException $e){
                        echo $e->getMessage();
                        echo"<br>Error in try block";
                     }


                
            }
            else {
                # code...
                // there are errors somewhere
                echo "Des erreurs ont été rencontré";
                print_r($errors);
            }
        }
    }
?>


    <!--        update      -->
    <div class="container publish-page">
        <h2>Mettre à jour vos informations</h2>
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
           
                <div class="form-container publish-container-new update-container-new">
                    <div class="form-btn">
                        <span onclick="register()">Saisir les informations</span>
                        <hr id="Indicator">
                    </div>

                    
                    <form id="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <input type="text" placeholder="name" name ="name" required>
                            
                        </div>
                        <div class="row">
                            <input type="email" placeholder="email" name ="email" required>
                            
                        </div>
                        <div class="row">
                            <input type="password" placeholder="password" name ="password" required>
                            
                        </div>
                        <div class="row">
                            <input type="date" name ="datenaissance" required>
                            
                        </div>
                        <div class="row">
                            <input type="number" placeholder="telephone" name ="telephone" required>
                            <input type="number" placeholder="cin" name ="cin" required>

                        </div>
                        
                        <div class="row">
                            <input type="text" placeholder="nom" name ="nom" required>
                            <input type="text" placeholder="prenom" name ="prenom" required>

                        </div>
                        
  
                      
                        <div class="row">
                            <span>Choisir Photo</span>
                            <input type="file" name="file"  accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
                            
                        </div>
					
                        <button type="submit" name="update" class="btn">Mettre à jour</button>
                    </form>

                </div>
        </div>
        <br> <br>
        

    </div>


	<!--		footer		-->

	<?php
        require("./bases/footer.php");
    ?>


</body>
</html>