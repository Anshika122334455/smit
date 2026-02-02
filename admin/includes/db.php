<?php
$host = "localhost";
$dbname = "u614646620_lyrical_db";
$username = "u614646620_lyrical_user";
$password = "Aezakmi22@@";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Database connection failed");
}
?>
