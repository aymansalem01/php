

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
        }
        img {
            max-width: 100%;
            height: auto;
        }
        .btn {
            width: 200px;
            border-radius: 25px;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <div class="top"> 
            <h1>Hello There!</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus commodi rem deserunt.</p>
        </div>

        <div>
            <img src="1.png" alt="">
        </div>

<form  method="POST">

        <div class="mt-4">
            <button type="submit" class="btn btn-primary" name="login">Login</button>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-danger" name="signup">Sign Up</button>
        </div>
    </div>

</form>
</body>
</html>
<?php
if(isset($_POST["login"])){
    header("Location: login.php");
    exit();
}
elseif(isset($_POST["signup"])){
    header("Location: signup.php");
    exit();
}
?>





