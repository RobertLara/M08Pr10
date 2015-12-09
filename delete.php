<?php
require './api/global.php';
require './api/Controller.php';
$controller = new Controller();
if (isset($_REQUEST['name'])) {     //En cas de esta definit el parametre name
    $response = $controller->deleteRepository($_REQUEST['name']);   //Crida al metode esborrar repositori
}
include './tpl/header.php';
?>

<div id="login-overlay" class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Eliminar un repositori</h4>
        </div>
        <?php
        if (isset($_REQUEST['name']) && $response == null) {    //Mostra el resultat de l'acció si ha estat efectuada
            echo '<div style="margin:20px;" class="alert alert-success">Repositori eliminat amb exit!</div>';
        } else if(isset($_REQUEST['name'])) {
            echo '<div style="margin:20px;" class="alert alert-danger"><strong>Error!</strong> El repositori indicat no s\'ha pugut eliminar.</div>';
        }
        ?>
        <div class="modal-body">
            <form id="registerForm" method="POST" >
                <div class="row">
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="InputName">Nom</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="name" placeholder="Nom" required>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <input type="submit" name="submit" id="submit" value="Eliminar" class="btn btn-success pull-right">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include './tpl/footer.php';
?>

