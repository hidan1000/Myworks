<!DOCTYPE HTML>

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Добавление запросов</title>

</head>

<body>

<a href='lmysql.php'>Вернуться в базу заявок</a><br />

<form method="post" action="add.php">
	<h1>Заведение заявки</h1>
	Заявитель<br />
	<input type="text" name="client"/><br />
	Тип заявки<br />
	<input type="text" name="r_type"/><br />	
	Статус<br />
	<select name="status"><?php echo $row['status']; ?>
		<option value="В ожидании" selected> В ожидании </option>
		<option value="Выполняется"> Выполняется </option>
		<option value="Выполнена"> Выполнена </option>
		<option value="Снята"> Снята </option>
	</select><br /><br />
	Исполнитель<br />
	<select name="performer"><?php echo $row['performer']; ?>
		<option value="Не задан" selected> Не задан </option>
		<option value="Олег"> Олег </option>
		<option value="Пётр"> Пётр </option>
		<option value="Иван"> Иван </option>
	</select><br /><br />
	<input type="hidden" name="r_date" value="<?php echo date('Y-m-d'); ?>" />
	<input type="hidden" name="r_time" value="<?php echo date('H:i:s'); ?>" /><br />
	<input type="submit" name="add" value="Добавить" />		
</form>

<?php
	include_once("conn_db.php");
	
	if (isset($_POST['add']))
	{
	$client = strip_tags(trim($_POST['client']));
	$r_type = strip_tags(trim($_POST['r_type']));
	$r_date = $_POST['r_date'];
	$r_time = $_POST['r_time'];
	$status = strip_tags(trim($_POST['status']));
	$performer = strip_tags(trim($_POST['performer']));
	
	mysql_query("INSERT INTO requests SET client='$client', r_type='$r_type', r_date='$r_date', r_time='$r_time', status='$status', performer='$performer'");
	
	mysql_close();
	
	echo "<br />Запрос принят.";
	}
?>

</body>

</html>