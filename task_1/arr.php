<!-- 1. -->
<?php 
$color = array ("red","green","white");
echo "The memory of that scene for me is like a frame of film forever
frozen at that moment: the {$color[0]} carpet, the {$color[1]} lawn, the {$color[2]} 
house, the leaden sky. The new president and his first lady. - Richard M. Nixon" ,"<br>";
?>
<!-- 2-->
<?php 
    $colors1 = array('white', 'green', 'red');
    echo "<ul> <li> {$colors1[1]} </li>
    <li> {$colors1[2]} </li>
    <li> {$colors1[0]} </li>";
?>
<!-- 3. -->
<?php 
$cities= array( "Italy"=>"Rome", "Luxembourg"=>"Luxembourg",
"Belgium"=> "Brussels", "Denmark"=>"Copenhagen", 
"Finland"=>"Helsinki", "France" => "Paris",
"Slovakia"=>"Bratislava", "Slovenia"=>"Ljubljana", 
"Germany" => "Berlin", "Greece" => "Athens", 
"Ireland"=>"Dublin", "Netherlands"=>"Amsterdam", 
"Portugal"=>"Lisbon", "Spain"=>"Madrid" ); 
asort($cities);
foreach ($cities as $x => $y)
echo "The capital of $x is $y","<br>";
?>
<!-- 4 -->
<?php 
$colors2 = array (4 => 'white', 6 => 'green', 11=> 'red');
echo $colors2[4] , "<br>";
?>
<!-- 5 -->
<?php 
$numbers = [1 , 2 , 3 , 4 ,5];
array_splice($numbers ,3, 0 ,"$");
echo implode(" ", $numbers) , "<br>";
?>
<!-- 6 -->
<?php 
$fruits = array("d" => "lemon", "a" => "orange", "b" => "banana", "c" => "apple");
asort($fruits);
foreach ($fruits as $x => $y){
    echo $x , "=" ,$y ,"<br>";
}
?>
<!-- 7. -->
<?php
$temperatures = array(78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65, 74, 62, 62, 65, 64, 68, 73, 75, 79, 73);
$average_temperature = array_sum($temperatures) / count($temperatures);
sort($temperatures);
$lowest_temperatures = array_slice($temperatures, 0, 7);
rsort($temperatures);
$highest_temperatures = array_slice($temperatures, 0, 7);
echo "Average Temperature is: " . number_format($average_temperature, 1) . "<br>";
echo "List of five lowest temperatures: " . implode(", ", $lowest_temperatures) . "<br>";
echo "List of five highest temperatures: " . implode(", ", $highest_temperatures) . "<br>";
?>
<!-- 8-->
<?php 
$array1 = array("color" => "red", 2, 4);
$array2 = array("a", "b", "color" => "green", "shape" => "trapezoid", 4);
$array3 = array_merge($array1 , $array2);
echo "<pre>";
print_r($array3);
echo "</pre>";
?>
<!-- 9 -->
<?php
$colors = array("red", "blue", "white", "yellow");
$upper_colors = array_map('strtoupper', $colors);
echo "<pre>";
print_r($upper_colors);
echo "</pre>";
?>
<!-- 10.-->
<?php
$colors = array("RED","BLUE", "WHITE","YELLOW");
$upper_colors = array_map('strtolower', $colors);
echo "<pre>";
print_r($upper_colors);
echo "</pre>";
?>
<!-- 11 -->
<?php
for ($i = 200; $i <= 250; $i++) {
    if ($i % 4 == 0) {
        echo $i;
        if ($i < 250) {
            echo ", ";
        }
    }
}
echo "<br>";
?>
<!-- 12. -->
<?php
$words = array("abcd", "abc", "de", "hjjj", "g", "wer");
$lengths = array_map('strlen', $words);
$shortest = min($lengths);
$longest = max($lengths);
echo "The shortest array length is $shortest. The longest array length is $longest.","<br>";
?>
<!-- 13. -->
<?php
$min = 11;
$max = 20;
$numbers = range($min, $max);
shuffle($numbers);
$unique_random_numbers = array_slice($numbers, 0, 10);
echo implode(" ", $unique_random_numbers) , "<br>";
?>

<!-- 14.-->
<?php
$array1 = array(2, 0, 10, 12, 6);
$filtered_array = array_filter($array1, function($value) {
    return $value != 0;
});
$smallest = min($filtered_array);
echo "The smallest non-zero integer is: $smallest";
?>
<!-- 15 -->
<?php
$array = array(5, 3, 1, 3, 8, 7, 4, 1, 1, 3);
rsort($array);
echo "Sorted Array (Descending Order): ";
print_r($array);
echo "<br>";
?>
<!-- 16-->
<?php
function custom_floor($number, $precision) {
    return floor($number * 10 ** $precision) / 10 ** $precision;
}
echo custom_floor(1.155, 2) . "<br>";   
echo custom_floor(100.25781, 4) . "<br>"; 
echo custom_floor(-2.9636, 3) . "<br>"; 
?>
<!-- 17 -->
<?php
$list1 = "4, 5, 6, 7";
$list2 = "4, 5, 7, 8";
$array1 = explode(", ", $list1);
$array2 = explode(", ", $list2);
$merged_array = array_unique(array_merge($array1, $array2));
$result = implode(", ", $merged_array);
echo $result , "<br>";
?>
<!-- 18 -->
<?php
function remove_duplicates($array) {
    return array_unique($array);
}
$input_array = array(4, 5, 6, 7, 4, 7, 8);
$output_array = remove_duplicates($input_array);
echo implode(", ", $output_array) ,"<br>";
?>
<!-- 19-->
<?php
function is_subset($array1, $array2) {
    return !array_diff($array2, $array1);
}
$array1 = array('a', '1', '2', '3', '4');
$array2 = array('a', '3');
if (is_subset($array1, $array2)) {
    echo "array2 is a subset array from array1"; 
} else {
    echo "array2 is not a subset array from array1";
}
?>
