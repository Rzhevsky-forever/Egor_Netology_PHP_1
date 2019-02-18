<?php
session_start();
print '$_SESSION : <br />'; // Testing
var_dump($_SESSION); // Testing
print '<br /> $_POST : <br />'; // Testing
print '<pre>'; // Testing
var_dump($_POST); // Testing
print '</pre>'; // Testing

// Подключаем служебные функции
// Алгорит присвоения задачи юзеру
include_once 'newTask.php';
// Алгоритм удаления задачи
include_once 'deletTask.php';
// Алгоритм обозначения выполненных и не выполненных задач
include_once 'MarkAs.php';
?>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Список задач</title>
        <link rel="stylesheet" href="style/style.css" type="text/css">
    </head>
    <body>
        <?php if (isset($_SESSION['role']) and $_SESSION['role'] === 'user') { ?>
        <form action="Tasks.php" method="POST" name="task">
            <p> Ваши текущие задачи : </p>
                <h3>
                    <?php include_once 'displayList.php';
                    if (!empty (displayList())) {
                        $list = displayList();
                        foreach ($list as $key => $value) {
                            foreach ($value as $val) {?>
                                <div>
                                    <input type="checkbox" name="selectedTask" value="<?php echo $val; ?>"> <?php echo $val; ?> <br>
                                </div>
                            <?php }
                        }
                    } else {
                        echo 'Нет задач';
                    } ?>
                </h3>
            <div class="textFild">
                <p> Новая задача :</p>
                    <input type="text" name="newTask">
            </div>
            <div>
                <label> Удалить задачу </label>
                    <input type="checkbox" name="deletTask" value="deletTask">
            </div>
            <div>
                <label> Отметить как выполненную </label>
                    <input type="checkbox" name="markAs" value="markAs">
            </div>
            <div>
                <a href="Delegate.php">Перепоручить</a>
            </div>
            <div>
                <a href="DisplayAssigned.php">Список делегированных</a>
            </div>
            <div class="radio_buttom buttom_submit">
                <input type="submit">
            </div>
        </form>
        <?php } else { ?>
            <h2> Пожалуйста зарегистрируйтеся или авторизуйтеся </h2>
            <div>
                <a href="Registration.php">Регистрация</a>
            </div>
            <br>
            <div>
                <a href="Authentication.php">Авторизация</a>
            </div>
        <?php } ?>
        <div>
            <a href="Exit.php">Выйти</a>
        </div>
    </body>
</html>