<?php
include_once 'dbManager.php';
function displayList() {
    $displayList = new workWithDb;
    $displayList->connection();
    $idUser = $_SESSION['idUser'][0]['id'];
    $userRequest = "select task.id as id, user.login as login, task.description as task, task.date_added as date, task.is_done as done
                    from task
                    join user
                    on task.user_id = user.id
                    or task.assigned_user_id = user.id
                    where user.id = $idUser";
    $list = $displayList->output($userRequest);
    return $list;
}

/*
 * select task.id as id, task.description as Задача, user.login as Пользователь 
from task
join user
on task.user_id = user.id
    or task.assigned_user_id = user.id
where user.id = 2
 * 
 * 
 * Old
 * select task.description as Задача
                    from task
                    where user_id = $idUser
                    or assigned_user_id = $idUser";
 */