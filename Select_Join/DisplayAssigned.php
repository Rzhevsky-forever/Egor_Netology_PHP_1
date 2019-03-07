<?php
session_start(); ?>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Список задач</title>
        <!------------- main.css -------------->
        <link rel="stylesheet" href="style/style.css" type="text/css">
    </head>
    <body>

<?php if (!empty($_SESSION['idUser'][0]['id'])) {
    $idUser = $_SESSION['idUser'][0]['id'];
    // Подключение менеджера для работы с базой данных
    include_once 'dbManager.php';

function displayAssigned ($idUser) {
    $connection = new workWithDb();
    $connection->connection();
    $request = "select task.description as Задача, user.login as login, task.date_added as date, task.is_done as done
                from task
                inner JOIN user on user.id = task.user_id 
                where task.assigned_user_id = $idUser";
    $displayAssigned = $connection->output($request);
    return $displayAssigned;
} ?>

        <?php if (isset($_SESSION['role']) && isset($idUser)) {
            if ($_SESSION['role'] === 'user' && !empty($idUser)) {
                $displayAssigned = displayAssigned($idUser);
                if (!empty($displayAssigned)) { ?>
                    <table border="1">
                        <caption> Делегированные задачи</caption>
                             <tr>
                                <th>Задача</th>
                                <th>Автор</th>
                                <th>Дата создания</th>
                                <th>Статус</th>
                            </tr>
                    <?php foreach ($displayAssigned as $value) {
                        foreach ($value as $key => $field) {
                            switch ($key) :
                                case 'Задача':
                                    $description = $field;
                                    if (empty($description)) {
                                        $description = 'Нет задач';
                                    }
                                    break;
                                case 'login':
                                    $login = $field;
                                    if (empty($login)) {
                                        $login = 'Нет задач';
                                    }
                                    break;
                                case 'date': 
                                    $date = $field;
                                    if (empty($date)) {
                                        $date = 'Нет задач';
                                    }
                                    break;
                                case 'done':
                                    $done = $field;
                                    if ($done === '0') {
                                        $done = 'Не выполнено';
                                    }
                                    elseif (empty ($done)) {
                                        $done = 'Нет задач';
                                    }
                                    else {
                                        $done = 'Выполнено';
                                    }
                                    break;
                                default:
                                    break;
                            endswitch;
                        } ?>
                    <tr>
                        <td> <?php echo $description; ?> </td>
                        <td> <?php echo $login; ?> </td>
                        <td> <?php echo $date; ?> </td>
                        <td> <?php echo $done; ?> </td>
                    </tr>
                    <?php } ?>
                    </table>
                <?php }
                else { ?>
                    <h4> Нет делегированных задач </h4>
                <?php }
            }
        } else { ?>
            <div>
                <a href="index.php">На страницу авторизации</a>
            </div>
        <?php } ?>
            <div>
                <a href="Exit.php">Выйти</a>
            </div>
        <?php } ?>
        <div>
            <a href="index.php">На страницу авторизации</a>
        </div>
    </body>
</html>

<?php
/*
 * Запросы
 * 
 * old
 * select user.login as Пользователь, description as Задача
                from task
                inner join user on user.id = task.user_id
                inner join user as u on u.id = assigned_user_id
 * 
 * select description as Задача
from task
where assigned_user_id = 2
 * 
 * new
 * select task.description as Задача, user.login as Пользователь, task.date_added, task.is_done as Статус
from task
inner JOIN user on user.id = task.user_id 
where task.assigned_user_id = 2
 * 
 */
?>