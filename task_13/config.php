<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "task13";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("error:" . $conn->connect_error);
}
?>