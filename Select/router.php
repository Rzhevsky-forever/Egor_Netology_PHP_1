<?php
include_once 'userManager.php';

include_once 'getPost.php';
//$filterOptions = [
//            // Авторизация
//            'userLogin' => FILTER_SANITIZE_STRING,
//            'userPass' => FILTER_SANITIZE_STRING,
//    
//            // Рагитсрация
//            'userLogin_Reg' => FILTER_SANITIZE_STRING,
//            'userPass_Reg' => FILTER_SANITIZE_STRING,
//            
//            // Для работы с задачами :
//            // Создать задачу
//            'newTask' => FILTER_SANITIZE_STRING,
//            // Показать список задач
//            'displayList' => FILTER_SANITIZE_STRING,
//            // Удалить задачу
//            'deletTask' => FILTER_SANITIZE_STRING,
//            // Отметить как выполненную или не выполненую
//            'MarkAs' => FILTER_SANITIZE_STRING,
//            // Перепоручить задачу
//            'delegate' => FILTER_SANITIZE_STRING,
//            // Показать делигированные
//            'showDelegated' => FILTER_SANITIZE_STRING,
//            // Показать общее количество задач
//            'showAmountTask' => FILTER_SANITIZE_STRING
//        ];
//$userRequest = filter_input_array(INPUT_POST, $filterOptions);
$userRequest  = getPost();
if ($userRequest['userLogin']) {
    if ($userRequest['userPass']) {
        // Создаем объект класса userManager
        $userManager = new userManager;
        // Вызываем функцию аутентификации
        // Здесь ***НАВЕРНО!!! надо передать значения которые уже пришли от пользователя
        $userManager->authentication();


        echo '<hr />';
        var_dump($_SESSION);
        echo '<br />';
    }
}
elseif ($userRequest['userLogin_Reg']) {
    if ($userRequest['userPass_Reg']) {
        // Создаем объект класса userManager
        $userManager = new userManager;
        // Вызываем метод регистрации
        $userManager->registration($userRequest['userLogin_Reg'], $userRequest['userPass_Reg']);
    } else {
        echo 'При регистрации необходимо заполнить оба поля';
    }
}