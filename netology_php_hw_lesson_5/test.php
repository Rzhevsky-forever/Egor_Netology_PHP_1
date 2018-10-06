<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8" lang="RU">
        <title>Тест</title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    <body>
        <form name="TestInter" method="POST" action="test.php">
            
<?php
$otvet = filter_input(INPUT_POST, 'test'); // Перезаписываем и фильтруем данные из POST в внутреннюю переменную (лечим внутреннюю ошибку Net Beans)
if (empty($otvet)){
    if (!empty($_GET)) { // Какое - то не совсем правильное получение переменной. СДЕЛАТЬ Ч/З ФИЛЬТР
         $test = filter_input(INPUT_GET, 'test'); // Строчный атрибут указанный вторым проверяет на наличие этой строки в INPUT_GET
         $pathToFile = "tests/" . $test; // Формируем путь до файла (относительный) с учетом имени файла
         $fileTest = file_get_contents($pathToFile); // Считываем файл по пути из прошлой строки
         $codirovka = mb_detect_encoding($fileTest, 'UTF-8', 'Windows-1251'); // Вычмсляем кодировку, без двух последних флагов(возможные кодировки) не работет и возвращает UTF-8 всегда
         if (!($codirovka === "UTF-8")) { // Проверяем кодировку UTF-8 или нет
            $fileUTF = mb_convert_encoding($fileTest, 'UTF-8', 'Windows-1251'); // Если НЕ UTF-8 - меняем кодировку на UTF-8 (!! Добавление третьим аргументом исходной кодировки('Windows-1251') исправило проблемму когда символы в этой кодировки перекодировались в "?????..." !!)
         } else {
            $fileUTF = $fileTest;
         }
         $decodeTest = json_decode($fileUTF, TRUE); // Декодируем json и переписываем в массив PHP 
        foreach ($decodeTest as $key => $value) {
            foreach ($value as $test => $namber) {
                foreach ($namber as $k => $v) { ?>
                            <p class="content"> 
                                <?php echo $k; ?>
                            </p>  
                            <div class="radio_form">
                    <?php
                    foreach ($v as $a => $variants) { ?>
                                <div class="radio_buttom test content">
                                    <input type="radio" name="test" value="<?php echo $variants; ?>"> <p><?php echo $variants; ?></p>
                                </div>
                    <?php
                    }
                }
            }
        } ?>
        </div>
        <div class="radio_buttom">
            <input class="content" type="submit" value="Выбрать">
        </div>
        <?php
    }
} elseif (isset ($otvet)){
    if ($otvet == 8 || $otvet == 1000 || $otvet == 78) {
        echo 'Правильно!';
    } else {
        echo $otvet . ' - Это не правильный ответ :)';
    }
  } 
?>
        </form>
    </body>
</html>
