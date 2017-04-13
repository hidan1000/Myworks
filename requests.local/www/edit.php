<!DOCTYPE HTML>

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Редактирование заявки</title>

</head>

<body>

<a href='lmysql.php'>Вернуться в базу заявок</a>

<?php
		
	include_once("conn_db.php");
	
	$id = $_GET['id'];
	
	$result = mysql_query(" SELECT * FROM requests 
			WHERE id='$id' ");
			/* id,r_type,client,r_date,r_time,performer,c_date,c_time,status,log*/

	$row = mysql_fetch_assoc($result);
	
	if (isset($_POST['save']))
	{
	if ($row['client']!=$_POST['client']) $log = $log. "<br />". $_POST['m_date']. " Клиент изменен с \"". $row['client']. "\" на \"" .$_POST['client']. "\"";
	if ($row['r_type']!=$_POST['r_type']) $log = $log. "<br />". $_POST['m_date']. " Запрос изменен с \"". $row['r_type']. "\" на \"" .$_POST['r_type']. "\"";
	if ($row['status']!=$_POST['status']) $log = $log. "<br />". $_POST['m_date']. " Статус изменен с \"". $row['status']. "\" на \"" .$_POST['status']. "\"";
	if ($row['performer']!=$_POST['performer']) $log = $log. "<br />". $_POST['m_date']. " Статус изменен с \"". $row['performer']. "\" на \"" .$_POST['performer']. "\"";
		
	$client = strip_tags(trim($_POST['client']));
	$r_type = strip_tags(trim($_POST['r_type']));
	$status = strip_tags(trim($_POST['status']));
	$performer = strip_tags(trim($_POST['performer']));
	
	mysql_query("UPDATE requests SET client='$client', r_type='$r_type', status='$status', performer='$performer', log=CONCAT(IFNULL(log, ''),'$log') WHERE id='$id'");
	
	mysql_close();
	
	$row['client'] = $client;
	$row['r_type'] = $r_type;
	$row['status'] = $status;
	$row['performer'] = $performer;
	
	echo "<br />Изменения приняты.";
	}
?>

<form method="post" action="edit.php?id=<?php echo $row['id']?>">
	<h1>Редактирование заявки</h1>
	Заявитель<br />
	<input size="70" type="text" name="client" value="<?php echo $row['client']; ?>"/><br /><br />
	Тип заявки<br />
	<input size="70" type="text" name="r_type" value="<?php echo $row['r_type']; ?>"/><br /><br />
	Статус<br />
	<select name="status"><?php echo $row['status']; ?>
		<option value="В ожидании" 
			<?php if ($row['status']=='В ожидании') echo 'selected'; ?> > В ожидании </option>
		<option value="Выполняется"
			<?php if ($row['status']=='Выполняется') echo 'selected'; ?> > Выполняется </option>
		<option value="Выполнена" 
			<?php if ($row['status']=='Выполнена') echo 'selected'; ?> > Выполнена </option>
		<option value="Снята" 
			<?php if ($row['status']=='Снята') echo 'selected'; ?> > Снята </option>
	</select><br /><br />
	Исполнитель<br />
	<select name="performer"><?php echo $row['performer']; ?>
		<option value="Не задан"
			<?php if ($row['performer']=='Не задан') echo 'selected'; ?> > Не задан </option>
		<option value="Олег" 
			<?php if ($row['performer']=='Олег') echo 'selected'; ?> > Олег </option>
		<option value="Пётр" 
			<?php if ($row['performer']=='Пётр') echo 'selected'; ?>> Пётр </option>
		<option value="Иван" 
		<?php if ($row['performer']=='Иван') echo 'selected'; ?> > Иван </option>
	</select><br /><br />
	
	<input type="hidden" name="m_date" value="<?php echo date('Y-m-d H:i:s'); ?>">
	
	<input type="submit" name="save" value="Сохранить" />

</form>
<br />
<a href='log.php?id=<?php echo $row['id']?>'>Посмотреть историю изменений</a>

</body>

</html>