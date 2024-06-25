<?php

session_start();

$num_cart = 0;
if(isset($_SESSION['carrito']['productos'])){
    $num_cart = count($_SESSION['carrito']['productos']);

}
define("KEY_TOKEN", "ZXC.qwe-876**")


?>