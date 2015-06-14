<section class="content">
<?php
                            $sql = "DESC ".$_GET['tab'];
                            $result = mysql_query($sql);
                            if (!$result) {
                               echo "Erreur DB, impossible de lister les enregistrements\n";
                               echo 'Erreur MySQL : ' . mysql_error();
                               exit;
                            }
                            $tab_title = array_keys(mysql_fetch_array(mysql_query($sql)));
                        ?>
                        <div>
                            <div class="box-body table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr  style="text-align:center;">
                                            <th>Nom</th>
                                            <th>Type</th>
                                            <th>Null</th>
                                            <th>Key</th>
                                            <th>Default</th>
                                            <th>Extra</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        while ($row = mysql_fetch_array($result)) {
                                    ?>
                                            <tr>
                                    <?php
                                            for ($j = 1; isset($tab_title[$j]); $j+=2)
                                            {
                                                echo '<td><a href="../pages/affiche.php?db='.$_GET["db"].'&tab='.$_GET["tab"].'&col='.$row[$tab_title[$j]].'">'.$row[$tab_title[$j]].'</a></td>';
                                            }
                                            echo ' <td><a href="../pages/affiche.php?id=3&db='.$_GET["db"].'&tab='.$_GET["tab"].'&col='.$row[0].'"><img src="../images/insert.png"> Insérer </a>';
                                            echo ' <a href="../fonctions/modifier.php?db='.$_GET["db"].'&tab='.$_GET["tab"].'&col='.$row[0].'"><img src="../images/modifier.png"> Modifier </a>';
                                            echo ' <a href="#" onclick="droptab(\''.$_GET["db"].'\', \''.$row[0].'\', \''.$_GET["tab"].'\');"><img src="../images/delete.png"> Supprimer </a></td>';
                                    ?>
                                    </tr>
                                    <?php
                                        }
                                        mysql_free_result($result);
                                    ?>
                                    </tbody>
                                </table>
    </div>
</div>
</section>