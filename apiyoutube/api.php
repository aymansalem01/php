<?php
$url = "https://www.googleapis.com/youtube/v3/search?part=snippet&q=Cairokee%20Roberto&type=video&maxResults=1&key=AIzaSyBwNzVEWbJMuNdyCX1FkFOsZzIVWch8LaA";
$contents = file_get_contents($url);
$clima = json_decode($contents);
$dec = $clima->items[0]->snippet->title;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Embedded YouTube Video</title>
</head>
<body>

<h1>Watch the Video</h1>

<iframe width="560" height="315" 
    src="https://www.youtube.com/embed/53R4qZagMuc" 
    frameborder="0" 
    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
    allowfullscreen>
</iframe>
<?php 
echo "
<h1> $dec</h1>


"

?>

</body>
</html>
