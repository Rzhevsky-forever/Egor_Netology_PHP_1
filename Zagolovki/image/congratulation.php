<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


// Тип содержимого
header('Content-Type: image/png'); // Делаем редирект

// Создание изображения
$image = imagecreatetruecolor(400, 400); // Создаем базовое изображение

// Создание цветов
$white = imagecolorallocate($image, 255, 255, 255); // Белый
$grey = imagecolorallocate($image, 8, 42, 98); // Тень
$blue = imagecolorallocate($image, 14, 18, 208); // Синий
imagefilledrectangle($image, 0, 0, 399, 399, $blue); // Создаем синий прямоугольник от точки - х=0; y=0 размером 399*399

// Считываем имя пользователя
$userName = fread(fopen('../username.txt', 'r+'), 500); // Читаем имя пользователя

// Текст надписи
$text = 'Поздравляем ' . $userName;
// Замена пути к шрифту на пользовательский
$font = __DIR__ . "/Raleway-Black.ttf"; // Определяем каким шрифтом писать. Raleway - свободный шрифт. Аналог всеми любимой Proxima

// Тень
imagettftext($image, 18, 0, 79, 201, $grey, $font, $text);

// Текст
imagettftext($image, 18, 0, 80, 200, $white, $font, $text);

imagepng($image); // Передаем картинку в браузер
imagedestroy($image); // Удаляем картинку

