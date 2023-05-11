<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/cssMes.css">

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

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $nom = $_POST['nom'];
   $nom = filter_var($nom, FILTER_SANITIZE_STRING);
   $prenom = $_POST['prenom'];
   $prenom = filter_var($prenom, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = sha1($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
   $select_user->execute([$email,]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   if($select_user->rowCount() > 0){
      $message[] = 'email already exists!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         $insert_user = $conn->prepare("INSERT INTO `users`(name,email, password,nom, prenom) VALUES(?,?,?,?,?)");
         $insert_user->execute([$name, $email, $cpass,$nom , $prenom]);
         $message[] = 'registered successfully, login now please!';
         
      }
   }
   
   }

 if(isset($_POST['submit1'])){

    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $pass = sha1($_POST['pass']);
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);
 
    $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
    $select_user->execute([$email, $pass]);
    $row = $select_user->fetch(PDO::FETCH_ASSOC);
 
    if($select_user->rowCount() > 0){
       $_SESSION['user_id'] = $row['id'];
       header('location:index.php');
    }else{
       $message[] = 'incorrect username or password!';      
    }
 
 }
?> 

<!--        Account Page        -->
    <div class="account-page">
        <div class="container">
        <?php
                        if(isset($message)){
                            foreach($message as $message){
                                echo '
                                <div class="message">
                                    <span>'.$message.'</span>
                                    <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
                                </div>
                                ';
                            }
                        }
                        ?>
            <div class="row">
                <div class="col-2">
                    <img src="images/image1.png" alt="" width="100%">
                </div>
                <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <span onclick="login()">Login</span>
                            <span onclick="register()">Register</span>
                            <hr id="Indicator">
                        </div>
                        <form id="LoginForm" action="" method="post">
                            <input type="email" name="email" required placeholder="enter your email" maxlength="50"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
                            <input type="password" name="pass" required placeholder="enter your password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
                            <input type="submit" value="login now" class="btn" name="submit1">
                        </form>
                        <form id="RegisterForm" action="" method="post">
                            <div class="row">
                                <input type="text" name="name" required placeholder="username" maxlength="20"  class="box">
                                <input type="text" name="nom" required placeholder="nom" maxlength="20"  class="box">
                                <input type="text" name="prenom" required placeholder="prenom" maxlength="20"  class="box">
                                <input type="email" name="email" required placeholder="E-mail" maxlength="50"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
                            </div>
                           
                                <input type="password" name="pass" required placeholder="Mot de passe" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
                                <input type="password" name="cpass" required placeholder="confirm mot de passe" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
                           
                            <input type="submit" value="register now" class="btn" name="submit">
                            </form>
                      
                    </div>
                </div>
            </div>
        </div>
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

<!--        JS For Toggle From      -->
    <script>
        var LoginForm = document.getElementById("LoginForm");
        var RegisterForm = document.getElementById("RegisterForm");
        var Indicator = document.getElementById("Indicator");

        function register(){
            RegisterForm.style.transform = "translateX(0px)";
            LoginForm.style.transform = "translateX(0px)";
            Indicator.style.transform="translateX(100px)";
        }
        function login(){
            RegisterForm.style.transform = "translateX(300px)";
            LoginForm.style.transform = "translateX(300px)";
            Indicator.style.transform="translateX(0px)";

        }

    </script>

</body>
</html>