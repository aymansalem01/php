<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Determine Project and Script Name</title>
</head>
<body>
    <h1>Project and Script Information</h1>
    
    <?php
    $projectName = "5.php";

    $scriptName = $_SERVER['SCRIPT_NAME'];

    echo "<p><strong>Project Name:</strong> $projectName</p>";
    echo "<p><strong>Script Name:</strong> $scriptName</p>";
    ?>
</body>
</html>
