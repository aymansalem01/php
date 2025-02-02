<?php include("conn.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="" method="POST">
<label>Full Name</label>
<input name="name" type="text">

<label>mobaile</label>
<input name="mobail" type="number">

<label>email</label>
<input name="email" type="email">

<label>date creat</label>
<input name="date" type="text">

<button type="submit" name="add"> Add user</button>

</form>
<button onclick="location.href='admin.php'">Back</button>
</body>
</html>
<?php 
if(isset($_POST['add'])){
$name = $_POST['name'];
$mobail = $_POST['mobail'];
$email = $_POST['email'];
$date = $_POST['date'];
if(!empty($name) && !empty($mobail) && !empty($email) && !empty($date) ){
$query1 ="INSERT INTO `users`( `email`, `Full_name`, `mobail`, `Date_creat`) VALUES ('$email','$name','$mobail','$date')";
$query2 = "INSERT INTO `roles`( `email`, `role`) VALUES ('$email','')";
$result1 = $conn->query($query1);
$result2 =$conn->query($query2);
header('location:admin.php');

}else echo "<script>alert('fill the input');</script>";
}

?>