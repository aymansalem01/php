<!----------------q1-------------->
<?php 
    function isprime($x){
        if($x == 1) return "$x is not aprime number";
        for ($i = 2; $i <= $x/2; $i++){
            if ($x % $i == 0)
                return "$x is not a prime number";
        }
        return "$x is a prime number";
    }
    echo isprime(3)
?>
<!--------------------------------->
<br><br>
<!----------------q2-------------->
<?php 
    function reverse($str){
        return strrev($str);
    }
    echo reverse("hello");
?>
<!--------------------------------->
<br><br>
<!----------------q3-------------->
<?php 
    function islower($x){
        if(ctype_lower($x)){
            return " ok all lower case ";
        }
        else{
            return "not ok";
        }
    }
    echo islower("hello");
?>
<!--------------------------------->
<br><br>
<!----------------q4-------------->
<?php 
    function swap($x,$y){
        $z = $x;
        $x = $y;
        $y = $z;
        echo "x = $x , y = $y ";
    }
    $x = 5;
    $y = 10;
    swap($x,$y);
?>
<!--------------------------------->
<br><br>
<!----------------q6-------------->
<?php 
    function isarmos($x){
        $str = (string)$x;
        $sum = 0;
        for($i=0 ; $i<strlen($str) ;$i++ ){
            $digit = (int)$str[$i];
            $sum+= $digit**strlen($str);
        }
        return $sum == $x;
    }
    if(isarmos(407)){ echo "is armostrong";}
    else {echo "is't armstrong";}
    
?>
<!--------------------------------->
<br><br>
<!----------------q7-------------->
<?php 
 
?>
<!--------------------------------->
<br><br>
<!----------------q8------------->
<?php 
    function dubarr($x){
        echo array_unique($x);
    }
    dubarr([1,5,5,7,8,9,7]);
?>
<!--------------------------------->
<br><br>
