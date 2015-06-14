<?php
	if (isset($_SESSION['user']))
	{
?>
<aside class="left-side sidebar-offcanvas">                
                <section class="sidebar">
                    <ul class="sidebar-menu">
                        <br>
                        <center>
                            <a href="../pages/index2.php"><img src="../images/home.png"></a>
                            <a href="../pages/database.php?id=1"><img src="../images/bd.png"></a>
                            <a href="http://localhost/phpmyadmin/doc/html/index.html"><img src="../images/ques.png"></a>
                            <a href="http://dev.mysql.com/doc/refman/5.6/en/index.html"><img src="../images/doc.png"> </a>
                        </center>
                    <br><br><br>
                        <li class="treeview">
								<?php
									$link = mysql_connect ($_SESSION['server'],$_SESSION['user'], $_SESSION['password']) or die ('Erreur : '.mysql_error() );
									$result = mysql_query("SHOW DATABASES", $link) or die ('Erreur : ' .mysql_error() );
									while($row = mysql_fetch_array($result)) {
										echo '<li><a href="../pages/data_base.php?db='.$row["Database"].'"><img src = "../images/bd1.png">'.$row["Database"].'</a></li>';
									}
								?>

                        </li>
                    </ul>
                </section>
            </aside>
<?php
	}
	else
	{
		header('Location: ../index.php');
	}
?>