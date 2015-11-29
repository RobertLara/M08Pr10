<?php

require './api/Controller.php';
$controller = new Controller();
/* Repositoris */
$repositoris = $controller->getRepositories();
$nRepositoris = sizeof($repositoris);

if (isset($_REQUEST['repositori'])) {
    $repositori = $controller->getRepositories($_REQUEST['repositori']);
}
include './tpl/header.php';
include './tpl/repositories/header.php';

if (!isset($repositori) && $nRepositoris > 0) {
    $num = 0;
    echo '<div class="row top-buffer"><div class="panel-group" id="accordion">';
    echo '<div class="panel-left col-sm-6">';
    foreach ($repositoris as $record) {

        $lock = ($record->private) ? array("panel-warning", "fa-lock") : array("panel-success", "fa-unlock");
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
                    <a href='#' target='_blank'><i class="fa fa-eye"></i> Veure més</a>   
                    <a class="pull-right" href='$record->html_url' target='_blank'><i class="fa fa-github"></i> Veure en Github</a> 
                </div>
            </div>
        </div>
XYZ;
        echo $panel;
        if (floor($nRepositoris / 2) == $num++) {
            echo '</div><div class="panel-left col-sm-6">';
        }
    }
    echo "</div></div></div>";
} else {
    echo '<h2>README</h2><figure class = "highlight">' . $repositori[2] . '</figure >';
    include './tpl/commit/header.php';
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