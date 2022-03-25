<?php
require_once "autoload.php";

$client = new Google_Client();
$client->setApplicationName('Google Sheets');
$client->setScopes(Google_Service_Sheets::SPREADSHEETS);
$client->setAuthConfig('credentials.json');
$client->setAccessType('offline');
$client->setPrompt('select_account consent');


$service = new Google_Service_Sheets($client);
$spreadsheetId = "1f5-8Y5foWuRMZJI-gOSQBOEG1RRw1eG9KINsH31lUD4";

$response = $service->spreadsheets_values->get($spreadsheetId, "A1:D");
$sheet_value = $response->getValues();

if (!empty($_POST["email"]) and !empty($_POST["category"]) and !empty($_POST["headline"]) and !empty($_POST["text"])) {

	$valueRange= new Google_Service_Sheets_ValueRange();
	$i = count((is_countable($sheet_value)?$sheet_value:[]))+1;
	$range = "A$i:D";
	$valueRange->setValues([[$_POST["category"], $_POST["email"], $_POST["headline"], $_POST["text"]]]);
	$conf = ["valueInputOption" => "RAW"];

	$service->spreadsheets_values->update($spreadsheetId, $range, $valueRange, $conf);
	$sheet_value[] = [$_POST["category"], $_POST["email"], $_POST["headline"], $_POST["text"]];
}
?>


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