<link rel="stylesheet" type="text/css" href="../css/jquery.datetimepicker.css"/>
<style type="text/css">

.custom-date-style {
    background-color: red !important;
}

</style>
<?php
                if (!isset($qte_insert)) {
                    $qte_insert = 1;
                }
                if (isset($_POST["go"])) {
                    $qte_insert = $qte_insert + $_POST["it"];
                }else {
                    $qte_insert = 1;
                }
?>


<?php
    // script pour l'insertion  ------ --------
    
    if (isset($_POST["insert"])) {
        $err = 0;
        for ($i = 0; $i < $_GET["i_itt"]; $i++) {
            $sql = "DESC ".$_GET['tab'];
            $result = mysql_query($sql);
            $result1 = mysql_query($sql);
            $query = "INSERT INTO ".$_GET["tab"]." (";
            $valeurs = "";
            $rows = "";
            $j = 0;
            $len = 0;
            while (mysql_fetch_array($result1)) {
                $len++;
            }
            while ($row = mysql_fetch_array($result)) {
                $j++;
                if ($row['Extra'] == "auto_increment" && ($_POST[$i."value".$row['Field']] == "")) {

                }
                else { 
                    if ($j == $len) {
                        $rows .= $row['Field'];
                        if (preg_match_all("#(int|float|double|boolean|bit)#i", $row['Type'], $matches)) {
                            if ((isset($_POST[$i."champ_null_".$row['Field']]) && $_POST[$i."champ_null_".$row['Field']] == "on") && ($_POST[$i."value".$row['Field']] == "")){
                                $valeurs .= "NULL";
                            }
                            else{
                                $valeurs .= $_POST[$i."value".$row['Field']];
                            }
                        }
                        else{
                            if ((isset($_POST[$i."champ_null_".$row['Field']]) && $_POST[$i."champ_null_".$row['Field']] == "on") && ($_POST[$i."value".$row['Field']] == "")){
                                $valeurs .= "NULL";
                            }
                            else{
                                $valeurs .= "'".$_POST[$i."value".$row['Field']]."'";
                            }
                        }

                    }
                    else { 
                        $rows .= $row['Field'].",";
                        if (preg_match_all("#(int|float|double|boolean|bit)#i", $row['Type'], $matches)) {
                            if ((isset($_POST[$i."champ_null_".$row['Field']]) && $_POST[$i."champ_null_".$row['Field']] == "on") && ($_POST[$i."value".$row['Field']] == "")){
                                $valeurs .= "NULL,";
                            }
                            else{
                                $valeurs .= $_POST[$i."value".$row['Field']].",";
                            }
                        }
                        else{
                            if ((isset($_POST[$i."champ_null_".$row['Field']]) && $_POST[$i."champ_null_".$row['Field']] == "on") && ($_POST[$i."value".$row['Field']] == "")){
                                $valeurs .= "NULL,";
                            }
                            else{
                                $valeurs .= "'".$_POST[$i."value".$row['Field']]."',";
                            }
                        }
                    }
                }
            }
            $query .= $rows.") VALUES (".$valeurs.")";
            $result_insert = mysql_query($query, $link);
            if (!$result_insert) {
                $err++;
?>
                <div class="alert alert-danger alert-dismissable">
                        <i class="fa fa-ban"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b>Erreur !! </b>  <?php echo mysql_error(); ?>
                    </div>
                
<?php
            }
        }
        if (mysql_error() == "") {
             ?>
                    <div class="alert alert-success alert-dismissable">
                        <i class="fa fa-check"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b>Felicitation !!! </b>  
                        <?php 
                            $enr = $_GET["i_itt"] - $err;
                        echo $enr." Enregistrement(s) dans la table ".$_GET['tab']." à été effectuer avec succes"; ?>
                    </div>
<?php
        }
    }
?>


