<?php
$cookie_name = "user";
$cookie_value = "John Doe";
$cookie_time = time() + (86400 * 30);
$cookie_delete_time = time() - 3600; 
setcookie($cookie_name, $cookie_value, $cookie_time, "/");
if(!empty($_COOKIE[$cookie_name])){
echo "Cookie still exists: " . $_COOKIE[$cookie_name];
setcookie($cookie_name, "", $cookie_delete_time, "/");
}
else{
    echo "hhhhhh no cookie";
}

?>
