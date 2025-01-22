<?php 
session_start();

if (empty($_SESSION['number'])) {
    $_SESSION['number'] = 0; 
}
echo ++$_SESSION['number'];
?>
