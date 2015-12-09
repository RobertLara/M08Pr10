<?php

session_start();    //Iniciem la sessio PHP

if (!isset($_SESSION['token'])) {   //En cas de no estar definit el TOKEN de Github redirecciona a token.php
    header("Location: token.php");
}
?>
