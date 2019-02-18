<?php
function getPost (){
    $filterOptions = [
            // Авторизация
            'userLogin' => FILTER_SANITIZE_STRING,
            'userPass' => FILTER_SANITIZE_STRING,
    
            // Рагитсрация
            'userLogin_Reg' => FILTER_SANITIZE_STRING,
            'userPass_Reg' => FILTER_SANITIZE_STRING,
            
            // Для работы с задачами :
            // Создать задачу
            'newTask' => FILTER_SANITIZE_STRING,
            // Показать список задач
            'displayList' => FILTER_SANITIZE_STRING,
            // Удалить задачу
            'deletTask' => FILTER_SANITIZE_STRING,
            // Отметить как выполненную
            'markAs' => FILTER_SANITIZE_STRING,
            // Перепоручить задачу
            'delegate' => FILTER_SANITIZE_STRING,
            // Показать делигированные
            'showDelegated' => FILTER_SANITIZE_STRING,
            // Показать общее количество задач
            'showAmountTask' => FILTER_SANITIZE_STRING,
            // Выделенная задача
            'selectedTask' => FILTER_SANITIZE_STRING,
            // Выделенный юзер
            'selectedUser' => FILTER_SANITIZE_STRING
        ];
$userRequest = filter_input_array(INPUT_POST, $filterOptions);
return $userRequest;
}