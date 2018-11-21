<?php
function makeUserName() {
    if (FALSE != (filter_input(INPUT_GET, 'name'))) $userName =  filter_input(INPUT_GET, 'name'); // Проверяем и присваиваем имя пользователя полученное с помощью GET из формы
//             var_dump($userName); echo ' str 22'; // Тестовый  вывод
             $fileUserName = fopen('./username.txt', 'w+'); // Создаем файл для хранения имени пользователя
             fwrite($fileUserName, $userName); // Пишем имя пользователя
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

