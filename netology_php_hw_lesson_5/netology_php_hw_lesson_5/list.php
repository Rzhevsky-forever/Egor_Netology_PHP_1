<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8" lang="RU">
        <title>Выбор теста</title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    <body>
       
        
<?php
    $testsCatalog = "D:/wamp64/www/netology_php_hw_lesson_5/tests/";
    $scanCatalog = scandir($testsCatalog);
    var_dump($scanCatalog); //Test print
        foreach ($scanCatalog as $key => $value) {
            if($key == 2) {
                $test_1 = $value;
            } elseif ($key == 3) {
                $test_2 = $value;
            }
        }
?>  <form name="Передаю тесты" method="POST">
        <p class="content">Выберете тест:</p>
        <div class="radio_form">
            <div class="radio_buttom">
                <input type="radio" name="tetst" value="<?php echo $test_1 ?>"> <p>Тест №1</p>
            </div>
             <div class="radio_buttom">
                <input type="radio" name="tetst" value="<?php echo $test_2 ?>"> <p>Тест №2</p>
            </div>
             <div class="radio_buttom">
                 <input class="content" type="submit" value="Выбрать">
            </div>
        </div>
    </form>
    </body>
</html>