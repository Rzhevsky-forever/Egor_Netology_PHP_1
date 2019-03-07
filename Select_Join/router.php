<?php
include_once 'userManager.php';

include_once 'getPost.php';

$userRequest  = getPost();
if ($userRequest['userLogin']) {
    if ($userRequest['userPass']) {
        // Создаем объект класса userManager
        $userManager = new userManager;
        // Вызываем функцию аутентификации
        // Здесь ***НАВЕРНО!!! надо передать значения которые уже пришли от пользователя
        $userManager->authentication();
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