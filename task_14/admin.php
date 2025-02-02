<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>users Management</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

<h2>users List</h2>


<?php
include("conn.php");
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<table id='usersTable'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>";
    while ($users = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$users['id']}</td>
                <td>{$users['name']}</td>
                <td>{$users['email']}</td>
            </tr>";
    }

    echo "</tbody></table>";
} else {
    echo "No userss found";
}

$conn->close();
?>


</body>
</html>
