<!DOCTYPE HTML>

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Редактирование заявки</title>

</head>

<body>

<?php
		
	include_once("conn_db.php");
	
	$id = $_GET['id'];
	?>
	<a href='edit.php?id=<?php echo $id?>'>Вернуться к редактированию заявки</a>	
	<?php
	
	$result = mysql_query(" SELECT log FROM requests 
			WHERE id='$id' ");

	$row = mysql_fetch_array($result);
	echo $row['log'];
	mysql_close();
?>

</body>
</html>