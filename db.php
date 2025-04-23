<?php
$host = "localhost";
$user = "root";
$pass = "Jass@01";
$db = "event_db";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
