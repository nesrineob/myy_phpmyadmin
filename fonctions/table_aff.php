<section class="content">
                        <?php
                            $sql = "SELECT * FROM ".$_GET['tab'];
                            $result = mysql_query($sql);
                            $i = 0;
                            if (!$result) {
                               echo "Erreur DB, impossible de lister les enregistrements\n";
                               echo 'Erreur MySQL : ' . mysql_error();
                               exit;
                            }
                            $result_table = mysql_query($sql);
                            while ($row = mysql_fetch_array($result_table)) {
                               $i++;
                            }
                            if ($i != 0)
                            {
                                $tab_title = array_keys(mysql_fetch_array(mysql_query($sql)));
                        ?>
                        <div>
                            <div class="box-body table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr  style="text-align:center;">
                                            <?php 
                                                for ($j = 1; isset($tab_title[$j]); $j+=2)
                                                {
                                                    echo '<th>'.$tab_title[$j].'</th>';
                                                }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        while ($row = mysql_fetch_array($result)) {
                                            echo '<tr>';
                                            for ($j = 1; isset($tab_title[$j]); $j+=2)
                                            {
                                                echo '<td>'.$row[$tab_title[$j]].'</td>';
                                            }
                                        }
                                        mysql_free_result($result);
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php
                            }
                            else
                            {
                        ?>
                               <span style="font-style:italic; color:green;"> MySQL returned an empty result set (i.e. zero rows). </span><br>
                        <?php
                            echo 'sql query = '.$sql;
                            }
                        ?>
</section>