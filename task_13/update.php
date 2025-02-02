<?php include("config.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
    if (isset($_GET['id']) && intval($_GET['id']) > 0) {
        $id = intval($_GET['id']);
        $sql = "SELECT * FROM `employees` WHERE id = '$id'";
        $resultt = $conn->query($sql);
        $row = $resultt->fetch_assoc();

    }
    
    ?>
</head>
<body>
<form action="" method="POST">
<label>name</label>
<input value="<?php echo $row['name'] ?>" name="name" type="text">

<label>salary</label>
<input value="<?php echo $row['salary'] ?>" name="salary" type="text">
<label>address</label>
<input value="<?php echo $row['address'] ?>" name="address" type="text">
<label>Off days</label>
<input value="<?php echo $row['off_days'] ?>" name="Off_days" type="text">
<button type="submit" name="update">update</button>

</form>    
</body>
</html>
<?php 

if(isset($_POST['update'])){
$name = $_POST['name'];
$address = $_POST['address'];
$salary = $_POST['salary'];
$Off_days = $_POST['Off_days'];
if(!empty($name) && !empty($address) && !empty($salary)){
$query ="UPDATE `employees` SET `name`='$name',`address`='$address',`salary`='$salary',`off_days`='$Off_days' WHERE id = '$id' ";
$result = $conn->query($query);
header('location:index.php');






}else echo "<script>alert('fill the input');</script>";









}





?>
<button onclick="location.href='index.php'">Home page</button>
