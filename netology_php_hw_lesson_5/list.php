<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8" lang="RU">
        <title>Выбор теста</title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    <body>
       
        
<?php
    $testsCatalog = "tests/";
    $scanCatalog = scandir($testsCatalog);
    var_dump($scanCatalog); //Test print
        foreach ($scanCatalog as $key => $value) {
            if (is_string($value) and stripos($value, ".json")){
                ?>
                <form name="Передаю тесты" method="GET" action="test.php">
                    <p class="content">Выберите тест:</p>
                    <div class="radio_form">
                        <div class="radio_buttom">
                            <input type="radio" name="test" value="<?php echo $value ?>"> <p><?php echo $value ?></p>
                        </div>
                         <div class="radio_buttom">
                             <input class="content" type="submit" value="Выбрать">
                        </div>
                    </div>
                </form>   
        <?php
            }
        }
        ?>  
        <!--------------
    <form name="Передаю тесты" method="GET" action="test.php">
        <p class="content">Выберете тест:</p>
        <div class="radio_form">
            <div class="radio_buttom">
                <input type="radio" name="test" value="<//?php echo $test_1 ?>"> <p>Тест №1</p>
            </div>
             <div class="radio_buttom">
                <input type="radio" name="test" value="<//?php echo $test_2 ?>"> <p>Тест №2</p>
            </div>
             <div class="radio_buttom">
                 <input class="content" type="submit" value="Выбрать">
            </div>
        </div>
    </form>
        ------------>
    </body>
</html>