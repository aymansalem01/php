



<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<h2>Data received using POST method:</h2>";
    echo "Email: " . htmlspecialchars($_REQUEST['email']) . "<br>";
    echo "Password: " . htmlspecialchars($_REQUEST['password']) . "<br>";
} elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
    echo "<h2>Data received using GET method:</h2>";
    echo "Email: " . htmlspecialchars($_REQUEST['email']) . "<br>";
    echo "Password: " . htmlspecialchars($_REQUEST['password']) . "<br>";
} else {
    echo "<h2>No data received.</h2>";
}
?>


