<section class="content">
                                        <form action="data_base.php?id=1&db=<?php echo $_GET['db'] ?>" method="post" class="form" enctype="multipart/form-data" id="form">
                                            <fieldset style = "border:radius 1px black;">
                                        <legend>Exécuter une ou des requêtes SQL sur la base <?php $_GET['db'] ?></legend>
                                            <div class="form-group" style="vertical-align:middle;">
                                                <textarea name = "txt_query" cols = "160px" rows = "10px"></textarea><br><br>
                                                <input type="image" src="../images/save.png" value="submit" name = "launch_sqlbd" style="float: right;margin-right: 90px;">
                                            </div>  
                                        </fieldset>                                         
                                        </form>
                                        <br><br>
                                        <?php
                                            if (isset($_POST['launch_sqlbd']))
                                            {
                                                $result = mysql_query($_POST['txt_query'], $link);
                                        ?>
                                        <div class="box">
                                <div class="box-body table-responsive">
                                                <?php include("../pages/tab_bdall.php");
                                            } ?>
                                </div>
                            </div>
</section>