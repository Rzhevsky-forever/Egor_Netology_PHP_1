<?php
session_start(); // Запускаем сессию
function makeUserName() {
    include_once 'checkAdmin.php';
//    var_dump($_COOKIE);
    if (!empty($_COOKIE['userLogin'])) $userName =  $_COOKIE['userLogin'];
//    if (FALSE != (filter_input(INPUT_POST, $_POST['userLogin']))) $userName =  filter_input(INPUT_POST, $_POST['userLogin']);
//             var_dump($userName); echo ' str 22'; // Тестовый  вывод
             $fileUserName = fopen('./username.txt', 'w+');
             $txtUserName = fwrite($fileUserName, $userName);
             return $txtUserName;
}