<!DOCTYPE html>
<?php
	session_start();
    $link = mysql_connect ($_SESSION['server'],$_SESSION['user'], $_SESSION['password']) or die ('Erreur : '.mysql_error() );
    $_SESSION['db'] = $_GET['db'];
    if (isset($_SESSION['user']))
	{
?>
<html>
    <head>
        <meta charset="UTF-8"> 
        <title>Create_table</title>
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
            if (isset($_POST['col_num'])) { 
                $_SESSION['num'] = $_POST['col_num'];
                $_SESSION['table_name'] = $_POST['table_name'];
            }
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
                        <li><a href="../pages/database.php"> Bases de donnees</a></li>
                        <li><a href="../pages/data_base.php?db=<?php echo $_GET['db']; ?>"><?php echo $_GET['db']; ?></a></li>
                        <li class="active"><?php echo $_SESSION['table_name']; ?></li>

                        <?php
                            echo' <a href="../pages/data_base.php?id=1&db='.$_GET["db"].'&tab='.$row[0].'"><img src="../images/sql.png" style="width: 25px;float: right;"></img></a>';
                        ?>
                    </ol>
                <br>
            <div class="row">
                <div class="col-md-12">
                <form action="#" method="post" class="form" enctype="multipart/form-data" id="form">
                    
                Nom de la table: <input type="text" name="champ_name" style="width:300px;" value="<?php echo $_SESSION['table_name']; ?>"/>&nbsp&nbsp&nbsp
                    Ajouter <input type="text" name="num" min="1" style="width:30px;" value="1"/> colonne(s)
                    <input type ="image" src ="../images/save.png" value="submit" name = "add_col">
                </form>
                </div>
            </div>
        <section class="content">
            <div class="row">

                <div class="col-md-12" style="text-align:center;">
                    <h5><strong>Structure</strong> <a href="http://dev.mysql.com/doc/refman/5.6/en/create-table.html"><img src="../images/ques1.png"></a></h5>

                </div>
            </div>
            <div class="row" style="text-align:center;">

                <div class="col-md-4">
                    <strong style="float: left;">Nom</strong>
                </div>
                <div class="col-md-2">
                    <strong style="float: left;">Type <a href="http://dev.mysql.com/doc/refman/5.6/en/data-types.html"><img src="../images/ques1.png"></a></strong>
                </div>
                <div class="col-md-2">
                    <strong style="float: left;"> Taille/Valeurs* <a href="#"><img src="../images/ques1.png"></a></strong>
                </div>
                <div class="col-md-1">
                   <strong style="float: left;"> P-k </strong>
                </div>
                <div class="col-md-1">
                   <strong style="float: left;"> Null </strong>
                </div>
                <div class="col-md-2">
                   <strong style="float: left;"> A-I </strong>
                </div>
            </div>
        </section>
        <form action="../fonctions/create_db.php" method="post" class="form" enctype="multipart/form-data" id="form"> 
        <section class="content">
             
<?php 
if (isset($_POST['num'])) {
    $_SESSION['num'] += $_POST['num'];
}

for ($i = 0; $i < $_SESSION['num']; $i++) { ?>
            <div class="row" style="text-align:center;">

                <div class="col-md-4">
                    <input type="text" name="champ_name<?php echo $i; ?>" style="width:300px;"/>
                </div>
                <div class="col-md-2">
                    <select class="form-control" name="champ_type<?php echo $i; ?>" style="width:150px;">
                        <option value="INT">INT</option>
                        <option value="DECIMAL">DECIMAL</option>
                        <option value="DOUBLE">DOUBLE</option>
                        <option value="FLOAT">FLOAT</option>
                        <option value="CHAR">CHAR</option>
                        <option value="VARCHAR">VARCHAR</option>
                        <option value="TEXT">TEXT</option>
                        <option value="BIT">BIT</option>
                        <option value="BOOLEAN">BOOLEAN</option>
                        <option value="DATE">DATE</option>
                        <option value="DATETIME">DATETIME</option>
                        <option value="TIMESPAN">TIMESPAN</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <input type="text" name="champ_longueur<?php echo $i; ?>" style="width:150px;"/>
                </div>
                <div class="col-md-1">
                    <div class="radio">
                        <label>
                            <input type="radio" name="champ_pk" id="champ_pk<?php echo $i; ?>" value="champ_pk<?php echo $i; ?>">
                        </label>
                    </div>
                </div>
                <div class="col-md-1">
                     <div class="checkbox">
                        <label><input name="champ_null<?php echo $i; ?>" type="checkbox"/></label>                                                
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="checkbox">
                        <label><input name="champ_AI<?php echo $i; ?>" type="checkbox"/></label>                                                
                    </div>
                </div>
            </div>
            <br>
<?php } ?>
        </section>
             <div class="row">

                <div class="col-md-12" >
                    <input type="image" src ="../images/sauvegarder.png" value ="submit" name = "creer_table" style="float: right;margin-right:40px;">
                </div>
            </div>              

                <!-- Main content -->
            </aside>
        </div>
    </form> 

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