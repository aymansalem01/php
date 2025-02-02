<?php include("config.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="POST">
<label>name</label>
<input name="name" type="text">

<label>salary</label>
<input name="salary" type="text">
<label>address</label>
<input name="address" type="text">
<label>Off days</label>
<input name="Off_days" type="text">
<button type="submit" name="add">Add</button>

</form>    
</body>
</html>
<?php 
if(isset($_POST['add'])){
$name = $_POST['name'];
$address = $_POST['address'];
$salary = $_POST['salary'];
$Off_days = $_POST['Off_days'];
if(!empty($name) && !empty($address) && !empty($salary)){
$query ="INSERT INTO `employees`(`name`, `address`, `salary`, `off_days`) VALUES
 ('$name','$address','$salary','$Off_days')" ;
$result = $conn->query($query);
header('location:index.php');

}else echo "<script>alert('fill the input');</script>";


}





?>