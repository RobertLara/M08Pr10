<?php
require './api/global.php';
require './api/Controller.php';
$controller = new Controller();
include './tpl/header.php';

$userData = $controller->getUserData(); //Desem les dades del usuari
$notifications = $controller->getNotifications();   //Obtenim les notificacións de l'usuari
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
                            <div class="huge"><?php     //Mostrem els seguidors
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
                                    echo ($userData->public_repos + $userData->plan->private_repos);
                                else
                                    echo "0";
                                ?></div>
                            <div>REPOSITORIS</div>
                        </div>
                    </div>
                </div>
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
                            <div class="huge"><?php //Usuaris que segueixo
                                if ($userData->following > 0)
                                    echo $userData->following;
                                else
                                    echo "0";
                                ?></div>
                            <div>FOLLOWING</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-bell fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                                <?php echo sizeof($notifications); ?>   <!-- Mostra el numero de notificacions-->
                            </div>
                            <div>NOTIFICACIONS</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <figure class = "highlight">
                <img src="<?php echo $userData->avatar_url; ?>" class="img-responsive"alt="user-img" /> <!-- Mostra l'imatge de l'usuari-->
            </figure >
        </div>
        <div class="col-lg-9">
            <ul>              <!-- Mostra les dades d'usuari (És posible que hi hagui camps buits per no estar informats)-->
                <li><b>Nom: </b><?php echo $userData->name; ?></li>
                <li><b>Nom d'usuari: </b><?php echo $userData->login; ?></li>
                <li><b>Usuari des de: </b><?php echo $userData->created_at; ?></li>
                <li><b>Adreça electrònica: </b><?php echo $userData->email; ?></li>
                <li><b>Localització: </b><?php echo $userData->location; ?></li>
                <li><b>Enllaç: </b><?php echo $userData->url; ?></li>
            </ul>
        </div>
    </div>
</div>
<?php
include './tpl/footer.php';
?>
