<?php

session_start();
//define('TOKEN', "93413c63eabe74b75a6c1029b844b156eb6190df");

if (!isset($_SESSION['token'])) {
    header("Location: token.php");
}
?>
