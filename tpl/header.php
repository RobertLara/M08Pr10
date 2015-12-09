<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>GITHUB API</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="css/sb-admin-2.css" rel="stylesheet" type="text/css">
        <link href="css/custom.css" rel="stylesheet" type="text/css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">GITHUB API</a>
                </div>

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> INFORMACIÓ GENERAL</a>
                            </li>
                            <li>
                                <a href="repositories.php"><i class="fa fa-folder-open fa-fw"></i> REPOSITORIS</a>
                            </li>
                            <li>
                                <a href="create.php"><i class="fa fa-plus-square fa-fw"></i> CREAR REPOSITORIS</a>
                            </li>
                            <li>
                                <a href="delete.php"><i class="fa fa-trash fa-fw"></i> ELIMINAR REPOSITORIS</a>
                            </li>
                            <li>
                                <a href="gists.php"><i class="fa fa-github-square fa-fw"></i> CREAR GISTS</a>
                            </li>
                            <?php 
                            
                            if(isset($_SESSION['token']) || isset($_SESSION['username'])){  //En cas de tenir token definit es pot tancar sessió
                                echo '<li>
                                        <a href="clear.php"><i class="fa fa-sign-out fa-fw"></i> TANCAR SESSIÓ</a>
                                    </li>';
                            }
                            
                            ?>
                        </ul>
                    </div>
                </div>
            </nav>
