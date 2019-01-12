<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//Создаем картинку

/*
$image = imagecreatetruecolor(300, 300);


//Создаем цвет
$backColor = imagecolorallocate($image, 200, 155, 100);
//var_dump($backColor);
$textColor = imagecolorallocate($image, 45, 79, 155);
//var_dump($textColor);

//Базовая картинка
echo (file_exists(__DIR__ . "/star.png")) ? $boxFile = __DIR__ . "/star.png" : 'Файл с картинкой не найден'; // Определяем файл картинку которую будем использовать. Если ее нет печатаем ошибку
//var_dump(file_exists(__DIR__ . "/star.png"));
//Создаем сущность "ресурс php" с картинкой. var_dump($imageBox); вернет : star.pngresource(4) of type (gd) 
$imageBox = imagecreatefrompng($boxFile);


//Создаем нашу базовую картинку которую будем генерировать на сервер
imagefill($image, 0, 0, $backColor);
imagecopy($image, $imageBox, 10, 10, 0, 0, 256, 256);

//Подключаем файл шрифта
echo (file_exists(__DIR__ . "/Raleway-Black.ttf")) ? $fontFile = __DIR__ . "/Raleway-Black.ttf" : 'Файл шрифта не найден'; //Определяем файл ihbanf который будем использовать. Если его нет печатаем ошибку

imagettftext($image, 50, 35, 50, 200, $textColor, $fontFile, '5555'); // 
header('Content-Type: image/png'); // Отправляем закголовок передающий картинку в брузер

imagepng($image);

imagedestroy($image);
 * 
 */

/*
header ('Content-Type: image/png');
$im = @imagecreatetruecolor(1200, 500)
      or die('Невозможно инициализировать GD поток');
$text_color = imagecolorallocate($im, 233, 14, 91);
$fontFile = __DIR__ . "/Raleway-Black.ttf";
imagettftext($im, 32, 45, 25, 25, $text_color, $fontfile, '$text');
//imagestring($im, 2, 5, 5,  'Простая Текстовая Строка', $text_color);
imagepng($im);
imagedestroy($im);
 * 
 */

// Тип содержимого
header('Content-Type: image/png');

// Создание изображения
$image = imagecreatetruecolor(400, 400);

// Создание цветов
$white = imagecolorallocate($image, 255, 255, 255);
$grey = imagecolorallocate($image, 8, 42, 98);
$blue = imagecolorallocate($image, 14, 18, 208);
imagefilledrectangle($image, 0, 0, 399, 399, $blue);

// Считываем имя пользователя
//$userName = fread(fopen('../username.txt', 'r+'), 500);
$userName = $_SESSION['userName'];

// Текст надписи
$text = 'Поздравляем ' . $userName;
// Замена пути к шрифту на пользовательский
$font = __DIR__ . "/Raleway-Black.ttf";

// Тень
imagettftext($image, 18, 0, 79, 201, $grey, $font, $text);

// Текст
imagettftext($image, 18, 0, 80, 200, $white, $font, $text);

imagepng($image);
imagedestroy($image);

