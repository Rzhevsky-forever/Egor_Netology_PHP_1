<?php
// Подключаем менеджера баз данных
include_once 'dbManager.php';
// Подключаем функцию получения данных из POST
include_once 'getPost.php';
// Получаем данные из POST и передаем в переменную
$userRequest = getPost();

// Функция удаления задачи
function deleteTask($userRequest) {
    $delTask = new workWithDb;
    $delTask->connection();
    if (isset($_SESSION['idUser'][0]['id'])) {
        // Готовим idUser
        $idUser = $_SESSION['idUser'][0]['id'];
        // Готовим задачу
        $task = $userRequest['selectedTask'];
        // Готовим запрос
        $request = "delete from task where user_id = $idUser AND description = '$task'";
        $delTask->request($request);
    }
}

// Если все данные для удаления задачи есть, запускаем функцию
if (isset($_SESSION['idUser'][0]['id']) && 
    isset($userRequest['deletTask']) && 
    !empty($userRequest['deletTask']) &&
    isset($userRequest['selectedTask']) &&
    !empty($userRequest['selectedTask'])) {
    deleteTask($userRequest);
}