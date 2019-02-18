<?php
include_once 'dbManager.php';
function displayList() {
    $displayList = new workWithDb;
    $displayList->connection();
    $userRequest = 'select description from task where user_id =' . $_SESSION['idUser'][0]['id'];
    $list = $displayList->output($userRequest);
    return $list;
}