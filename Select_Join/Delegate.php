<?php
// Запускаем сессию
session_start();
// Получаем из сессии текщего пользователя
$idUser = $_SESSION['idUser'][0]['id'];
// Подключаем библиотеки
// Библиотека для работы с базой
include_once 'dbManager.php';
// Функция вывода юзеров
include_once 'displayUsers.php';
// Получение данных из POST
include_once 'getPost.php';
$userRequest = getPost();
include_once 'displayList.php';
$list = displayList();
?>

<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title> Перепоручить </title>
        <link rel="stylesheet" href="style/style.css" type="text/css">
    </head>
    <body>
        <form id="Delegate" action="Delegate.php" method="POST" name="task"></form>
        <h3> Выберете задачу : </h3>
        <table border="1">
             <tr>
                <th>Выбрать</th>
                <th>Задача</th>
                <th>Дата создания</th>
                <th>Статус</th>
            </tr>
            <?php if (!empty (displayList())) {
                $list = displayList();
                foreach ($list as $key => $value) {
                    foreach ($value as $k => $val) {
                        switch ($k) :
                            case 'id':
                                $id = $val;
                                break;
                            case 'login':
                                $login = $val;
                                if (empty($login)) { $login = 'Нет задач';}
                                break;
                            case 'task': 
                                $description = $val;
                                if (empty($description)) { $description = 'Нет задач';}
                                break;
                            case 'date': 
                                $date = $val;
                                if (empty($date)) { $date = 'Нет задач';}
                                break;
                            case 'done':
                                $done = $val;
                                if ($done === '0') {
                                    $done = 'Не выполнено';
                                } elseif (empty ($done)) {
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
                            <td><input type="radio" form='Delegate' name="selectedTask" value="<?php echo $id; ?>"></td>
                            <td class="task"> <?php echo $description; ?> </td>
                            <td class="task"> <?php echo $date; ?> </td>
                            <td class="task"> <?php echo $done; ?> </td>
                        </tr>
                <?php }
            } else {
                echo 'Нет задач';
            } ?>
            </table>
        <h3> Кому перепоручить : </h3>
            <table border="1">
                <tr>
                    <th>Выбрать</th>
                    <th>Задача</th>
                </tr>
                <?php if (!empty(displayUser())) {
                    // Помещаем список пользователей в переменную
                    $displayUser = displayUser();
                    foreach ($displayUser as $user) {
                        foreach ($user as $k => $val) { 
                            if ($k === 'id') {
                                $id = $val;
                            }
                            if ($k === 'login'){
                                    if ($val === $idUser) {
                                        continue;
                                    }
                                $login = $val ?>
                                <tr>
                                    <td><input type="checkbox" form='Delegate' name="selectedUser" value="<?php echo $id; ?>"></td>
                                    <td> <?php echo $login; ?> </td>
                                </tr>
                            <?php }
                        }
                    }
                } ?>
            </table>
            <div class="radio_buttom buttom_submit">
                <input type="submit" form="Delegate" value="Применить">
            </div>
        
        <div class="exit">
            <a href="Exit.php">Выйти</a>
        </div>
    </body>
</html>

<?php
function delegate($userRequest) {
    $connection = new workWithDb();
    $connection->connection();
    $assigned_user_id = $userRequest['selectedUser'];
    $id = $userRequest['selectedTask'];
    $request = "update task set assigned_user_id = $assigned_user_id where id = $id"; // установить id юзера в задачу
    $connection->request($request);
}

if (isset($userRequest['selectedTask']) &&
    !empty($userRequest['selectedTask']) &&
    isset($userRequest['selectedUser']) &&
    !empty($userRequest['selectedUser'])
    ) {
        delegate($userRequest);
}
?>

<?php
    // echo '<pre>';var_dump($userRequest);echo '</pre>';
?>