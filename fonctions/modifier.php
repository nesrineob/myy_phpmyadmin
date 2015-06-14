<!DOCTYPE html>
<?php
    session_start();
    $link = mysql_connect ($_SESSION['server'],$_SESSION['user'], $_SESSION['password']) or die ('Erreur : '.mysql_error() );
    $_SESSION['db'] = $_GET['db'];
    mysql_select_db ($_GET['db'], $link);
    if (isset($_SESSION['user']))
	{
?>
<html>
    <head>
        <meta charset="UTF-8"> 
        <title>Modifier colonne - my_php_MyAdmin</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'> <!-- layout -->
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
                        <li><a href="../pages/database.php"> Bases de donnees</a></li>
                        <li><a href="../pages/data_base.php?db=<?php echo $_GET['db']; ?>"><?php echo $_GET['db']; ?></a></li>
                        <li class="active"><?php echo $_GET['tab']; ?></li>
                    </ol>
                <br>
                            <section class="content">
            <div class="row">
                <div class="col-md-12" style="text-align:center;">
                    <h5><strong>Structure</strong> <a href="http://dev.mysql.com/doc/refman/5.6/en/create-table.html"><img src="../images/ques1.png"></a></h5>

                </div>
            </div style="border:10px;">
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


<?php
    $sql = "DESC ".$_GET['tab'];
    $result = mysql_query($sql);
    if (!$result) {
        echo "Erreur DB, impossible de lister les enregistrements\n";
        echo 'Erreur MySQL : ' . mysql_error();
        exit;
    }
    $tab_title = array_keys(mysql_fetch_array(mysql_query($sql)));
    while ($row = mysql_fetch_array($result)) {
        if ($row[0] == $_GET['col']) {
?>

        <form action="../fonctions/create_db.php?db=<?php echo $_GET["db"]; ?>&tab=<?php echo $_GET["tab"]; ?>&col=<?php echo $row[0]; ?>" method="post" class="form" enctype="multipart/form-data" id="form"> 
        <section class="content">
            <div class="row" style="text-align:center;">
                <div class="col-md-4">
                    <input type="text" value="<?php echo $row[0]; ?>" name="champ_name" style="width:300px;"/>
                </div>
                <?php if (preg_match_all("#(\w+)\((\d+)\)#i", $row[1], $matches)) { ?>
                <div class="col-md-2">
                    <select class="form-control" name="champ_type" style="width:150px;">
                        <option value="<?php echo $matches[1][0]; ?>"><?php echo $matches[1][0]; ?></option>
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
                    <input type="text" value="<?php echo $matches[2][0]; ?>" name="champ_longueur" style="width:150px;"/>
                </div>
                <?php }
                else {  ?>

                    <div class="col-md-2">
                    <select class="form-control" name="champ_type" style="width:150px;">
                        <option value="<?php echo $row[1]; ?>">$row[1]</option>
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
                    <input type="text" name="champ_longueur" style="width:150px; border-radius:5px;"/>
                </div>

                <?php } ?>
                <div class="col-md-1">
                <?php if ($row[3] == "PRI") {?>    
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" checked disabled/>
                        </label>
                    </div>
                <?php } else { ?>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="champ_pk" />
                        </label>
                    </div>
                <?php } ?>
                </div>
                <div class="col-md-1">
                    <?php if ($row[2] == "YES") {?>
                     <div class="checkbox">
                        <label><input name="champ_null" type="checkbox" checked/></label>                                                
                    </div>
                    <?php } else { ?>
                    <div class="checkbox">
                        <label><input name="champ_null" type="checkbox"/></label>                                                
                    </div>
                    <?php } ?>
                </div>
                <div class="col-md-2">
                    <?php if ($row[5] == "auto_increment") {?>
                    <div class="checkbox">
                        <label><input name="champ_AI" type="checkbox" checked/></label>                                                
                    </div>
                    <?php } else { ?>
                    <div class="checkbox">
                        <label><input name="champ_AI" type="checkbox"/></label>                                                
                    </div>
                    <?php } ?>
                </div>
            </div>
            <br>
        </section>
             <div class="row">
                <div class="col-md-12">
                    <input type="image" src ="../images/sauvegarder.png" value ="submit" name = "edit_table" style="float: right;margin-right:40px;">
                </div>
            </div>              
                <!-- Main content -->
            </aside>
        </div>
    </form> 
<?php
            }
        }
        mysql_free_result($result);
?>
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
		header('Location: ../pages/index2.php');
	}
?>