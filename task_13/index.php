<?php include("config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <style>
        .popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }
        .popup-content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            text-align: center;
            position: relative;
        }
        .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 18px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<button onclick="location.href='add.php'">Add New Employee</button>
<button onclick="location.href='changeSalaryAll.php' " type="submit">Update the salary</button>

<br>
<br>


<table border="1">
    <thead> 
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Salary</th>
            <th>Days Off</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $sql = "SELECT * FROM `employees`";
        $result = $conn->query($sql);
        foreach ($result as $x) {
            echo "<tr>
                <td>{$x['id']}</td>
                <td>{$x['name']}</td>
                <td>{$x['address']}</td>
                <td>{$x['salary']}</td>
                <td>{$x['off_days']}</td>
                <td>
                    <a href='read.php?id={$x['id']}'>Read</a>
                    <a href='delete.php?id={$x['id']}'>Delete</a>
                    <a href='update.php?id={$x['id']}'>Update</a>
                    <a href='cal.php?id={$x['id']}'>Calculate Salary</a>
                </td>
            </tr>";
        }
        ?>
    </tbody>
</table>
<br>
<br>

<form method="GET">
    <label>ID:</label>
    <input name="id" type="number" required>
    <button type="submit">Search</button>
</form>

<div id="popup" class="popup-overlay">
    <div class="popup-content">
        <span class="close-btn" onclick="closePopup()">&times;</span>
        <h3>Employee Details</h3>
        <table border="1">
            <thead> 
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Salary</th>
                    <th>Days Off</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM `employees` WHERE id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        while ($x = $result->fetch_assoc()) {
                            echo "<tr>
                                <td>{$x['id']}</td>
                                <td>{$x['name']}</td>
                                <td>{$x['address']}</td>
                                <td>{$x['salary']}</td>
                                <td>{$x['off_days']}</td>
                            </tr>";
                        }
                        echo "<script>document.getElementById('popup').style.display = 'flex';</script>";
                    } else {
                        echo "<tr><td colspan='5'>No employee found.</td></tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    function closePopup() {
        document.getElementById("popup").style.display = "none";
    }
</script>


<?php 

$sql = "SELECT MAX(salary) AS max_salary, MIN(salary) AS min_salary, COUNT(*) AS employee_count , SUM(salary) AS total FROM `employees`";
$result = $conn->query($sql);

if ($result) {
    $row = $result->fetch_assoc();
    echo "<br> <br> ";
    echo "The greatest salary is: " . $row['max_salary'] . "<br> ";
    echo "The lowest salary is: " . $row['min_salary'] . "<br>";
    echo "Total number of employees: " . $row['employee_count'] . "<br>";
    echo "Total Salary: " . $row['total'] . "<br>";

}







?>






</body>
</html>






