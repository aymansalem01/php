<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'task12';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>