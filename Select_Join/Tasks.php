<?php
session_start();

// Подключаем служебные функции
// Алгорит присвоения задачи юзеру
include_once 'newTask.php';
// Алгоритм удаления задачи
include_once 'deletTask.php';
// Алгоритм обозначения выполненных и не выполненных задач
include_once 'MarkAs.php';
// Функция получения задач из базы
include_once 'displayList.php';
// Сохраняем данные в переменную
$list = displayList();
//echo '<pre>';
//var_dump($list);
//echo '</pre>';
?>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Список задач</title>
        <!------------- main.css -------------->
        <link rel="stylesheet" href="style/style.css" type="text/css">
    </head>
    <body>
        <?php if (isset($_SESSION['role']) and $_SESSION['role'] === 'user') { ?>
        <form action="Tasks.php" method="POST" name="task" id='task'></form>
            <table border="1">
            <caption>Задачи</caption>
                 <tr>
                    <th>Выбрать</th>
                    <th>Задача</th>
                    <th>Дата создания</th>
                    <th>Статус</th>
                </tr>
                <?php if (!empty (displayList())) {
                    foreach ($list as $key => $value) {
                        foreach ($value as $k => $val) {
                            switch ($k) :
                                case 'id':
                                    $id = $val;
                                    break;
                                case 'login':
                                    $login = $val;
                                    break;
                                case 'task': 
                                    $description = $val;
                                    break;
                                case 'date': 
                                    $date = $val;
                                    break;
                                case 'done':
                                    $done = $val;
                                    if ($done === '0') {
                                        $done = 'Не выполнено';
                                    } else {
                                        $done = 'Выполнено';
                                    }
                                    break;
                                default:
                                    break;
                            endswitch;
                        }
                        if (!empty($id) && !empty($description)) { ?>
                            <tr>
                                <td><input type="radio" form="task" name="selectedTask" value="<?php echo $description; ?>"></td>
                                <td class="task"> <?php echo $description; ?> </td>
                                <td class="task"> <?php echo $date; ?> </td>
                                <td class="task"> <?php echo $done; ?> </td>
                            </tr>
                        <?php }
                    } ?>
            </table>
                <?php } else { ?>
                    <h3> Нет задач </h3>
                <?php } ?>
            <div class="textFild">
                <p> Новая задача :</p>
                    <input type="text" form="task" name="newTask">
            </div>
            <div>
                <input type="radio" form="task" name="deletTask" value="deletTask">
                <label> Удалить задачу </label>
            </div>
            <div>
                <input type="radio" form="task" name="markAs" value="markAs">
                <label> Отметить как выполненную </label>
            </div>
            <div>
                <a href="Delegate.php">Перепоручить</a>
            </div>
            <div>
                <a href="DisplayAssigned.php">Список делегированных</a>
            </div>
            <div class="radio_buttom buttom_submit">
                <input type="submit" form="task" value="Применить">
            </div>
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