<?php
session_start();
// Подключаем служебные функции
// Функция получения значения из $_POST
include_once 'getPost.php';
// Получаем значение для аргумента запроса из $_POST
$getPost = getPost(); // Переменная для "аргумента" запроса
// Записываем в сессию название таблицы
if (!empty($getPost['tables'])) {
    $_SESSION['tables'] = $getPost['tables'];
} ?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Управление базами данных</title>
    </head>
    <body>

<?php
// Переменные которые хронят данные соединения
$driver = 'mysql';
$host = 'localhost';
$dbNname ='evolchanov';
$charset ='utf8';
$login = 'evolchanov';
$pass = 'neto1822';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

// Соединение с базой данных
$connection = new PDO("$driver:host=$host; dbname=$dbNname; charset=$charset", "$login", "$pass", $options);

// Показываем все таблицы пользователя
// Переменная для запроса
$request = "SHOW TABLES";
// Готовим запрос
$stmtRequest = $connection->prepare($request);
// Передаем
$stmtRequest->execute();
// Получаем ответ
$getSqlAnswer = $stmtRequest->fetchAll(PDO::FETCH_ASSOC); ?>

<?php // Отображение таблиц пользователя ?>
<form action="index.php" method="POST" name="task">
    <h3> Таблицы </h3>
<?php foreach ($getSqlAnswer as $tables) {
    foreach ($tables as $key => $tablesName) { ?>
    	<div>
            <input type="checkbox" name="tables" value="<?php echo $tablesName; ?>" />
            <label><?php echo $tablesName; ?></label>
    	</div>
    <?php }
} ?>
    
<?php 
// Функция создания таблицы
function CREATE_TABLE() {
    // Переменная для запроса
    $request = "CREATE TABLE `test__3` (
    `id` int NOT NULL AUTO_INCREMENT,
    `name` varchar(50) NULL,
    `estimation`float NOT NULL,
    `budget` tinyint(4) NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    // Готовим запрос
    $stmtRequest = $connection->prepare($request);
    // Передаем
    $stmtRequest->execute();
} ?>

<?php // Функция вывода содержимого таблиц
 function showTables($getPost, $connection){
    // Сохраняем в переменную значение для аргумента запроса
    $request = $getPost;
    // Переменная для запроса
    $request = "DESCRIBE `$request`";
    // Готовим запрос
    $stmtRequest = $connection->prepare($request);
    // Передаем
    $stmtRequest->execute();
    // Получаем ответ
    $getSqlAnswer = $stmtRequest->fetchAll(PDO::FETCH_ASSOC);
    
    // Отображение ?> 
    <h3> Строки </h3>
    <?php foreach ($getSqlAnswer as $row => $tablesDate) {
        if (isset($row)) {
            foreach ($tablesDate as $key => $fild) {
                if ($fild === NULL) {
                    $fild = 'NULL';
                }
                elseif (empty($fild)) {
                    $fild = '-----';
                } 
                if ($key === 'Field') {?>
                    <div>
                        <input type="radio" name="column" value="<?php echo $fild; ?>" />
                        <label><?php echo $fild; ?></label>		
                    </div>
                <?php }
            }
        }
    }
}?>
<?php // Если переданы данные $_POST то выводим содержимое таблицы ?>    
<?php if (!empty($getPost['tables'])) {
    showTables($getPost['tables'], $connection);
} ?>
            <div>
                <br><br>
                <input type="radio" name="ctrl" value="deletTables" />
                <label> Удалить колнку </label>
                <input type="radio" name="ctrl" value="modify" />
                <label> Изменить колнку </label>
                <input type="radio" name="ctrl" value="rename" />
                <label>Переименовать</label>
                <div>
                    <input type="submit">
                </div>
            </div>
        </form>
    </body>
</html> 
<?php

// Функция удаления поля таблицы
function deletTables ($connection, $tables, $column) {
    $tables = $tables;
    $column = $column;
    $request = "ALTER TABLE $tables DROP COLUMN $column";
    // Готовим запрос
    $stmtRequest = $connection->prepare($request);
    // Передаем
    $stmtRequest->execute();
    // Получаем ответ
//    $getSqlAnswer = $stmtRequest->fetchAll(PDO::FETCH_ASSOC);
}

// Если переданы данные $_POST удаляем указанную колонку
if (!empty($_SESSION['tables']) && !empty($getPost['column']) && $getPost['ctrl'] === 'deletTables') {
        deletTables($connection, $_SESSION['tables'], $getPost['column']);
}

// Функция изменения типа поля
function modify($connection, $tables, $column) {
    $tables = $tables;
    $column = $column;
    $request = "ALTER TABLE $tables MODIFY $column FLOAT NOT NULL";
    // Готовим запрос
    $stmtRequest = $connection->prepare($request);
    // Передаем
    $stmtRequest->execute();
}

// Если переданы данные $_POST изменяем тип указанной колонки
if (!empty($_SESSION['tables']) && !empty($getPost['column']) && $getPost['ctrl'] === 'modify') {
        modify($connection, $_SESSION['tables'], $getPost['column']);
}

// Функция изменения названия поля
function renameCol($connection, $tables, $column) {
    $tables = $tables;
    $column = $column;
    $request = "ALTER TABLE $tables CHANGE $column model VARCHAR(50);";
    // Готовим запрос
    $stmtRequest = $connection->prepare($request);
    // Передаем
    $stmtRequest->execute();
}

// Если переданы данные $_POST переименовываем указанную колонку
if (!empty($_SESSION['tables']) && !empty($getPost['column']) && $getPost['ctrl'] === 'rename') {
        renameCol($connection, $_SESSION['tables'], $getPost['column']);
} ?>