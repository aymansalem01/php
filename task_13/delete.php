<?php include("config.php") ;
if (isset($_GET['id']) && intval($_GET['id']) > 0) {
    $id = intval($_GET['id']); 

    $query = "DELETE FROM `employees` WHERE id = '$id'";
    $result = $conn->query($query);




header("location: index.php");

}


?>







