<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8" lang="RU">
        <title>Выбор теста</title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    <body>
       
        
<?php
    $testsCatalog = "tests/"; // Указываем каталог в котором находятся тесты
    $scanCatalog = scandir($testsCatalog); // Слушаем катлог в который загруженны тесту, данные получаем в виде массива
//    var_dump($scanCatalog); //Test print
?>
        <div class="wrapper_row"> <!-- Это обертка для вывода -->
            
            <form class="wrapper_column" name="Передаю тесты" method="GET" action="test.php"> <!-- Это форма которая передает тесты на проверку -->
                    <p class="content">Выберите тест:</p>
                    <div class="radio_form">
                
<?php    
    foreach ($scanCatalog as $key => $value) { // Проходим каталог с тестами где названия тестов - значения в массиве
        if (is_string($value) and stripos($value, ".json")){ // Проверяем является ли значение массива строкой и содержит ли .json. Если содержит выводим
            ?>
        
                <div class="radio_buttom">
                    <input type="radio" name="test" value="<?php echo $value ?>"> <p><?php echo $value ?></p>
                </div>
            <?php
        }
    }
?>  
                
                        <div class="radio_buttom">
                             <input class="content" type="submit" value="Выбрать">
                        </div>
                        <p>
                            Как Вас зовут?
                        </p>
                    <div class="radio_buttom">
                        <input type="text" name="name">
                    </div>
                        </div>
                </form>
            
        </div>
    </body>
</html>