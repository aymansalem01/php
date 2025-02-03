<?php
$searchQuery = isset($_GET['search']) ? strtolower(trim($_GET['search'])) : '';
$apiUrl = "https://pokeapi.co/api/v2/pokemon/";
$pokemonData = [];
if ($searchQuery) {
    $url = $apiUrl . $searchQuery;
    $contents = file_get_contents($url);
    if ($contents !== false) {
        $data = json_decode($contents, true);
        if (isset($data['name'])) {
            $pokemonData = [
                'name' => ucfirst($data['name']),
                'image' => $data['sprites']['front_default'],
                'type' => $data['types'][0]['type']['name'],
                'height' => $data['height'],
                'weight' => $data['weight']
            ];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokémon Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            text-align: center;
        }
        .search-container {
            margin-bottom: 20px;
        }
        .card {
            border: 1px solid #ddd;
            border-radius: 10px;
            margin: 10px;
            padding: 20px;
            display: inline-block;
            text-align: center;
            width: 250px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card img {
            width: 150px;
            height: 150px;
        }
        .card h3 {
            font-size: 22px;
            margin-top: 10px;
        }
        .card p {
            font-size: 16px;
        }
        .card .type {
            font-weight: bold;
            color: #fff;
            padding: 5px;
            background-color: #4CAF50;
            border-radius: 5px;
            display: inline-block;
            margin-top: 5px;
        }
    </style>
</head>
<body>

    <div class="search-container">
        <h1>Search for a Pokémon</h1>
        <form action="" method="get">
            <input type="text" name="search" placeholder="Enter Pokémon name" value="<?php echo htmlspecialchars($searchQuery); ?>" required>
            <button type="submit">Search</button>
        </form>
    </div>

    <?php if ($searchQuery && !empty($pokemonData)): ?>
        <div class="card">
            <img src="<?php echo $pokemonData['image']; ?>" alt="Pokémon Image">
            <h3><?php echo $pokemonData['name']; ?></h3>
            <p><strong>Type:</strong> <?php echo ucfirst($pokemonData['type']); ?></p>
            <p><strong>Height:</strong> <?php echo $pokemonData['height']; ?> decimeters</p>
            <p><strong>Weight:</strong> <?php echo $pokemonData['weight']; ?> hectograms</p>
        </div>
    <?php elseif ($searchQuery): ?>
        <p>No Pokémon found with the name "<?php echo htmlspecialchars($searchQuery); ?>"</p>
    <?php endif; ?>

</body>
</html>
