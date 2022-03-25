<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>__№3__</title>
</head>

<body>
<form action="n3.php" method="POST">
	<label>Тема (заголовок):
	<input type="text" name="Заголовок"><br>
	</label>
	<br> 
	<label>Категории:
	<select name="Категории">
		<option>Дом</option>
		<option>Работа</option>
		<option>Развлечения</option>
	</select>
	</label>
	<br>
	<br>
	<label>Текст объявления:
	<textarea rows="10" cols="15" name="Текст объявления"></textarea><br>
	</label>
	<br>
	<label>E-mail: 
	<input type="text" name="Е-mail" /><br>
	<br>
	<input type="submit" value="Готово">
</form>
</body>
</html>