<!DOCTYPE html>
<html>
<head>
    <title>Simple Search Engine</title>
</head>
<body>
    <h2>Simple URL Redirect</h2>
    <form action="" method="GET">
        <label for="url">Enter URL:</label><br>
        <input type="text" id="url" name="url" placeholder="https://example.com" required><br><br>
        <button type="submit">GO</button>
    </form>

    <?php
    if (isset($_GET['url'])) {
        $url = $_GET['url'];

        if (filter_var($url, FILTER_VALIDATE_URL)) {
            header("Location: " . $url);
            exit();
        } else {
            echo "<p style='color: red;'>Invalid URL. Please enter a valid URL (e.g., https://example.com).</p>";
        }
    }
    ?>
</body>
</html>
