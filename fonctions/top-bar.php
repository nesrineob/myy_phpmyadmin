<?php
	if (isset($_SESSION['user']))
	{
?>
		<header class="header">
            <a href="../pages/index2.php" class="logo">
				<img src="../images/logo.png">
            </a>
            <nav class="navbar navbar-static-top" role="navigation">
                <div class="navbar-right">
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="../images/user.jpg" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Bienvenu <?php echo $_SESSION['user']; ?>
                                &nbsp&nbsp&nbsp&nbsp
                            <a href="../fonctions/deconnect.php"><img src="../images/quit.png"></a>
                            </p>

                        </div>
                    </div>
                </div>
            </nav>
        </header>
<?php
	}
	else
	{
		header('Location: ../index.php');
	}
?>