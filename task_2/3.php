<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
<input name="num1" type="number" > <br> <br>
<input name="hello" type="text" size="1" ><br> <br>
<input name="num3" type="number" ><br> <br>
<input type="submit">



    </form>
</body>
</html>

<?php 

if($_POST['hello'] == "+"){
    echo ($_POST["num1"] + $_POST["num3"]);
}
if($_POST['hello'] == "*"){
    echo ($_POST["num1"] * $_POST["num3"]);
}
if($_POST['hello'] == "/"){
    echo ($_POST["num1"] / $_POST["num3"]);
}
if($_POST['hello'] == "-"){
    echo ($_POST["num1"] - $_POST["num3"]);
}








?>