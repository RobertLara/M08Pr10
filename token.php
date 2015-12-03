<?php
//require './api/global.php';
session_start();
if (isset($_SESSION['token'])) {
    header("Location: index.php");
} else if (isset($_REQUEST['token']) && isset($_REQUEST['username']) && strlen($_REQUEST['token'])==40) {
    $_SESSION['token'] = $_REQUEST['token'];
    $_SESSION['username'] = $_REQUEST['username'];
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
                        <h4 class="form-signin-heading">Indica el nom d'usuari</h4>
                        <input type="text" class="form-control" name="username" id="loginUser" required autofocus>
                        <br />
                        <h4 class="form-signin-heading">Indica el token</h4>
                        <input type="text" class="form-control" name="token" id="loginToken" required>
                        <br />
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Enviar Token</button>
                    </form>
                </div>
                <div class="row">
                    <br/><div class="alert alert-info">
                        <strong>Utilitza el meu</strong> 93413c63eabe74b75a6c1029b844b156eb6190df
                    </div>
                </div>
            </div>           
            <br/><br/>
        </div>
    </div>
</div>
<?php
include './tpl/footer.php';
?>

