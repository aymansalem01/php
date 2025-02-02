<?php include ('conn.php')?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title> admin page</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #222;
            
        }
        
        table { 
            border-collapse: collapse;
            background: #333;
            color: white;
        }
        th, td {
            border: 1px solid white;
            padding: 10px;
            text-align: left;
        }
        th {
            background: #444;
        }
        button{
            margin-bottom: 20px;
            background-color: dimgray;
            color:  wheat;
        }
    </style>
</head>
<body>
<button onclick="location.href='add.php'">Add new employees +</button>

    <table >
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Date Created</th>
                <th>Phone Number</th>
                <th>update</th>
                <th>delete</th>
                <th>view</th>

            </tr>
        </thead>
        <tbody>

        <?php 
        
        $query = "SELECT * FROM `users`";

        $result = mysqli_query($conn, $query);

        if(!$result){
            die("Query failed: " . mysqli_error($conn)); 
        }
        else{
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr class="tr"> 
                    <td> <?php echo $row['id'];?> </td>
                    <td> <?php echo $row['name'];?></td>
                    <td> <?php echo $row['email'];?></td>
                    <td> <?php echo $row['email'];?></td>
                    <td> <a href="update.php?id=<?php echo $row['id'];?>" class="btn btn-success">Update</a></td>
                    <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirmDelete()">Delete</a></td>
                    <td> <a href="view.php?id=<?php echo $row['id'];?>" class="btn btn-info">view</a></td>
                </tr>
                <?php
        }
    }
?>
    <script>
    function confirmDelete(){
    var result = confirm("Are you sure you want to delete this record?");
    return result;
    }
    </script> 
        </tbody>
    </table>
    
</body>
</html>
