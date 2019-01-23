<?php
session_start();

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
$userName = $_SESSION['userName'];

// Текст надписи
$text = 'Поздравляем ' . $userName;
// Замена пути к шрифту на пользовательский
$font = __DIR__ . "/Raleway-Black.ttf";

// Текст
imagettftext($image, 18, 0, 80, 200, $white, $font, $text);

imagepng($image);
imagedestroy($image);