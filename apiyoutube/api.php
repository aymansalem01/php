<?php

$searchQuery = isset($_GET['search']) ? urlencode($_GET['search']) : '';

$apiKey = 'AIzaSyBwNzVEWbJMuNdyCX1FkFOsZzIVWch8LaA';

$apiUrl = "https://www.googleapis.com/youtube/v3/search?part=snippet&q=$searchQuery&type=video&maxResults=10&key=$apiKey";


$searchResults = [];

if ($searchQuery) {

    $contents = file_get_contents($apiUrl);
    $data = json_decode($contents, true);
    if (isset($data['items'])) {
        $searchResults = $data['items'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube Video Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .search-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .card {
            border: 1px solid #ddd;
            border-radius: 5px;
            margin: 10px;
            padding: 10px;
            width: 200px;
            display: inline-block;
            text-align: center;
        }
        .card img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .card h3 {
            font-size: 14px;
            margin-top: 10px;
        }
        .card a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div class="search-container">
        <h1>Search for YouTube Videos</h1>
        <form action="" method="get">
            <input type="text" name="search" placeholder="Enter search term" value="<?php echo htmlspecialchars($searchQuery); ?>" required>
            <button type="submit">Search</button>
        </form>
    </div>

    <?php if ($searchQuery && count($searchResults) > 0): ?>
        <h2><?php echo count($searchResults); ?> Results Found</h2>
        <div class="results-container">
            <?php foreach ($searchResults as $result): ?>
                <div class="card">
                    <img src="<?php echo $result['snippet']['thumbnails']['medium']['url']; ?>" alt="Thumbnail">
                    <h3><?php echo htmlspecialchars($result['snippet']['title']); ?></h3>
                    <a href="https://www.youtube.com/watch?v=<?php echo $result['id']['videoId']; ?>" target="_blank">Watch Video</a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php elseif ($searchQuery): ?>
        <p>No results found for "<?php echo htmlspecialchars($searchQuery); ?>"</p>
    <?php endif; ?>

</body>
</html>
