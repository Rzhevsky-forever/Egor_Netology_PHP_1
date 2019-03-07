<?php
// Подключаем функцию работы с базами данных
include_once 'dbManager.php';
// Подключаем алгоритм получения данных из POST
include_once 'getPost.php';
// Получаем данные из POST
$userRequest = getPost();

function markAs($userRequest) {
    if (
        isset($_SESSION['idUser'][0]['id']) &&
        !empty($_SESSION['idUser'][0]['id']) &&
        isset($userRequest['selectedTask']) &&
        !empty($userRequest['selectedTask'])
        ) {
        // Получаем user_id
        $user_id =  $_SESSION['idUser'][0]['id']; 
        // Получаем description
        $description = $userRequest['selectedTask'];

        // Соединяемся с базой
        $connection = new workWithDb;
        $connection->connection();

        // Готовим запрос id задачи
        $requestIdTask = "select id from task where user_id = $user_id AND description = '$description'";

        // Получаем id задачи
        $idTask = $connection->output($requestIdTask);
        $idTask = $idTask[0]['id'];
        
        // Устанавливаем статус задачи
        if (!empty($idTask)) {
            // Готовим запрос "отметить как"
            $requestIdTask = "UPDATE task SET is_done= 1 WHERE user_id= $user_id AND id= $idTask";
            $connection->request($requestIdTask);
        }

    }
}

// Выполняем запрос "отметить как выполненную"
// Если мы получили запрос "отметить как выполненную" ($_POST['markAs']) :
if (isset($userRequest['markAs'])) {
    // И значение запроса === 'markAs'
    if ($userRequest['markAs'] === 'markAs') {
        // Вызываем функцию она там сама все делает как - то...
        markAs($userRequest);
    }
}