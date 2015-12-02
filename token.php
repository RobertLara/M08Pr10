<?php

//require './api/global.php';
session_start();
if (isset($_SESSION['token'])) {
    header("Location: index.php");
}else if(isset ($_REQUEST['token'])){
    $_SESSION['token'] = $_REQUEST['token'];
    header("Location: index.php");
}

require './api/Controller.php';
$controller = new Controller();
include './tpl/header.php';
?>

<div id="page-wrapper">
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Definir Token</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="row">
                <div id="formContainer">
                    <form class="form-signin" method="post" action="token.php" id="login">
                        <h3 class="form-signin-heading">Indica el token</h3>
                        <a href="#" id="flipToRecover" class="flipLink">
                            <div id="triangle-topright"></div>
                        </a>
                        <input type="text" class="form-control" name="token" id="loginEmail" required autofocus>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Enviar Token</button>
                    </form>
                </div>
            </div>           
            <br/><br/>
        </div>
    </div>
</div>
<?php
include './tpl/footer.php';
?>

