<?php
	if (isset($_GET['id']) && $_GET['id'] == 1)
	{
?>
		<div class="nav-tabs-custom">

            <div class="tab-content">
                <div class="tab-pane" id="tab_1-1">
                    <?php include("../fonctions/tab_bdall_aff.php"); ?>
                </div>

                <div class="tab-pane active" id="tab_2-2">
                     <?php include("../fonctions/tab_bdall_sql.php"); ?>
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
                    <?php include("../fonctions/tab_bdall_aff.php"); ?>
                </div>

                <div class="tab-pane" id="tab_2-2">
                     <?php include("../fonctions/tab_bdall_sql.php"); ?>
                </div>
            </div>
        </div>
<?php
    }
?>

