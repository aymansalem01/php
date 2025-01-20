<!--------------------q1------------>
<?php   
$str = 2013;
if($str % 4 == 0){
    echo "This year is a leap year";
}
else{
    echo "This year is not a leap year";
}
?>
<!------------------------------->
<br><br>
<!--------------------q2------------>
<?php   
$temp = 18 ;
if($temp >= 20){
    echo  "it is summertime" ;
}
else{
    echo "winter in coming";
}
?>
<!------------------------------->
<br><br>
<!--------------------q3------------>
<?php   
    $arr = ["first"=>5,"second"=>4];
    if($arr['first'] == $arr['second']){
        echo $arr['first'] * $arr['second'] * 3;
    }
    else{
        echo $arr['first'] * $arr['second'];
    }
?>
<!------------------------------->
<br><br>
<!--------------------q4------------>
<?php   
    $arr = ["first"=>5,"second"=>4];
    $sum = $arr['first'] + $arr['second'];
    if($sum == 30){
        echo "true";
    }
    else{
        echo " false , the sum is  $sum  ";
    }
?>
<!------------------------------->
<br><br>
<!--------------------q5------------>
<?php   
    $str = 16;
    if( $str%3==0 && $str>0)
    {echo "true";}
    else{echo "false";}
?>
<!------------------------------->
<br><br>
<!--------------------q6------------>
<?php   
    $str = 45;
    if($str<=50 && $str>=20){
        echo "true";
    }
    else{
        echo "false";
    }
?>
<!------------------------------->
<br><br>
<!--------------------q7------------>
<?php   
    $arr = [1,5,7,8,9,3,6];
    echo max($arr);
?>
<!------------------------------->
<br><br>
<!--------------------q8------------>
<?php   
    $str = 400;
    if($str >= 250){
        echo "your bill is".$str*7.5. "JOD";
    }
    else{
        $total = 0;
        $total = $str*2.5;
        $str-=50;
        if($str>0){
            $total += ($str*5);
            $str -=100;
            if($str >0){
                $total += ($str*6.5);
                $str -= 100;
            }
        } 
        echo "your bill is".$total." JOD";
    }
?>
<!------------------------------->
<br><br>
<!--------------------q9------------>
<?php   
    function sum($ar1,$ar2){
        return $ar1 + $ar2;
    }
    function mull($ar1,$ar2){
        return $ar1 * $ar2;
    }
    function sub($ar1,$ar2){
        return $ar1 - $ar2;
    }
    function div($ar1,$ar2){
        return $ar1 / $ar2;
    }
    $x =10;
    $y = 5;
    echo sum($x,$y);
    echo "<br>";
    echo mull($x,$y);
    echo "<br>";
    echo sub($x,$y);
    echo "<br>";
    echo div($x,$y);
?>
<!------------------------------->
<br><br>
<!--------------------q10------------>
<?php   
    $age = 15;
    if($age>=18){
        echo "you can vote";
    }
    else{
        echo "you can't vote";
    }
?>
<!------------------------------->
<br><br>
<!--------------------q11------------>
<?php   
    $str = -5;
    if($str < 0){
        echo "number is negative";
    }
    elseif($str ==0){
        echo "number is zero";
    }
    else{
        echo "number is posetive";
    }
?>
<!------------------------------->
<br><br>
<!--------------------q12------------>
<?php   
    $arr = [65,80,95,75,80,91,80,60,50];
    $number = count($arr);
    $sum = 0;
    foreach($arr as $x){
        $sum +=$x;
    }
    $avg = $sum / $number;
    switch($avg){
        case $avg>=90:
        echo "A";
        break;
        case $avg >= 80:
        echo "B";
        break;
        case $avg >= 70:
        echo "C";
        break;
        case $avg >= 50:
        echo "D";
        break;
        default:
        echo "F";
        break;
    }

?>
<!------------------------------->
<br><br>