<table id="db_mysql" class="table table-bordered table-hover">
    <thead>
		<?php
			if (mysql_error() == "")
			{
				$tab_title = array_keys(mysql_fetch_array(mysql_query($_POST['txt_query'], $link)));
				echo '<span style="color:green;"> Réquette executer avec succés</span>';		
		?>
				<tr>
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
				while($tab=mysql_fetch_row($result))
				{
					echo "<tr>";
					for($i=0;$i<mysql_num_fields($result); $i++)
					{
						echo "<td>".$tab[$i]."</td>";
					}
					echo "</tr>";
				}
			}
			else
			{
				echo '<span style="color:red;"> '.mysql_error().'</span>';
			}
	?>
    </tbody>
</table>