<section class="content">

    <form action="affiche.php?id=3&db=<?php echo $_GET['db'] ?>&tab=<?php echo $_GET['tab'] ?>&i_itt=<?php echo $qte_insert; ?>" method="post" class="form" enctype="multipart/form-data" id="form">
        <fieldset style = "border:radius 1px black;">
            <?php
                for ($i = 0; $i < $qte_insert; $i++) {
                $sql = "DESC ".$_GET['tab'];
                $result = mysql_query($sql);
                if (!$result) {
                    echo "Erreur DB, impossible de lister les enregistrements\n";
                    echo 'Erreur MySQL : ' . mysql_error();
                    exit;
                }
            ?>
                <div>
                <div class="box-body table-responsive">

                <table id="tab" class="table table-bordered table-hover">
                <thead>
                    <tr  style="text-align:center;">
                        <th>Colonne</th>
                        <th>Type</th>
                        <th>Null</th>
                        <th>Valeur</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    while ($row = mysql_fetch_array($result)) {
                ?>
                    <tr>
                <?php
                    echo '<td>'.$row['Field'].'</td>';
                    echo '<td>'.$row['Type'].'</td>';
                    if ($row['Null'] == 'YES') { 
                        echo '<td>';
                ?>
                    <div class="checkbox">
                        <label><input name="<?php echo $i; ?>champ_null_<?php echo $row['Field']; ?>" type="checkbox" checked/></label>                                                
                    </div>
                <?php
                        echo '</td>';
                    } 
                    else {
                        echo '<td>';
                ?>
                    <div class="checkbox">
                        <label><input name="<?php echo $i; ?>champ_null_<?php echo $row['Field']; ?>" type="checkbox" disabled/></label>                                                
                    </div>
                <?php
                        echo '</td>';
                    }
                    echo '<td>';
                    if (preg_match_all("#(int|bit|boolean)#i", $row['Type'], $matches)){

                ?>
                    <input type="number" name="<?php echo $i; ?>value<?php echo $row['Field']; ?>" class="form-control" min="0" />
                <?php
                    }
                    else if (preg_match_all("#(char|text|varchar|varbinary)#i", $row['Type'], $matches)) {

                ?>
                        <textarea name="<?php echo $i; ?>value<?php echo $row['Field']; ?>" class="form-control" rows="1"></textarea>
                <?php
                    }
                    else if (preg_match_all("#(date|datetime|timespan)#i", $row['Type'], $matches)) {
                ?>
                    <div class="input-append">
                        <input name="<?php echo $i; ?>value<?php echo $row['Field']; ?>" type="text" class="datetimepicker"/>
                        <span class="add-on"><i class="fa fa-clock-o"></i>
                        </span>
                    </div>
                    
                <?php
                    }
                    else {
                ?>
                    <input type="text" name="<?php echo $i; ?>value<?php echo $row['Field']; ?>" class="form-control" />
                <?php
                    }
                    echo '</td>';
                ?>
                    </tr>
                <?php
                    } // end of the while that goes through every columns
                    mysql_free_result($result); // I free the ressource of the sql executed above.
                ?>
            </tbody>
        </table> <!-- end of table -->
    </div><!-- /.box-body -->
</div><!-- /.box -->
        <?php } ?> <!-- end of for : determines the values to be inserted inside the db-->

            <div class="form-group" style="vertical-align:middle;"> <!-- insert button for the formular to insert the different values inside the table -->
                <button type="submit" name = "insert" class="btn bg-default" style="width:100px;float: right;">Exécuter</button>
            </div><br><br>
        Continuer l'insertion avec <input type="text" name="it" style="width:30px;" value="1" min="0" /> lignes
        <input type="image" src="../images/ajout.png" name = "go" value="submit">

        </fieldset>
    </form>
    <br>
</section>
        <script src="../js/plugins/daterangepicker/jquery.js"></script>
        <script src="../js/plugins/daterangepicker/jquery.datetimepicker.js"></script>

<script>
$('.datetimepicker').datetimepicker({
    lang:'fr',
    timepicker:false,
    format:'Y/m/d',
    formatDate:'Y/m/d'
});
</script>

