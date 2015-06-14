<section class="content">
                        <?php
                            $sql = "SHOW TABLES FROM ".$_GET['db'];
                            $result = mysql_query($sql);
                            $i = 0;
                            if (!$result) {
                               echo "Erreur DB, impossible de lister les tables\n";
                               echo 'Erreur MySQL : ' . mysql_error();
                               exit;
                            }
                            $result_table = mysql_query($sql);
                            while (mysql_fetch_row($result_table)) {
                               $i++;
                            }
                            if ($i != 0)
                            {

                        ?>
                        <div >
                            <div class="box-body table-responsive">
                                <table id="db_mysql3" class="table table-bordered table-hover">
                                    <thead>
                                        <tr  style="text-align:center; font-size:20px;">
                                            <th><h5><strong>Table</strong></h5></th>
                                            <th><h5><strong>Action</strong></h5></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        while ($row = mysql_fetch_row($result)) {
                                            echo '<tr><td><a href="../pages/affiche.php?db='.$_GET["db"].'&tab='.$row[0].'">'.$row[0].'</a></td>';
                                            echo '<td><a href="../pages/affiche.php?db='.$_GET["db"].'&tab='.$row[0].'"> <img src ="../images/affiche.png"> Afficher </a>';
                                            echo '<a href="../pages/affiche.php?id=1&db='.$_GET["db"].'&tab='.$row[0].'"> <img src ="../images/structure.png"> Structure </a>';
                                            echo '<a href="../pages/affiche.php?id=1&db='.$_GET["db"].'&tab='.$row[0].'"> <img src ="../images/modifier.png"> Modifier </a>';
                                            echo '<a href="../pages/affiche.php?id=3&db='.$_GET["db"].'&tab='.$row[0].'"> <img src ="../images/insert.png"> Insérer </a>';
                                            echo '<a href="#" onclick="truncate(\''.$row[0].'\', \''.$_GET["db"].'\');"> <img src ="../images/vide.png"> Vider </a>';
                                            echo '<a href="#" onclick="drop(\''.$row[0].'\', \''.$_GET["db"].'\');"><img src ="../images/delete.png">Supprimer </a></td></tr>';
                                        }
                                        mysql_free_result($result);
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                        <br> <img src="../images/icon.png">Nouvelle table<br>
                        <form action="../pages/create_tab.php?db=<?php echo $_GET['db'] ?>" method="post" class="form" enctype="multipart/form-data" id="form">
                            <div class="form-group" style="vertical-align:middle;">
                                    Name: <input type="text" name="table_name" style="width:300px;" required/>
                                    Nombre de colonnes: <input type="text" name="col_num" style="width:50px;" min="1" required/><br><br>
                                    <button type="submit" name = "creer_table" class="btn bg-default" style="width:100px; float: right; ">Exécuter </button>
                                </div>                                                              
                            </form>
</section>