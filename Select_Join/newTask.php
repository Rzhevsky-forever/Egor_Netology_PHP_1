<?php
include_once 'dbManager.php';

include_once 'getPost.php';
$userRequest = getPost();

function newTask($userRequest){
    $newTask = new workWithDb;
    $newTask->connection();
    if (isset($_SESSION['idUser'][0]['id'])) {
        $idUser = $_SESSION['idUser'][0]['id'];
        $userRequest = $userRequest['newTask'];
        // Готовим запрос
        $userRequest = "insert into task (user_id, description, date_added) values ($idUser, '$userRequest', curdate())";
        // Передаем запрос
        $newTask = $newTask->request($userRequest);
    }
}
if (isset($_SESSION['idUser'][0]['id']) && isset($userRequest['newTask']) && !empty($userRequest['newTask'])) {
    newTask($userRequest);
}