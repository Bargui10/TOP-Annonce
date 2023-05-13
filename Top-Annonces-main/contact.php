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

</head>
<body>  
   <?php include "./bases/navbar.php"; ?>
   <?php

   include 'connect.php';


if(isset($_POST['send'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $message = $_POST['message'];
   $message = filter_var($message, FILTER_SANITIZE_STRING);

   $select_message = $conn->prepare("SELECT * FROM `messages` WHERE name = ? AND email = ? AND message = ?");
   $select_message->execute([$name, $email, $message]);

   if($select_message->rowCount() > 0){
      $message1[] = 'already sent message!';
   }else{

      $insert_message = $conn->prepare("INSERT INTO `messages`(user_id, name, email,  message) VALUES(?,?,?,?)");
      $insert_message->execute([$user_id, $name, $email, $message]);

      $message1[] = 'sent message successfully!';

   }

}
?>



    <div class="container">
			<div class="row">
            <div class="form-container">
            <form action="" method="post">
					<h3>Nous Contacter</h3>
				
					<label class="form-group">
                  
						<input type="text" class="form-control" name="name" placeholder="Nom" required>
						
						<span class="border"></span>
					</label>
					<label class="form-group">

						<input type="text"  name="email"class="form-control" placeholder="Email"  required>
						<span class="border"></span>
					</label>
					<label class="form-group" >

						<input name="message" id="" class="form-control" placeholder="Message" required>
						<span class="border"></span>
					</label>
               <div class="form-btn">
					<button class="btn" type="submit" name="send">Envoyer </button>

               </div>
						

 			</form>
            </div><br>
				
			</div><br>
	</div>
    <br>
   <?php
      require("./bases/footer.php");
   ?>
</body>
</html>