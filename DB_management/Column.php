<?php
session_start();

// Подключаем служебные функции
// Функция соединения с базой данныч
include_once 'functions/connection.php';

// Функция получения значения из $_POST
include_once 'functions/getPost.php';
// Получаем значение для аргумента запроса из $_POST
$getPost = getPost(); // Переменная для "аргумента" запроса
$typeToModify = $getPost['modify']; // Переменная для нового типа колонки
$newName = $getPost['rename'];

// Подключаем Функции действий с колонками
// Функция изменения типа
include_once 'functions/modify.php';
// Функция удаления
include_once 'functions/deletTables.php';
// Функция получения типа поля
include_once 'functions/getColType.php';
// Функция получение названия колонки
include_once 'functions/getColName.php';
// Функция переименования
include_once 'functions/rename.php';

// Записываем в сессию названия и тип колонки
if (!empty($getPost['column'])) {
    $_SESSION['column'] = $getPost['column'];
}

// Получаем значения для указания где что менять
if (isset($_SESSION)) {
    if (isset($_SESSION['tables'])) {
        $tables = $_SESSION['tables']; // Названия таблицы
    }
    if (isset($_SESSION['column'])) {
        $arr = explode(',', $_SESSION['column']);
        $column = $arr[0]; // Колонка
    }
    if(isset($tables) && isset($column)) { 
        $type = getColType($tables, $column, $connection); // Тип данных колонки
        // Костыль
        if ($type === 'varchar') {
            $type = 'varchar(50)';
        }
    }
}
?>

<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Управление базами данных</title>
        <link type="text/css" rel="stylesheet" href="style/style.css">
    </head>
    <body>
        <?php if (!empty($column) && !empty($type)) { ?>
            <p> Колонка : <b><?php echo $column; ?></b></p>
            <p> Тип : <b><?php echo $type; ?></b></p>
            <br><br>
            <form method="POST" action="Column.php" >
                <div class="radio">
                    <select name="modify">
                    <optgroup label="Изменать тип">
                        <option value="">Изменить тип</option>
                        <option value="int">int</option>
                        <option value="varchar(50)">varchar(50)</option>
                        <option value="float">float</option>
                        <option value="tinyint(4)">tinyint(4)</option>
                    </optgroup>
                   </select>
                </div>
                <div class="radio">
                    <input type="radio" name="deletTables" value="deletTables" />
                    <label> Удалить колнку </label>
                </div>
                <div class="radio">
                    <label>Переименовать</label>
                    <input type="text" name="rename"/>
                    <input type="hidden" name="modifyForRename" value="<?php echo $type; ?>" checked readonly/>
                </div>
                <br>
                <input type="submit" value="Применить">
            </form>
            <br><br>
            <a href="index.php"> На глваную </a>
        <?php } 
        else { ?>
            <a href="index.php"> На глваную </a>
        <?php }
        ?>
    </body>
</html>

<?php 
// Вызываем функции действий с колонками
// Изменение типа
if (!empty($connection) && !empty($tables) && !empty($column) && !empty($typeToModify)) {
    modify($tables, $column, $typeToModify, $connection);
    header('Location: http://university.netology.ru/u/evolchanov/DB_management/Tables.php');
}
// Вызываем функцию удаления колонки
if (!empty($tables) && !empty($column) && $getPost['deletTables'] === 'deletTables') {
    deletTables($tables, $column, $connection);
    header('Location: http://university.netology.ru/u/evolchanov/DB_management/Tables.php');
} 
// Вызываем функцию переименования
if (empty($typeToModify)) { $typeToModify = $getPost['modifyForRename']; } // Костыль
if(!empty($tables) && !empty($column) && !empty($newName) && !empty($typeToModify) && !empty($connection)) {
    renameCol($tables, $column, $newName, $typeToModify, $connection);
    header('Location: http://university.netology.ru/u/evolchanov/DB_management/Tables.php');
}
?>