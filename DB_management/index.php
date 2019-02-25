<?php
session_start();
// Подключаем служебные функции
// Функция получения значения из $_POST
include_once 'functions/getPost.php';
// Получаем значение для аргумента запроса из $_POST
$getPost = getPost(); // Переменная для "аргумента" запроса
// Соединение с базой
include_once 'functions/connection.php';

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
// Показываем все таблицы пользователя
// Переменная для запроса
$request = "SHOW TABLES";
// Готовим запрос
$stmtRequest = $connection->prepare($request);
// Передаем
$stmtRequest->execute();
// Получаем ответ
$getSqlAnswer = $stmtRequest->fetchAll(PDO::FETCH_ASSOC); 
?>

        <!-- Отображение таблиц пользователя -->
        <form action="Tables.php" method="POST" name="task">
            <h3> Список таблиц </h3>
                <?php foreach ($getSqlAnswer as $tables) {
                    foreach ($tables as $key => $tablesName) { ?>
                        <div>
                            <input type="radio" name="tables" value="<?php echo $tablesName; ?>" />
                            <label><?php echo $tablesName; ?></label>
                        </div>
                    <?php }
                } ?>
        <div>
            <br><br>
            <div>
                <input type="submit" value="Перейти">
            </div>
        </div>
        </form>
    </body>
</html> 
