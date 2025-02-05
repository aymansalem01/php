<?php   
    session_start();
    if(!isset($_SESSION['eamil'])){
    $email = $_SESSION['email'] ;
    $name = $_SESSION['name'];
}
else{
    echo " <script> alert('user not found')</scrip> ";
    header('location: login.php');
}

?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>hello <?php echo"$name";?> </h1>
    <h1>your email is : <?php echo"$email";?> </h1>
    




</body>
</html>