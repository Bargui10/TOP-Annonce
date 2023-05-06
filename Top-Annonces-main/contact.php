<?php

include 'connect.php';
session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['send'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $msg = $_POST['msg'];
   $msg = filter_var($msg, FILTER_SANITIZE_STRING);

   $select_message = $conn->prepare("SELECT * FROM `messages` WHERE name = ? AND email = ? AND number = ? AND message = ?");
   $select_message->execute([$name, $email, $number, $msg]);

   if($select_message->rowCount() > 0){
      $message[] = 'already sent message!';
   }else{

      $insert_message = $conn->prepare("INSERT INTO `messages`(user_id, name, email, number, message) VALUES(?,?,?,?,?)");
      $insert_message->execute([$user_id, $name, $email, $number, $msg]);

      $message[] = 'sent message successfully!';

   }

}


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

   <title>contact</title>
 
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style1.css">

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
                    <li><a href="index.php">Contact</a></li>
                    <li><a href="account.html">Mon Compte</a></li>
                </ul>
            </nav>
            <a href=""  ><img src="images/storefront.png" alt="" width="35px" height="35px"></a>
        </div>

    </div>


<section class="contact">

    <form action="" method="post">
        <h3>Contact US</h3>
        <input type="text" name="name" placeholder="enter your name" required maxlength="20" class="box">
        <input type="email" name="email" placeholder="enter your email" required maxlength="50" class="box">
        <input type="number" name="number" min="0" max="9999999999" placeholder="enter your number" required onkeypress="if(this.value.length == 10) return false;" class="box">
        <textarea name="msg" class="box" placeholder="enter your message" cols="30" rows="10"></textarea>
        <input type="submit" value="send message" name="send" class="btn">
    </form>

</section>
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