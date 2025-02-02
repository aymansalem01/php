<?php include("conn.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT * FROM `users` WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    } else {
        $row = mysqli_fetch_assoc($result);
    }
}
?>
</head>

<body>
    
<form action="" method="POST">
<label>Full Name</label>
<input name="name" type="text" value="<?php echo isset($row['Full_name']) ? $row['Full_name'] : ''; ?>">

<label>mobaile</label>
<input name="mobail" type="number" value="<?php echo isset($row['mobail']) ? $row['mobail'] : ''; ?>">

<label>email</label>
<input name="email" type="email" value="<?php echo isset($row['email']) ? $row['email'] : ''; ?>">

<label>date creat</label>
<input name="date" type="text" value="<?php echo isset($row['Date_creat']) ? $row['Date_creat'] : ''; ?>">

<button type="submit" name="update">update </button>

</form>
<button onclick="location.href='admin.php'">Back</button>
</body>
</html>

<?php
if (isset($_POST['update'])) {
    if (isset($_GET['id'])) {
        $id_new = $_GET['id'];
    }
    $name =$_POST['name'];
    $mobail = $_POST['mobail'];
    $email= $_POST['email'];
    $date = $_POST['date'];

    $query = "UPDATE `users` SET `email`='$email',`Full_name`='$name',`mobail`='$mobail',`Date_creat`='$date' WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    } else {
        header('Location: admin.php?update_msg=you have successfully updated the data');
        exit();
    }
}
?>