<!DOCTYPE HTML>

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>База заявок</title>

</head>

<body>

	<a href="add.php">Добавить заявку</a><br /><br />

<?php
	
	include_once("conn_db.php");
	
	$order = "id";
/*$result = mysql_query(" SELECT * FROM requests 
			WHERE performer='Исполнитель 1' AND status='В ожидании' 
			ORDER BY $order DESC LIMIT 30 ");
	
	mysql_close();
*/
	$result = mysql_query(" SELECT id,r_type,client,r_date,r_time,performer,c_date,c_time,status,log FROM requests ORDER BY $order DESC ");
		
	mysql_close();
	
	?>
	<table border="1px" bordercolor="gray" cellpadding="5px" cellspacing="0px"><?php
	while($row = mysql_fetch_assoc($result))
	{?>
	<tr>
		<td> <?php echo $row['r_date']. " ". $row['r_time']?> </td>
		<td> <h4 style="display:inline"><?php echo $row['r_type']?></h4> </td>
		<td><?php echo $row['status']?></td>
		<td><a href="edit.php?id=<?php echo $row['id']?>">Изменить</a></td>		
	</tr>		
	<?php
	}
?>	</table>

</body>

</html>