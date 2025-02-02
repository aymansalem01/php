<?php

$url = "https://api.openweathermap.org/data/2.5/weather?q=amman&appid=977f531e5d65f03795a0154c67b29c99";

$contents = file_get_contents($url);

$clima = json_decode($contents);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> temperature is : <?php  echo $clima->main->temp ;  ?>  </h1>
    <h1> humidity is:  <?php  echo $clima->main->humidity ;  ?>  </h1>
</body>
</html>