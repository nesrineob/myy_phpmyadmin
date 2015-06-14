<section class="content">
                                        <form action="database.php?id=1" method="post" class="form" enctype="multipart/form-data" id="form">
                                            <fieldset style = "border:radius 1px black;">
                                        <a href ="http://dev.mysql.com/doc/refman/5.6/en/select.html">
                                            <legend>Exécuter une ou des requêtes SQL sur le serveur "localhost":
                                            <img src="../images/ques1.png">
                                        </legend></a>
                                            <div class="form-group" style="vertical-align:middle;">
                                                <textarea name = "txt_query" cols = "160px" rows = "10px"></textarea><br><br>
                                                <input type="image" src="../images/save.png" value="submit" name = "launch_sql" style="float: right; margin-right:105px;">
                                            </div>  
                                        </fieldset>                                         
                                        </form>
                                        <br><br>
                                        <?php
                                            if (isset($_POST['launch_sql']))
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