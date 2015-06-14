<section class="content">
                    <h3>
                        Bases de Données
                    </h3>
                    <br> <img src = "../images/bd3.png"></i>Créer une base de données <a href ="http://dev.mysql.com/doc/refman/5.6/en/create-database.html">
                    <img src = "../images/ques1.png"></a><br>
                    <form action="../fonctions/create_db.php" method="post" class="form" enctype="multipart/form-data" id="form">
                        <span style="color:red;"><?php if (!empty($_GET['erreur'])) {echo $_GET['erreur']; } ?></span>
                        <span style="color:green;"><?php if (!empty($_GET['success'])) {echo $_GET['success']; } ?></span>
                        <div class="form-group" style="vertical-align:middle;"><br>
                            <input type="text" name="bd_name" style="width:200px;" required/> &nbsp&nbsp&nbsp&nbsp
                            <input type ="image" src ="../images/creer.png" value="submit" name = "creer_db">
                        </div><br>                                                          
                    </form>
                    <div style="width: 280px;">
                    <div class="box-body table-responsive">
                        <table  class="table table-bordered table-hover">
                            <thead>
                                    <tr>
                                            <th>Base de données</th>
                                    </tr>
                            </thead>
                                <?php
                                $link = mysql_connect ($_SESSION['server'],$_SESSION['user'], $_SESSION['password']) or die ('Erreur : '.mysql_error() );
                                $result = mysql_query("SHOW DATABASES", $link) or die ('Erreur : ' .mysql_error() );
                                while($row = mysql_fetch_array($result)) {
                                echo '<tr><td><a href="../pages/data_base.php?db='.$row["Database"].'">'.$row["Database"].'</a></td></tr>';
                                }
                                ?>
                        </table>
                    </div>
                    </div>
</section>