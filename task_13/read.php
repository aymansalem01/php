<?php 
include("config.php");

if (isset($_GET['id']) && intval($_GET['id']) > 0) {
    $id = intval($_GET['id']); 

    $query = "SELECT * FROM `employees` WHERE id = '$id'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        echo "
        <h2>ID User : $id</h2>
        <br>
        <h2>Name : {$row['name']}</h2>
        <br>
        <h2>Salary : {$row['salary']}JD</h2>
        <br>
        <h2>Address : {$row['address']}</h2>
        <br>
        <h2>Off days : {$row['off_days']}</h2>
        <br>

        ";
    } else {
        echo "<h2> employee not found </h2>";
    }
} else {
    header('Location: index.php');
    exit();
}
?>
<button onclick="location.href='index.php'">Home page</button>
