<?php
session_start();
// Подключаем служебные функции
// Функция получения значения из $_POST
include_once 'functions/getPost.php';
// Получаем значение для аргумента запроса из $_POST
$getPost = getPost(); // Переменная для "аргумента" запроса

// Функция отображения базы
include_once 'functions/showTables.php';

// Соединение с базой
include_once 'functions/connection.php';


// Формируем корпус значений в массиве $_SESSION
// Записываем в сессию название таблицы
if (!empty($getPost['tables'])) {
    $_SESSION['tables'] = $getPost['tables'];
} ?>


<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Управление базами данных</title>
        <link type="text/css" rel="stylesheet" href="style/style.css">
    </head>
    <body>
        <form action="Column.php" method="POST" name="task">

<?php // Если переданы данные $_POST то выводим содержимое таблицы ?>    
<?php if (!empty($_SESSION['tables'])) {
    showTables($_SESSION['tables'], $connection);
} ?>
            <br>
            <div>
                <input type="submit" value="Перейти">
            </div>
        </form>
    </body>
</html>