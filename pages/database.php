<!DOCTYPE html>
<?php
	session_start();
	if (isset($_SESSION['user']))
	{
?>
<html>
    <head>
        <meta charset="UTF-8"> 
        <title>Database</title>
        <!-- bootstrap 3.0.2 -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="../css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../css/Mon_style.css" rel="stylesheet" type="text/css" />

    </head>
    <body class="skin-blue"  onLoad="window.setTimeout('getSecs()',1)">
        <?php 
        	include("../fonctions/top-bar.php");
        ?>
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
                </section>
                <ol class="breadcrumb">
                        <li><a href="../pages/index2.php"><img src="../images/localhost.png"> localhost</a></li>
                        <li class="active"><a href="#"> Bases de données</a></li>
                </ol>
                            <?php include("../fonctions/tab_bdall.php");?>
                            
					
                <!-- Main content -->
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