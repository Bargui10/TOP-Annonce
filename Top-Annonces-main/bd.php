<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "top_annonce";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("La connexion a échoué : " . mysqli_connect_error());
}
?>
