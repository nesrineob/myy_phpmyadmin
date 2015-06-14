<?php
	if (isset($_GET['id']) && $_GET['id'] == 1)
	{
?>
		<div class="nav-tabs-custom">

            <div class="tab-content">
                <div class="tab-pane" id="tab_1-1">
                    <?php include("../fonctions/tab_bd_struct.php"); ?>
                </div>

                <div class="tab-pane active" id="tab_2-2">
                    <?php include("../fonctions/tab_bd_sql.php"); ?>
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
                    <?php include("../fonctions/tab_bd_struct.php"); ?>
                </div>

                <div class="tab-pane" id="tab_2-2">
                    <?php include("../fonctions/tab_bd_sql.php"); ?>
                </div>
            </div>
        </div>
<?php
    }
        else if (isset($_GET['id']) && $_GET['id'] == 3)
    {
?>
        <div class="nav-tabs-custom">

            <div class="tab-content">
                <div class="tab-pane" id="tab_1-1">
                    <?php include("../fonctions/tab_bd_struct.php"); ?>
                </div>

                <div class="tab-pane" id="tab_2-2">
                    <?php include("../fonctions/tab_bd_sql.php"); ?>
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
                    <?php include("../fonctions/tab_bd_struct.php"); ?>
                </div>

                <div class="tab-pane" id="tab_2-2">
                    <?php include("../fonctions/tab_bd_sql.php"); ?>
                </div>
            </div>
        </div>
<?php
    }
    mysql_close();
?>

<script type="text/javascript">
    function drop(table, db) {
        if (confirm("Vous êtes sur le point de DÉTRUIRE une table au complet ! Voulez-vous vraiment exécuter «DROP TABLE " + table + "» ?")) {
            location.href = "../fonctions/delete.php?db=" + db + "&tab=" + table;
        }
    }

    function truncate(table, db) {
        if (confirm("Vous êtes sur le point de VIDER une table au complet ! Voulez-vous vraiment exécuter «TRUNCATE " + table + "» ?")) {
            location.href = "../fonctions/truncate.php?db=" + db + "&tab=" + table;
        }
    }
</script>
