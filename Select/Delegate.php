<?php
// Запускаем сессию
session_start();
// Подключаем библиотеки
// Библиотека для работы с базой
include_once 'dbManager.php';
// Функция вывода юзеров
include_once 'displayUsers.php';
// Получение данных из POST
include_once 'getPost.php';
$userRequest = getPost();

//====================================
echo '<pre>'; // Testing
var_dump($userRequest); // Testing
echo '</pre>'; // Testing
//====================================

function displayList() {
    $displayList = new workWithDb;
    $displayList->connection();
    $idUser = $_SESSION['idUser'][0]['id'];
    $userRequest = "select id, description from task where user_id = $idUser";
    $list = $displayList->output($userRequest);
    return $list;
}
?>

<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title> Перепоручить </title>
        <link rel="stylesheet" href="style/style.css" type="text/css">
    </head>
    <body>
        <form action="Delegate.php" method="POST" name="task">
        <h3> Выберете задачу : </h3>
            <h4>
                <?php if (!empty (displayList())) {
                    $list = displayList();
//                    echo '<pre>'; // Testig
//                    var_dump($list); // Testing
//                    echo '</pre>'; // Testing
                    foreach ($list as $key => $value) {
                        foreach ($value as $k => $val) {
                            if ($k === 'id'){
                                $id = $val;
                            }
                            if ($k === 'description') {
                                $description = $val; ?>
                            <div>
                                <input type="checkbox" name="selectedTask" value="<?php echo $id; ?>"> <?php echo $description; ?> <br>
                            </div>
                            <?php } ?>
                        <?php }
                    }
                } else {
                    echo 'Нет задач';
                } ?>
            </h4>
            <h3> Кому перепоручить : </h3>
            <h4>
                <?php if (!empty(displayUser())) {
                    // Помещаем список пользователей в переменную
                    $displayUser = displayUser();
                    // var_dump($displayUser); // Testing
                    foreach ($displayUser as $user) {
                        foreach ($user as $k => $val) { 
                            if ($k === 'id') {
                                $id = $val;
                            }
                            if ($k === 'login'){ 
                                $login = $val ?>
                                <div>
                                    <input type="checkbox" name="selectedUser" value="<?php echo $id; ?>"> <?php echo $login; ?> <br>
                                </div>
                            <?php }
                        }
                    }
                }
                print '<pre>';
                var_dump(displayList()); // Testing
                print '</pre>';
                ?>
            </h4>
            <div class="radio_buttom buttom_submit">
                <input type="submit">
            </div>
        </form>
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
    $request = "update task set assigned_user_id = $assigned_user_id where id = $id";
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
print '$_SESSION : <br />'; // Testing
var_dump($_SESSION); // Testing
print '<br /> $_POST : <br />'; // Testing
print '<pre>'; // Testing
// var_dump($_POST); // Testing
print '</pre>'; // Testing
?>

<?php // select id as номер, description as описание, id from task where user_id =23
// Структура
// Таблицу юзеров для выбора юзера которому перепоручаем
// 
// 
// update task set assigned_user_id = 26 where id = 34
// Нужны данные :
// id того кому перепоручаем (из таблицы user)
// id задачи которую перепоручаем
?>