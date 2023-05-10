
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" href="css/styles.css">

	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<title>Top Annonces - Compte User </title>
</head>
<body>
    <?php 
        require("./bases/navbar.php");
    ?>     

    <?php
        // Se connecter à la base de données
        include "connect.php";

        // Récupérer les valeurs soumises dans le formulaire
        if (isset($_POST['modifier'])) {
            # code...
            $nom = $_POST["Nom"];
            $email = $_POST["Email"];
            $ancien = $_POST["ancien"];
            $nouveau = $_POST["nouveau"];
        }


        // Vérifier que l'ancien mot de passe est correct
        $email_session = $_SESSION['email'];
        $sql = "SELECT * FROM users WHERE email='$email_session' AND password='$ancien'";
        $resultat = mysqli_query($conn, $sql);

        if (mysqli_num_rows($resultat) != 1) {
            echo "Erreur: le mot de passe actuel est incorrect.";
            exit();
        }

        // Construire la requête SQL pour mettre à jour les informations de l'utilisateur
        $sql = "UPDATE users SET nom='$nom', email='$email', password='$nouveau' WHERE email='$email_session'";

        // Exécuter la requête SQL
        if (mysqli_query($conn, $sql)) {
            echo "Les informations de l'utilisateur ont été mises à jour avec succès.";
        } else {
            echo "Erreur: " . mysqli_error($conn);
        }

        // Fermer la connexion
        mysqli_close($conn);

    ?>



    <div class="small-container cart-page">

    <p>Bonjour</p>
    <h1>Ken Adams</h1>
    <h4>Email: ken@adams.com</h4>
    <h4>Ville: Tunis</h4>
    <br>
    <small>Date d'inscription: 11/12/2022</small>
    <hr><br>
    <div class="container publish-page">
        <h2>Modifier votre compte !</h2>
            <div class="row">
           
                <div class="form-container publish-container">
                    <div class="form-btn">
                        <span >Saisir les informations </span>
                        <hr id="Indicator">
                    </div>

                    
                    <form id="" method="post" >
                        <div class="row">
                            <input type="text" placeholder="Nom" name ="Nom">
                        </div>
                        <div class="row">
                            <input type="number" placeholder="E-mail" name="Email">
                            <input type="text" placeholder="Ancien mot de passe" name="ancien">
                        </div>
                        <div class="row">
                            <input type="text" placeholder="Nouveau mot de passe" name="nouveau">
                        </div>
                        <br>
                        <button type="submit" name="modifier" class="btn">Modifier</button>
                    </form>

                </div>
            </div>
    </div>



	<!--		footer		-->
<?php 
    require("./bases/footer.php");
?>


</body>
</html>