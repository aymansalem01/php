<?php
include('conn.php'); 

session_start();
$email = $_SESSION['email'];
$name = $_SESSION ['name'];
echo "<h1>name is $name </h1>" . '<br>';
echo "<h1>email is  $email</h1>";

?>
<button onclick="location.href='admin.php'">Back</button>