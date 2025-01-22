<?php
$file = 'ayman.txt';

if (file_exists($file)) {
    $count = file_get_contents($file);
} else {
    $count = 0;
}

$count++;

file_put_contents($file, $count);

echo "Number of visitors: " . $count;
?>
