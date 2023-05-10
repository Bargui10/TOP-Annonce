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
    <?php

        if(isset($_POST['submit'])){

        $name = $_POST['name'];
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $pass = sha1($_POST['pass']);
        $pass = filter_var($pass, FILTER_SANITIZE_STRING);

        $select_admin = $conn->prepare("SELECT * FROM `admins` WHERE name = ? AND password = ?");
        $select_admin->execute([$name, $pass]);
        $row = $select_admin->fetch(PDO::FETCH_ASSOC);

        if($select_admin->rowCount() > 0){
            $_SESSION['admin_id'] = $row['id'];
            header('location:admin.php');
        }else{
            //header('location:login_admin.php');
            $message[] = 'incorrect username or password!';
        }

        }

    ?>


    <!--        Account Page        -->
    <div class="account-page">
        <div class="container">
            <div class="row">
                <div class="col-2">
                  <img src="images/image1.png" alt="" width="100%">   <!--bch nbadalha l image-->

                </div>
                <div class="col-2">
                    <div class="form-container">
                        <span > Admin Login</span>

                         <form action="" method="post">
                            <input type="text" name="name" required placeholder="enter your username" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
                            <input type="password" name="pass" required placeholder="enter your password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
                            <input type="submit" value="login now" class="btn" name="submit">
                         </form>
                        </form>                    
                    </div>
                </div>
            </div>
        </div>
    </div>



	<!--		footer		-->
	<?php
		require("./bases/footer.php")
	?>
</body>
</html>