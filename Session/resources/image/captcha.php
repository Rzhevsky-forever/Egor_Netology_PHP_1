<?php
session_start();
// Тип содержимого
header('Content-Type: image/png');

// Создание изображения
$image = imagecreatetruecolor(150, 50);

// Создание цветов
$white = imagecolorallocate($image, 255, 255, 255);
$grey = imagecolorallocate($image, 127, 127, 127);
$blue = imagecolorallocate($image, 14, 18, 208);
imagefilledrectangle($image, 0, 0, 399, 399, $blue);

// Текст надписи
$text = $_SESSION['captcha'];
//$text = rand(1111, 9999);
//$_SESSION['captcha'] = $text;
// Замена пути к шрифту на пользовательский
$font = __DIR__ . "/Raleway-Black.ttf";

// Текст
imagettftext($image, 18, 0, 45, 35, $white, $font, $text);

imagepng($image);
imagedestroy($image);
?>