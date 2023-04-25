<?php
session_start();
include("C:\wamp64\www\Top-Annonces-main\bd.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header("location: account.html");
        } else {
            echo "<script>alert('Nom d\'utilisateur ou mot de passe incorrect')</script>";
        }
    } else {
        echo "<script>alert('Veuillez saisir un nom d\'utilisateur et un mot de passe')</script>";
    }
}
?>
