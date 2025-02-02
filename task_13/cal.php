<?php 
include("config.php");

if (isset($_GET['id']) && intval($_GET['id']) > 0) {
    $id = intval($_GET['id']); 

    $query = "SELECT * FROM `employees` WHERE id = '$id'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $new_salary = $row['salary']-(($row['salary']/30)*$row['off_days']);
        echo "
       
        <h2>{$row['name']}</h2>
        <br>
        <h2>{$row['salary']}JD</h2>
        <br>
        <h2>{$row['off_days']}</h2>
        <br>
        <h2>net salary:$new_salary JD </h2>
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
