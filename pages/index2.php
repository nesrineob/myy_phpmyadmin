<!DOCTYPE html>
<?php
	session_start();
	if (isset($_SESSION['user']))
	{
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>index2</title>
        <!-- bootstrap 3.0.2 -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="../css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../css/Mon_style.css" rel="stylesheet" type="text/css" />
    </head>
    <body class="skin-blue">

        <?php include("../fonctions/top-bar.php");?>

        <div class="wrapper row-offcanvas row-offcanvas-left">

            <?php include("../fonctions/side-bar.php");?>

            <aside class="right-side">                

                <section class="content-header">

                    <a href = "../pages/database.php"  style="color:white;">
                    <button type="button" class="btn btn-primary">Base de données <span class="badge"><img src="../images/bd2.png"></span></button>
                    </a>
                 
                <a href = "../pages/database.php?id=1" style="color:white;">
                 <button type="button" class="btn btn-danger">SQL <span class="badge"><img src="../images/sql.png"></span></button>
                </a>

                     <ol class="breadcrumb">
                    </ol>
                </section>
                <br>
                <!-- Main content -->

					<div class="row">
                        <div class="col-md-6">
                            <div class="box box-solid">
                                <div class="box-header">
                                    <h3 class="box-title">Paramètres généraux</h3>
                                </div>
                                <div class="box-body">
                                    <ul>
                                        <li>Interclassement pour la connexion au serveur
                                            <a href ="http://dev.mysql.com/doc/refman/5.6/en/charset-connection.html"><img src ="../images/ques1.png"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
						<div class="col-md-6">
                            <div class="box box-solid">
                                <div class="box-header">
                                    <h3 class="box-title">Serveur de Base de Donnees</h3>
                                </div>
                                <div class="box-body">
                                    <ul>
                                        <li><dt>Serveur: localhost via TCP/IP</dt></li>
                                        <li><dt>Type de serveur: MySQL</dt></li>
                                        <li><dt>Version du serveur: 5.6.12-log - MySQL Community Server (GPL)</dt></li>
                                        <li><dt>Version du protocole: 10</dt></li>
                                        <li><dt>Utilisateur: <?php echo $_SESSION['user']; ?>@localhost</dt></li>
                                        <li><dt>Jeu de caractères du serveur: UTF-8 Unicode (utf8)</dt></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
					
					<div class="row">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                            <div class="box box-solid">
                                <div class="box-header">
                                    <h3 class="box-title">Serveur Web</h3>
                                </div>
                                <div class="box-body">
                                    <ul>
                                        <li><dt>Apache/2.4.4 (Win64) PHP/5.4.12</dt></li>
                                        <li><dt>Version du client de base de données: libmysql - mysqlnd 5.0.10 - 20111026 - $Id: e707c415db32080b3752b232487a435ee0372157 $
                                        </dt></li>
                                        <li><dt>Extension PHP: mysqli <a href ="http://php.net/manual/fr/book.mysqli.php"><img src ="../images/ques1.png"></a></dt></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-6">
                            <div class="box box-solid">
                                <div class="box-header">
                                    <h3 class="box-title">My_PhpmyAdmin</h3>
                                </div>
                                <div class="box-body">
                                    <ul>
                                        <li><dt>Version: 4.0.4, dernière version stable : 4.4.7</dt></li>
                                        <li><a href = "http://localhost/phpmyadmin/doc/html/index.html">Documentation</a></li>
                                        <li><a href = "http://wiki.phpmyadmin.net/pma/Welcome_to_phpMyAdmin_Wiki">Wiki</a></li>
                                        <li><a href = "http://www.phpmyadmin.net/home_page/index.php">Site officiel</a></li>
                                        <li><a href = "http://www.phpmyadmin.net/home_page/improve.php">Contribuer</a></li>
                                        <li><a href = "http://www.phpmyadmin.net/home_page/support.php">Obtenir de l'aide</a></li>
                                        <li><a href = "http://localhost/phpmyadmin/changelog.php">Liste des changements</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
            </aside>
        </div>


        <!-- jQuery 2.0.2 -->
        <script src="../js/jquery-2.1.1.js"></script>
        <!-- Bootstrap -->
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Mon_style App -->
        <script src="../js/Mon_style/app.js" type="text/javascript"></script>

    </body>
</html>
<?php
	}
	else
	{
		header('Location: ../pages/index.php');
	}
?>