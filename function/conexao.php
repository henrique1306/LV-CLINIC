<?php
$servername = "localhost";
$database = "clinicamedica";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, database: $database);

if (!$conn) {
    die("Erro:" . mysqli_connect_error());
}
?>