<?php

$name = 'Егор';
$age = 32;
$email = 'egorbarisovi4@gmail.com';
$city = 'Ufa';
$about = 'student';

//Next code --- Следующий код



?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<title><?= $name . ' - ' . $about?></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="main.css">

										<!----- style ----->

	<style type="text/css">
		body {
			font: normal normal 25px 'Roboto';
		}
		table {
			padding: 15px;
			border: 1px solid #000;
		}
		td {
			margin-left: 20px;
		}	
	</style>
</head>

										<!----- body ----->

<body>
	<h1> <?= $name ?></h1>
	<table>
		<tr>
			<td>Имя</td>
			<td><?= $name ?></td>
		</tr>
		<tr>
			<td>Возраст</td>
			<td><?= $age ?></td>
		</tr>
		<tr>
			<td>Адрес электронной почты</td>
			<td><a href="mailto:<?= $email ?>"><?= $email?></a></td>
		</tr>
		<tr>
			<td>Город</td>
			<td><?= $city ?></td>
		</tr>
		<tr>
			<td>О себе</td>
			<td><?= $about ?></td>
		</tr>
	</table>
	<a href="fibo.php">Проверка числа на нахождение в последовательности Фибоначи</a>
</body>
</html>
