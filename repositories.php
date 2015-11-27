<?php

//require './api/Curl.php';
require './api/Controller.php';
$controller = new Controller();
/* Repositoris */
$repositoris = $controller->getRepositories();
$nRepositoris = sizeof($repositoris); 

if(isset($_REQUEST['repositori'])){
    $repositori = $controller->getRepositories($_REQUEST['repositori']);
}
include './tpl/header.php';
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Informació General</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">6</div>
                            <div>FOLLOWERS</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">Veure detalls</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-archive fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php if($nRepositoris>0) echo $nRepositoris; else echo "0"; ?></div>
                            <div>Repositoris</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">Veure detalls</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">4</div>
                            <div>FOLLOWING</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">Veure detalls</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-code-fork fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">11</div>
                            <div>Dies de contribució</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">Veure detalls</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <?php
    if (!isset($repositori) && $nRepositoris > 0) {
        $num = 0;
        echo '<div class="panel-group" id="accordion">';
        echo '<div class="panel-left col-sm-6">';
        foreach ($repositoris as $record) {

            //var_dump($record);
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
        echo "</div></div>";
    }else{
        //var_dump($repositori);
        echo $controller->getReadme('legomushroom','mojs' );
    }
    ?>
</div>

<?php
include './tpl/footer.php';
?>