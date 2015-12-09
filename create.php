<?php
require './api/global.php';
require './api/Controller.php';
$controller = new Controller();
if (isset($_REQUEST['name'])) {  //En cas de esta definit el parametre name
    $reponse = $controller->createRepository($_REQUEST['name'], $_REQUEST['private'], $_REQUEST['wiki'],$_REQUEST['desc'], $_REQUEST['download'], $_REQUEST['license']);   //Crida al metode crear 
}
include './tpl/header.php';
?>

<div id="login-overlay" class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Creació d'un nou repositori</h4>
        </div>
        <?php
        if (isset($reponse)) {
            if (isset($reponse->id)) {  //Mostra el resultat de l'acció si ha estat efectuada
                echo '<div style="margin:20px;" class="alert alert-success">Repositori creat amb exit!</div>';
            } else {
                echo '<div style="margin:20px;" class="alert alert-danger"><strong>Error!</strong> El repositori no s\'ha creat correctamente.</div>';
            }
        }
        ?>
        <div class="modal-body">
            <form id="registerForm" method="POST" >
                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">Nom</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="name" placeholder="Nom" required>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-3">
                        <label for="InputName">Visibilitat</label>
                        <div class="input-group">
                            <button type="button" id="btnPrivate">
                                <i  class="fa fa-2x fa-unlock"></i>
                            </button>
                            <input id="inputPrivate" type="hidden" class="form-control" name="private" value="false">
                        </div>
                    </div> 
                    <div class="col-xs-3">
                        <label for="InputName">Wiki</label>
                        <div class="input-group">
                            <button type="button" id="btnWiki">
                                <i  class="fa fa-2x fa-comments"></i>
                            </button>
                            <input id="inputWiki" type="hidden" class="form-control" name="wiki" value="true">
                        </div>
                    </div> 
                </div> 

                <div class="form-group"> 
                    <div class="col-xs-12">
                        <label for="InputEmail">Descripció</label>
                        <div class="textarea-form-control">
                            <textarea class="form-control" rows="3" name="desc"></textarea>
                        </div>
                        <br />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputStreetName">Llicència</label>
                        <select name="license" class="form-control">
                            <option value="apache">Apache</option>
                            <option value="glp">GPL</option>
                            <option value="mit">MIT</option>
                            <option value="mozilla">Mozilla</option>
                        </select>
                        <br /> 
                    </div> 
                    <div class="col-xs-6">
                        <label for="InputName">Descàrregues</label>
                        <div class="input-group">
                            <button type="button" id="btnDwn">
                                <i  class="fa fa-2x fa-download"></i>
                            </button>
                            <input id="inputDown" type="hidden" class="form-control" name="download" value="true">
                        </div>
                        <br /> 
                    </div> 
                </div>
                <div class="form-group">
                    <div class="input-group-addon">
                        <input type="submit" name="submit" id="submit" value="Crear" class="btn btn-success pull-right">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include './tpl/footer.php';
?>
