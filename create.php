<?php
require './api/Controller.php';
$controller = new Controller();

include './tpl/header.php';
?>

<div id="login-overlay" class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Creació d'un nou repositori</h4>
        </div>

        <div class="modal-body">
            <form id="registerForm" method="POST" >
                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">Nom</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="first_name" placeholder="Nom" required>
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

                            <input type="hidden" class="form-control" name="private" required>
                        </div>
                    </div> 
                    <div class="col-xs-3">
                        <label for="InputName">Wiki</label>
                        <div class="input-group">
                            <button type="button" id="btnWiki">
                                <i  class="fa fa-2x fa-comments"></i>
                            </button>
                            <input type="hidden" class="form-control" name="wiki" required>
                        </div>
                    </div> 
                </div> 

                <div class="form-group"> 
                    <div class="col-xs-12">
                        <label for="InputEmail">Descripció</label>
                        <div class="textarea-form-control">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <br />
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputStreetName">Llicencia</label>
                        <select class="form-control">
                            <option>Apache</option>
                            <option>GPL</option>
                            <option>MIT</option>
                            <option>Mozilla</option>
                        </select>
                        <br /> 
                    </div> 
                    <div class="col-xs-6">
                        <label for="InputName">Descàrregues</label>
                        <div class="input-group">
                            <button type="button" id="btnDwn">
                                <i  class="fa fa-2x fa-download"></i>
                            </button>
                            <input type="hidden" class="form-control" name="download" required>
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
