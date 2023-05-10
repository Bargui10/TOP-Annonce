<?php
    // this one will be added to user profile and vendeur profile with require(). 
    // those pages have require("navbar.php") and require("connect.php") already.

    if (isset($_POST['submitAvis'])) {
        # code...

        if (isset($_SESSION['user_id'])) { // user has to be connected to leave rating 
            # code...
            # Etape 1 : récupération des données à partir d’un formulaire
            $descriptionAvis = $_POST['description']; 
            $ratingAvis = $_POST['rating']; 
            $suggestionAvis = $_POST['suggestion'];

            # Etape 2 : Préparation de la requête
            $reqpreAvis = $conn->prepare("INSERT INTO avis( description, rating, suggestion, user) VALUES(:description,:rating,:suggestion,:user)");

            #Etape 3 :Liaison entre les marqueurs et les données du formulaire
            #Créer un Tableau associatif-> clé :nom du marqeur et valeur : donnée
            $tabAvis = array(':description'=>$descriptionAvis, ':rating'=>$ratingAvis, ':suggestion' =>$suggestionAvis, ':user' =>$_SESSION['user_id']);
            # Etape 4 : exécution de la requête
            $resultatAvis = $reqpreAvis->execute($tabAvis);

            if($resultatAvis)
                echo "Avis ajouté avec succès";
            else
                echo "echec d'ajout d'avis";

        }else {
            echo "<h3>Vous devez etre connecté pour donner votre avis. Redirection dans 5 secondes...</h3>";
            sleep(5);
            header("location:login.php");
        }


    }



?>

    <!--        Form        -->
    <div class="container">
            <div class="row">
               
                    <div class="form-container filter-container">
                        <div class="form-btn">
                            <span>Donnez votre avis sur TopAnnonces </span>
                            <hr id="Indicator">
                        </div>

                        
                        <form id="RegisterForm" action="" method="post">
                            <br>
                            <div class="row">
                                <h5>Parlez-nous de votre expérience sur TopAnnonces</h5>
                            </div>
							<div class="row"  >
								<input type="text" name="description" placeholder="Avis.." required>
							</div>

                            
                            <div class="row">
                                <h5>Comment évalueriez-vous notre site Web en un mot?</h5>
                            </div>
							<select name="rating" id="" required>
								<option value="5">Excellent</option>
								<option value="4">Très Bon</option>
								<option value="3">Bon</option>
								<option value="2">Moyen</option>
								<option value="1">Mauvais</option>
                                <option value="0">Grave</option>
							</select>

                            <br>
                            <div class="row">
                                <h5>Avez-vous des suggestions? des recommendations?</h5>
                            </div>
                            
							<div class="row" >
								<input  type="text" name="suggestion" placeholder="Suggestions.." >
							</div>

							<button type="submit" name="submitAvis" class="btn">Envoyer</button>
                        </form>

                    </div>
            </div>
        </div>
