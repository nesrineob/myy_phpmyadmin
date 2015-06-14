<?php
    mysql_select_db ($_GET['db'], $link);
	if (isset($_GET['id']) && $_GET['id'] == 1)
	{
?>
		<div class="nav-tabs-custom">
            <div class="tab-content">
                <div class="tab-pane" id="tab_1-1">
                    <?php include("../fonctions/table_aff.php"); ?>
                </div>

                <div class="tab-pane" id="tab_4-4">
                    <?php include("../fonctions/table_insert.php"); ?>
                </div>

                <div class="tab-pane active" id="tab_2-2">
                    <?php include("../fonctions/table_struct.php"); ?>
                </div>
                
                <div class="tab-pane" id="tab_3-3">
                    <?php include("../fonctions/table_sql.php"); ?>
                </div>
            </div>
        </div>
<?php
    }
    else if (isset($_GET['id']) && $_GET['id'] == 2)
    {
?>
        <div class="nav-tabs-custom">

            <div class="tab-content">
                <div class="tab-pane" id="tab_1-1">
                    <?php include("../fonctions/table_aff.php"); ?>
                </div>

                <div class="tab-pane" id="tab_4-4">
                    <?php include("../fonctions/table_insert.php"); ?>
                </div>

                <div class="tab-pane" id="tab_2-2">
                    <?php include("../fonctions/table_struct.php"); ?>
                </div>
                
                <div class="tab-pane active" id="tab_3-3">
                    <?php include("../fonctions/table_sql.php"); ?>
                </div>
            </div>
        </div>
<?php
    }
    else  if (isset($_GET['id']) && $_GET['id'] == 3)
	{
?>
		<div class="nav-tabs-custom">

            <div class="tab-content">
                <div class="tab-pane" id="tab_1-1">
                    <?php include("../fonctions/table_aff.php"); ?>
                </div>

                <div class="tab-pane active" id="tab_4-4">
                    <?php include("../fonctions/table_insert.php"); ?>
                </div>

                <div class="tab-pane" id="tab_2-2">
                    <?php include("../fonctions/table_struct.php"); ?>
                </div>
                
                <div class="tab-pane" id="tab_3-3">
                    <?php include("../fonctions/table_sql.php"); ?>
                </div>
            </div>
        </div>
<?php
    }
    else  if (isset($_GET['id']) && $_GET['id'] == 4)
    {
?>
        <div class="nav-tabs-custom">

            <div class="tab-content">
                <div class="tab-pane" id="tab_1-1">
                    <?php include("../fonctions/table_aff.php"); ?>
                </div>

                <div class="tab-pane" id="tab_4-4">
                    <?php include("../fonctions/table_insert.php"); ?>
                </div>

                <div class="tab-pane" id="tab_2-2">
                    <?php include("../fonctions/table_struct.php"); ?>
                </div>
                
                <div class="tab-pane" id="tab_3-3">
                    <?php include("../fonctions/table_sql.php"); ?>
                </div>
            </div>
        </div>
<?php
    }

    else
    {
?>
        <div class="nav-tabs-custom">

            <div class="tab-content">
                <div class="tab-pane active" id="tab_1-1">
                    <?php include("../fonctions/table_aff.php"); ?>
                </div>

                <div class="tab-pane" id="tab_4-4">
                    <?php include("../fonctions/table_insert.php"); ?>
                </div>

                <div class="tab-pane" id="tab_2-2">
                    <?php include("../fonctions/table_struct.php"); ?>
                </div>
                
                <div class="tab-pane" id="tab_3-3">
                    <?php include("../fonctions/table_sql.php"); ?>
                </div>
            </div>
        </div>
<?php
    }
    mysql_close();
?>

<script type="text/javascript">
    function droptab(db, col, tab) {
        if (confirm("Etes vous sure de vouloir supprimer la colonne '" + col + "' ? Tous ses enregistrements séront également supprimer.")) {
            location.href = "../fonctions/delete.php?db=" + db + "&tab=" + tab + "&col=" + col;
        }
    }
</script>
