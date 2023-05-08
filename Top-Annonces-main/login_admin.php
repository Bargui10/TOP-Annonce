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

                         <form action="login_html.php" method="post">
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