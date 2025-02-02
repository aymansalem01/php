<?php include("config.php"); 



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST" action="">
<label for="employee_id">Inter ID for employee</label>
    <input type="text" name="employee_id">

    <button type="submit" name="update_one">Update the salary for the employee</button><br><br>
    <label for="salary_new">Inter the salary:</label>
    <input type="text" name="salary_new" required>
    
    <button type="submit" name="update_all">Update all salary</button>

   
</form>
<br>
</body>
</html>
<?php
if(isset($_POST['update_all'])){
    $salary_new = $_POST['salary_new'];

    $query_update_all = "UPDATE `employees` SET `salary`='$salary_new'";
    $result_update_all = $conn->query($query_update_all);
    
    if($result_update_all){
        echo header('location: index.php');
    } else {
        echo "Fill the salary";
    }
}

if(isset($_POST['update_one'])){
    $employee_id = $_POST['employee_id'];
    $salary_new = $_POST['salary_new'];

    $query_check = "SELECT * FROM `employees` WHERE `id`='$employee_id'";
    $result_check = $conn->query($query_check);

    if($result_check->num_rows > 0){
        $query_update_one = "UPDATE `employees` SET `salary`='$salary_new' WHERE `id`='$employee_id'";
        $result_update_one = $conn->query($query_update_one);

        if($result_update_one){
            echo header('location: index.php');
        } else {
            echo "Fill the salary";
        }
    } else {
        echo "Didn't found ID";
    }
}
?>
<button onclick="location.href='index.php'">Home page</button>
