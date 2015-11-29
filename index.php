<?php
require './api/Controller.php';
$controller = new Controller();
include './tpl/header.php';

$userData = $controller->getUserData();
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
                            <div class="huge"><?php
                                if ($userData->followers > 0)
                                    echo $userData->followers;
                                else
                                    echo "0";
                                ?>
                            </div>
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
                            <div class="huge"><?php
                                if (isset($userData->public_repos) && isset($userData->plan->private_repos))
                                    echo ($userData->public_repos+$userData->plan->private_repos);
                                else
                                    echo "0";
                                ?></div>
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
                            <div class="huge"><?php
                                if ($userData->following > 0)
                                    echo $userData->following;
                                else
                                    echo "0";
                                ?></div>
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
    <div class="row">
        <div class="col-lg-3">
            <figure class = "highlight">
                <img src="<?php echo $userData->avatar_url;?>" class="img-responsive"alt="user-img" />
            </figure >
        </div>
        <div class="col-lg-9">
            <ul>              
                <li>Nom: <?php echo $userData->name; ?></li>
                <li>Nom d'usuari: <?php echo $userData->login; ?></li>
                <li>Usuari desde: <?php echo $userData->created_at; ?></li>
                <li>Adreça electronica: <?php echo $userData->email; ?></li>
                <li>Localització: <?php echo $userData->location; ?></li>
                <li>Enllaç <?php echo $userData->url; ?></li>
            </ul>
        </div>
    </div>
</div>
<?php
include './tpl/footer.php';
?>
