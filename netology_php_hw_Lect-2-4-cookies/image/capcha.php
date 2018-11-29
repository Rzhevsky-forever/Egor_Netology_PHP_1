<?php
// Тип содержимого
header('Content-Type: image/png');

// Создание изображения
$image = imagecreatetruecolor(400, 50);

// Создание цветов
$white = imagecolorallocate($image, 255, 255, 255);
$grey = imagecolorallocate($image, 8, 42, 98);
$blue = imagecolorallocate($image, 14, 18, 208);
imagefilledrectangle($image, 0, 0, 399, 399, $blue);

// Считываем имя пользователя
//$userName = fread(fopen('../username.txt', 'r+'), 500);

// Капча
$capcha = rand(1111, 9999);

// Текст надписи
$text = 'Введите код с картинки:    ' . $capcha;
// Замена пути к шрифту на пользовательский
$font = __DIR__ . "/Raleway-Black.ttf";

// Тень
imagettftext($image, 14, 0, 52, 32, $grey, $font, $text);

// Текст
imagettftext($image, 14, 0, 50, 30, $white, $font, $text);

imagepng($image);
imagedestroy($image);