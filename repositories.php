<?php

require './api/global.php';
require './api/Controller.php';
$controller = new Controller();
/* Repositoris */
$repositoris = $controller->getRepositories();
$nRepositoris = sizeof($repositoris);   //Obtenim el nombre de repositoris

if (isset($_REQUEST['repositori'])) {   //En cas d'indicar el parametre repositori
    $repositori = $controller->getRepositories($_REQUEST['repositori']);    //Obtenim el repositori
}
include './tpl/header.php'; //Capçalera estandard
include './tpl/repositories/header.php';    //Capçalera de repositoris

if (!isset($repositori) && $nRepositoris > 0) { //En cas de mostrar tots els repositoris
    $num = 0;
    echo '<div class="row top-buffer"><div class="panel-group" id="accordion">';
    echo '<div class="panel-left col-sm-6">';
    foreach ($repositoris as $record) {

        $lock = ($record->private) ? array("panel-warning", "fa-lock") : array("panel-success", "fa-unlock");   //Obtenim si es privat o no
        $panel = <<<XYZ
 
        <div class="panel $lock[0]" id="panel-$record->id">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" class="collapsed" data-target="#collapse-$record->id" 
                       href="#collapse-$record->id">
                        $record->name
                    </a>
                    <i class="fa $lock[1]"></i>
                </h4>
            </div>
            <div id="collapse-$record->id" class="panel-collapse collapse">
                <div class="panel-body">
                    <a href='repositories.php?repositori=$record->name' target='_self'><i class="fa fa-eye"></i> Veure més</a>   
                    <a class="pull-right" href='$record->html_url' target='_blank'><i class="fa fa-github"></i> Veure en Github</a> 
                </div>
            </div>
        </div>
XYZ;
        echo $panel;
        if (floor($nRepositoris / 2) == $num++) {   //Condicional per dividir en dues columnes
            echo '</div><div class="panel-left col-sm-6">';
        }
    }
    echo "</div></div></div>";
} else {    //En cas d'un repositori concret
    echo '<h2>README</h2><figure class = "highlight">' . $repositori[2] . '</figure >'; //Contingut README.MD
    include './tpl/commit/header.php';  //Capçalera commit
    foreach ($repositori[1] as $commit) {
        $date = $commit->commit->author->date;
        $date = substr($date, 0, -1);
        $date = str_replace("T", " ", $date);
        $msg = $commit->commit->message;
        $url = $commit->html_url;
        $name = $commit->commit->committer->name;

        include './tpl/commit/index.php';
    }
    include './tpl/commit/footer.php';
}

echo "</div>";

include './tpl/footer.php';
?>
