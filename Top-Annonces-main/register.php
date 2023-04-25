<?php
session_start();
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $sql = "INSERT INTO user (username, password, email) VALUES ('$username', '$password', '$email')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: account.html");
    } else {
        echo "<script>alert('Une erreur s\'est produite lors de l\'inscription. Veuillez réessayer.')</script>";
    }
}
?>
