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
<?php

$otvet = filter_input(INPUT_POST, 'test');
if (empty($otvet)){
    if (!empty($_GET)) { // Какое - то не совсем правильное получение переменной
         $test = filter_input(INPUT_GET, 'test'); // Строчный атрибут указанный вторым проверяет на наличие этой строки в INPUT_GET
         $pathToFile = "tests/" . $test; // Формируем путь до файла (относительный) с учетом имени файла
         $fileTest = file_get_contents($pathToFile); // Считываем файл по пути из прошлой строки
         $decodeTest = json_decode($fileTest, TRUE);
    
        foreach ($decodeTest as $key => $value) {
            foreach ($value as $test => $namber) {
                foreach ($namber as $k => $v) {
                    foreach ($v as $a => $b) {
                        $variants[] = $b; 
                    }
                }
            }
        }

 ?>
    <form name="TestInter" method="POST" action="test.php">
        <p class="content"> 
            <?php foreach ($decodeTest as $key => $vv){
                foreach ($vv as $f => $s) {
                    foreach ($s as $n => $q) {
                        echo $n;
                    }
                }
            }
?>
        </p>
        <div class="radio_form"> <!-- Тоже надо сделать в цыкле ... -->
            <div class="radio_buttom test content">
                <input type="radio" name="test" value="<?php echo $variants[0]; ?>"> <p><?php echo $variants[0]; ?></p>
            </div>
            <div class="radio_buttom test content">
                <input type="radio" name="test" value="<?php echo $variants[1]; ?>"> <p><?php echo $variants[1]; ?></p>
            </div>
            <div class="radio_buttom test content">
                <input type="radio" name="test" value="<?php echo $variants[2]; ?>"> <p><?php echo $variants[2]; ?></p>
            </div>
            <div class="radio_buttom test content">
                <input type="radio" name="test" value="<?php echo $variants[3]; ?>"> <p><?php echo $variants[3]; ?></p>
            </div>
            <div class="radio_buttom">
                <input class="content" type="submit" value="Выбрать">
            </div>
        </div>
    </form>
<?php 
    }
} elseif (isset ($otvet)){    
    if ($otvet == 8 || $otvet == 1000 || $otvet == 9999 || $otvet == 78) {
        echo 'Правильно!';
    } else {
        echo 'Не правильно!';
    }
  } 
?>



    </body>
</html>
