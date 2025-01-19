<!------q1--->
<?php
    $str ="hello world";
    echo strtoupper($str);
    echo "<br>";
    echo strtolower($str);
    echo "<br>";
    echo ucfirst($str);
    echo "<br>";
    echo ucwords($str);
    echo "<br>";
?>
<!------------------------>
<br><br>
<!-------------q2---------->
<?php
$str = "085119";
    echo $str[0].$str[1].":".$str[2].$str[3].":".$str[4].$str[5];
?>
<!------------------->
<br><br>
<!------------q3----------->
<?php
$str = "hello how are you you'r good?";
if (str_contains($str,"how")){
    echo "word found!";
}
?>
<!------------------------>
<br><br>
<!-------------q4------------>
<?php 
$str = "www.hello.com/index.php";
echo ltrim($str,"www.hello.com/");
?>
<!-------------------->
<br><br>
<!------------q5------------->
<?php 
$str = "ayman@yahoo.com";
echo rtrim($str,"@yahoo.com");
?>
<br><br>
<!------------------------------------->
<br><br>
<!--------------q6------------>
<?php
$str = "info@aaa.com";
echo substr($str,-3,3); 
?>
<!-------------------------------->
<br><br>
<!-----------------------------q7------->
<?php
$chars = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
$password = substr(str_shuffle($chars), 0, 10);
echo $password;
?>
<!----------------------->
<br><br>
<!----------------q8---------->
<?php
$str = 'That new trainee is so genius.';
echo str_replace('That','the', $str);
?>
<!-------------------->
<br><br>
<!-----------q9-------->
<?php

$string1 = 'dragonball';
$string2 = 'dragonboll';

for ($i = 0; $i < strlen($string1); $i++) {
    if ($string1[$i] != $string2[$i]) {
        echo "First difference at position $i: '{$string1[$i]}' vs '{$string2[$i]}'";
        break;
    }
}

?>
<br><br>
<!---------------q10----------->
<?php

$string = "Twinkle, twinkle, little star.";
$array = explode(' ', str_replace(',', ' ', $string));
var_dump($array);
?>
<!--------------------------->
<br><br>
<!---------------q11----------->
<?php
   
?>
