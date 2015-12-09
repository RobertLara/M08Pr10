<?php 
session_start();
session_destroy();  //Elimina la session
header("Location: token.php");  //Redirecciona a token
