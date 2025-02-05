<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logindb";
$conna = new mysqli($servername, $username, $password, $dbname);
if ($conna->connect_error) {
    die("error:" . $conna->connect_error);
}
?>