<?php
	session_start();
	@$link = mysql_connect ($_SESSION['server'],$_SESSION['user'], $_SESSION['password']);
	if (isset($_GET['tab']))
	{
		mysql_select_db ($_GET['db'], $link);
		@$result = mysql_query("TRUNCATE TABLE ".$_GET['tab']);
		if (!$result)
		{
			header('Location: ../pages/data_base.php?db='.$_GET['db'].'&erreur='.mysql_error());
		}
		else
		{
			header('Location: ../pages/data_base.php?db='.$_GET['db'].'&success=tous les enregistrements de la table "'.$_GET['tab'].'" ont été supprimer avec succés');
		}
	}
?>