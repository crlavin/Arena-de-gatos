<?php

session_start();

$num_cart = 0;
if(isset($_SESSION['carrito']['productos'])){
    $num_cart = count($_SESSION['carrito']['productos']);

}
define("CLIENT_ID", "ATa7ZZz55mq9u4Ow1LAv-PFucpb5OXWm_T7HV5Q7uVwZ0q_kJkOmJZwDI9iNPbR71Xj5krLDlVUNsiJq");
define("CURRENCY", "USD");
define("KEY_TOKEN", "ZXC.qwe-876**");
define("MONEDA", "$");

?>