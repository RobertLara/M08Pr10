<?php
session_start();
if (isset($_SESSION['token'])) {    //En cas d'existir token redirecciona a l'index
    header("Location: index.php");
} else if (isset($_REQUEST['token']) && isset($_REQUEST['username']) && strlen($_REQUEST['token'])==40) {   //En cas de haber enviat un token i tindre una mida concreta
    $_SESSION['token'] = $_REQUEST['token'];    //Desem les dades
    $_SESSION['username'] = $_REQUEST['username'];  //Desem les dades
    header("Location: index.php");      //Redirecciona
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
            </div>           
            <br/><br/>
        </div>
    </div>
</div>
<?php
include './tpl/footer.php';
?>

