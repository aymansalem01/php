<?php
session_start();

if (!isset($_SESSION['list'])) {
    $_SESSION['list'] = [];
}

if (isset($_POST['todo']) && !empty($_POST['todo'])) {
    $_SESSION['list'][] = ($_POST['todo']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
</head>
<body>
    <h2>To-Do List</h2>
    <form action="" method="POST">
        <input type="text" name="todo" placeholder="Enter a task" required>
        <input type="submit" value="Add to List">
    </form>
    <ul>
        <?php
        foreach ($_SESSION['list'] as $item) {
            echo "<li>$item</li>";
        }
        ?>
    </ul>
</body>
</html>
