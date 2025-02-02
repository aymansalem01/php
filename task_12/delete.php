<?php include("conn.php") ;
if (isset($_GET['id']) && intval($_GET['id']) > 0) {
    $id = intval($_GET['id']); 
    $query1 = "DELETE FROM users WHERE id = '$id'";
    $result1 = $conn->query($query1);

header("location: admin.php");
}
?>
