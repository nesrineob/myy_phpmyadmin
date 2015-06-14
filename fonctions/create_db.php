<?php
	session_start();
	@$link = mysql_connect ($_SESSION['server'],$_SESSION['user'], $_SESSION['password']);
	if (isset($_POST['creer_db']))
	{
		@$result = mysql_query("CREATE DATABASE ".$_POST['bd_name'], $link);
		if (mysql_error() != "")
		{
			header('Location: ../pages/database.php?erreur='.mysql_error());
		}
		else
		{
			header('Location: ../pages/database.php?success=Base de donnee "'.$_POST['bd_name'].'" creer avec succes');
		}
	}
	else if (isset($_POST['creer_table']))
	{
		$i = 0;
		mysql_select_db ($_SESSION['db'], $link);
		$query = "create table ".$_SESSION['table_name']." ( \n";
		while (isset($_POST['champ_name'.($i+1)])) {
			if (isset($_POST['champ_pk']) && $_POST['champ_pk'] == 'champ_pk'.$i)
			{ 
				if (isset($_POST['champ_longueur'.$i]) && $_POST['champ_longueur'.$i] == "")
				{
					if (isset($_POST['champ_AI'.$i]) && $_POST['champ_AI'.$i] == "on")
						if (preg_match_all("#(varchar|text|char|varbinary)#i", $_POST['champ_type'.$i], $matches))
							$query .= $_POST['champ_name'.$i]." ".$_POST['champ_type'.$i]."(255) NOT NULL PRIMARY KEY AUTO_INCREMENT, \n";
						else
							$query .= $_POST['champ_name'.$i]." ".$_POST['champ_type'.$i]." NOT NULL PRIMARY KEY AUTO_INCREMENT, \n";
					else
						if (preg_match_all("#(varchar|text|char|varbinary)#i", $_POST['champ_type'.$i], $matches))
							$query .= $_POST['champ_name'.$i]." ".$_POST['champ_type'.$i]."(255) NOT NULL PRIMARY KEY, \n";
						else
							$query .= $_POST['champ_name'.$i]." ".$_POST['champ_type'.$i]." NOT NULL PRIMARY KEY, \n";
				}
				else
				{
					if (isset($_POST['champ_AI'.$i]) && $_POST['champ_AI'.$i] == "on")
						$query .= $_POST['champ_name'.$i]." ".$_POST['champ_type'.$i]."(".$_POST['champ_longueur'.$i].") NOT NULL PRIMARY KEY AUTO_INCREMENT, \n";
					else
						$query .= $_POST['champ_name'.$i]." ".$_POST['champ_type'.$i]."(".$_POST['champ_longueur'.$i].") NOT NULL PRIMARY KEY, \n";
				}
			}
			else
			{
				if (isset($_POST['champ_longueur'.$i]) && $_POST['champ_longueur'.$i] == "")
				{
					if (isset($_POST['champ_null'.$i]) && $_POST['champ_null'.$i] == "on")
					{
						if (isset($_POST['champ_AI'.$i]) && $_POST['champ_AI'.$i] == "on")
							if (preg_match_all("#(varchar|text|char|varbinary)#i", $_POST['champ_type'.$i], $matches))
								$query .= $_POST['champ_name'.$i]." ".$_POST['champ_type'.$i]."(255) NULL AUTO_INCREMENT, \n";
							else
								$query .= $_POST['champ_name'.$i]." ".$_POST['champ_type'.$i]." NULL AUTO_INCREMENT, \n";
						else
							if (preg_match_all("#(varchar|text|char|varbinary)#i", $_POST['champ_type'.$i], $matches))
								$query .= $_POST['champ_name'.$i]." ".$_POST['champ_type'.$i]."(255) NULL, \n";
							else
								$query .= $_POST['champ_name'.$i]." ".$_POST['champ_type'.$i]." NULL, \n";
					}
					else
					{
						if (isset($_POST['champ_AI'.$i]) && $_POST['champ_AI'.$i] == "on")
							if (preg_match_all("#(varchar|text|char|varbinary)#i", $_POST['champ_type'.$i], $matches))
								$query .= $_POST['champ_name'.$i]." ".$_POST['champ_type'.$i]."(255) NOT NULL AUTO_INCREMENT, \n";
							else
								$query .= $_POST['champ_name'.$i]." ".$_POST['champ_type'.$i]." NOT NULL AUTO_INCREMENT, \n";
						else
							if (preg_match_all("#(varchar|text|char|varbinary)#i", $_POST['champ_type'.$i], $matches))
								$query .= $_POST['champ_name'.$i]." ".$_POST['champ_type'.$i]."(255) NOT NULL, \n";
							else
								$query .= $_POST['champ_name'.$i]." ".$_POST['champ_type'.$i]." NOT NULL, \n";
					}
				}
				else
				{
					if (isset($_POST['champ_null'.$i]) && $_POST['champ_null'.$i] == "on")
					{
						if ($_POST['champ_AI'.$i] == "on")
							$query .= $_POST['champ_name'.$i]." ".$_POST['champ_type'.$i]."(".$_POST['champ_longueur'.$i].") NULL AUTO_INCREMENT, \n";
						else
							$query .= $_POST['champ_name'.$i]." ".$_POST['champ_type'.$i]."(".$_POST['champ_longueur'.$i].") NULL, \n";
					}
					else
					{
						if (isset($_POST['champ_AI'.$i]) && $_POST['champ_AI'.$i] == "on")
							if (preg_match_all("#(varchar|text|char|varbinary)#i", $_POST['champ_type'.$i], $matches))
								$query .= $_POST['champ_name'.$i]." ".$_POST['champ_type'.$i]."(255) NOT NULL AUTO_INCREMENT, \n";
							else
								$query .= $_POST['champ_name'.$i]." ".$_POST['champ_type'.$i]." NOT NULL AUTO_INCREMENT, \n";
						else
							if (preg_match_all("#(varchar|text|char|varbinary)#i", $_POST['champ_type'.$i], $matches))
								$query .= $_POST['champ_name'.$i]." ".$_POST['champ_type'.$i]."(255) NOT NULL, \n";
							else
								$query .= $_POST['champ_name'.$i]." ".$_POST['champ_type'.$i]." NOT NULL, \n";
					}
				}
			}
			$i++;
		}
		if ($_POST['champ_pk'] == 'champ_pk'.$i)
			{ 
				if (isset($_POST['champ_longueur'.$i]) && $_POST['champ_longueur'.$i] == "")
				{
					if (isset($_POST['champ_AI'.$i]) && $_POST['champ_AI'.$i] == "on")
						if (preg_match_all("#(varchar|text|char|varbinary)#i", $_POST['champ_type'.$i], $matches))
							$query .= $_POST['champ_name'.$i]." ".$_POST['champ_type'.$i]."(255) NOT NULL PRIMARY KEY  AUTO_INCREMENT\n";
						else
							$query .= $_POST['champ_name'.$i]." ".$_POST['champ_type'.$i]." NOT NULL PRIMARY KEY  AUTO_INCREMENT\n";
					else
						if (preg_match_all("#(varchar|text|char|varbinary)#i", $_POST['champ_type'.$i], $matches))
							$query .= $_POST['champ_name'.$i]." ".$_POST['champ_type'.$i]."(255) NOT NULL PRIMARY KEY\n";
						else
							$query .= $_POST['champ_name'.$i]." ".$_POST['champ_type'.$i]." NOT NULL PRIMARY KEY\n";
				}
				else
				{
					if (isset($_POST['champ_AI'.$i]) && $_POST['champ_AI'.$i] == "on")
						$query .= $_POST['champ_name'.$i]." ".$_POST['champ_type'.$i]."(".$_POST['champ_longueur'.$i].") NOT NULL PRIMARY KEY AUTO_INCREMENT\n";
					else
						$query .= $_POST['champ_name'.$i]." ".$_POST['champ_type'.$i]."(".$_POST['champ_longueur'.$i].") NOT NULL PRIMARY KEY\n";
				}
			}
			else
			{
				if (isset($_POST['champ_longueur'.$i]) && $_POST['champ_longueur'.$i] == "")
				{
					if (isset($_POST['champ_null'.$i]) && $_POST['champ_null'.$i] == "on")
					{
						if (isset($_POST['champ_AI'.$i]) && $_POST['champ_AI'.$i] == "on")
							if (preg_match_all("#(varchar|text|char|varbinary)#i", $_POST['champ_type'.$i], $matches))
								$query .= $_POST['champ_name'.$i]." ".$_POST['champ_type'.$i]."(255) NULL AUTO_INCREMENT\n";
							else
								$query .= $_POST['champ_name'.$i]." ".$_POST['champ_type'.$i]." NULL AUTO_INCREMENT\n";
						else
							if (preg_match_all("#(varchar|text|char|varbinary)#i", $_POST['champ_type'.$i], $matches))
								$query .= $_POST['champ_name'.$i]." ".$_POST['champ_type'.$i]."(255) NULL\n";
							else
								$query .= $_POST['champ_name'.$i]." ".$_POST['champ_type'.$i]." NULL\n";
					}
					else
					{
						if (isset($_POST['champ_AI'.$i]) && $_POST['champ_AI'.$i] == "on")
							if (preg_match_all("#(varchar|text|char|varbinary)#i", $_POST['champ_type'.$i], $matches))
								$query .= $_POST['champ_name'.$i]." ".$_POST['champ_type'.$i]."(255) NOT NULL AUTO_INCREMENT\n";
							else
								$query .= $_POST['champ_name'.$i]." ".$_POST['champ_type'.$i]." NOT NULL AUTO_INCREMENT\n";
						else
							if (preg_match_all("#(varchar|text|char|varbinary)#i", $_POST['champ_type'.$i], $matches))
								$query .= $_POST['champ_name'.$i]." ".$_POST['champ_type'.$i]."(255) NOT NULL\n";
							else
								$query .= $_POST['champ_name'.$i]." ".$_POST['champ_type'.$i]." NOT NULL\n";
					}
				}
				else
				{
					if (isset($_POST['champ_null'.$i]) && $_POST['champ_null'.$i] == "on")
					{
						if ($_POST['champ_AI'.$i] == "on")
							$query .= $_POST['champ_name'.$i]." ".$_POST['champ_type'.$i]."(".$_POST['champ_longueur'.$i].") NULL AUTO_INCREMENT\n";
						else
							$query .= $_POST['champ_name'.$i]." ".$_POST['champ_type'.$i]."(".$_POST['champ_longueur'.$i].") NULL\n";
					}
					else
					{
						if (isset($_POST['champ_AI'.$i]) && $_POST['champ_AI'.$i] == "on")
							$query .= $_POST['champ_name'.$i]." ".$_POST['champ_type'.$i]."(".$_POST['champ_longueur'.$i].") NOT NULL AUTO_INCREMENT\n";
						else
							$query .= $_POST['champ_name'.$i]." ".$_POST['champ_type'.$i]."(".$_POST['champ_longueur'.$i].") NOT NULL\n";
					}
				}
			}
		$query .= " )\nENGINE = InnoDB \n DEFAULT CHARACTER SET = utf8 \n COLLATE = utf8_bin\n\n";
		$result = mysql_query($query);
        $i = 0;
        if (!$result) {
            header('Location: ../pages/data_base.php?db='.$_SESSION['db'].'&erreur=Erreur MySQL : '.mysql_error());
		}
		else
		{
			header('Location: ../pages/data_base.php?db='.$_SESSION['db'].'&success=la table "'.$_SESSION['table_name'].'" à été creer avec success');
		}
	}
	else if (isset($_POST['edit_table']))
	{
		$i = 0;
		mysql_select_db ($_SESSION['db'], $link);
		$query = "ALTER table ".$_GET['tab']." \n";
		$query .= "CHANGE ".$_GET['col']." ";
			
		if (isset($_POST['champ_pk']) && ($_POST['champ_pk'] == "on"))
			{ 
				if ($_POST['champ_longueur'] == "")
				{
					if ($_POST['champ_AI'] == "on")
						if (preg_match_all("#(varchar|text|char|varbinary)#i", $_POST['champ_type'], $matches))
							$query .= $_POST['champ_name']." ".$_POST['champ_type']."(255) NOT NULL PRIMARY KEY  AUTO_INCREMENT\n";
						else
							$query .= $_POST['champ_name']." ".$_POST['champ_type']." NOT NULL PRIMARY KEY  AUTO_INCREMENT\n";
					else
						if (preg_match_all("#(varchar|text|char|varbinary)#i", $_POST['champ_type'], $matches))
							$query .= $_POST['champ_name']." ".$_POST['champ_type']."(255) NOT NULL PRIMARY KEY\n";
						else
							$query .= $_POST['champ_name']." ".$_POST['champ_type']." NOT NULL PRIMARY KEY\n";
				}
				else
				{
					if ($_POST['champ_AI'] == "on")
						$query .= $_POST['champ_name']." ".$_POST['champ_type']."(".$_POST['champ_longueur'].") NOT NULL PRIMARY KEY AUTO_INCREMENT\n";
					else
						$query .= $_POST['champ_name']." ".$_POST['champ_type']."(".$_POST['champ_longueur'].") NOT NULL PRIMARY KEY\n";
				}
			}
			else
			{
				if ($_POST['champ_longueur'] == "")
				{
					if ($_POST['champ_null'] == "on")
					{
						if ($_POST['champ_AI'] == "on")
							if (preg_match_all("#(varchar|text|char|varbinary)#i", $_POST['champ_type'], $matches))
								$query .= $_POST['champ_name']." ".$_POST['champ_type']."(255) NULL AUTO_INCREMENT\n";
							else
								$query .= $_POST['champ_name']." ".$_POST['champ_type']." NULL AUTO_INCREMENT\n";
						else
							if (preg_match_all("#(varchar|text|char|varbinary)#i", $_POST['champ_type'], $matches))
								$query .= $_POST['champ_name']." ".$_POST['champ_type']."(255) NULL\n";
							else
								$query .= $_POST['champ_name']." ".$_POST['champ_type']." NULL\n";
					}
					else
					{
						if ($_POST['champ_AI'] == "on")
							if (preg_match_all("#(varchar|text|char|varbinary)#i", $_POST['champ_type'], $matches))
								$query .= $_POST['champ_name']." ".$_POST['champ_type']."(255) NOT NULL AUTO_INCREMENT\n";
							else
								$query .= $_POST['champ_name']." ".$_POST['champ_type']." NOT NULL AUTO_INCREMENT\n";
						else
							if (preg_match_all("#(varchar|text|char|varbinary)#i", $_POST['champ_type'], $matches))
								$query .= $_POST['champ_name']." ".$_POST['champ_type']."(255) NOT NULL\n";
							else
								$query .= $_POST['champ_name']." ".$_POST['champ_type']." NOT NULL\n";
					}
				}
				else
				{
					if ($_POST['champ_null'] == "on")
					{
						if ($_POST['champ_AI'] == "on")
							$query .= $_POST['champ_name']." ".$_POST['champ_type']."(".$_POST['champ_longueur'].") NULL AUTO_INCREMENT\n";
						else
							$query .= $_POST['champ_name']." ".$_POST['champ_type']."(".$_POST['champ_longueur'].") NULL\n";
					}
					else
					{
						if ($_POST['champ_AI'] == "on")
							$query .= $_POST['champ_name']." ".$_POST['champ_type']."(".$_POST['champ_longueur'].") NOT NULL AUTO_INCREMENT\n";
						else
							$query .= $_POST['champ_name']." ".$_POST['champ_type']."(".$_POST['champ_longueur'].") NOT NULL\n";
					}
				}
			}
		$result = mysql_query($query);
        if (!$result)
			header('Location: ../pages/affiche.php?id=1&db='.$_GET['db'].'&tab='.$_GET['tab'].'&erreur='.mysql_error());
		else
			header('Location: ../pages/affiche.php?id=1&db='.$_GET['db'].'&tab='.$_GET['tab'].'&success=la colonne "'.$_GET['col'].'" à été modifier avec succes');
	}
?>