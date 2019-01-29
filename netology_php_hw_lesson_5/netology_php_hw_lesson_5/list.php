<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8" lang="RU">
        <title>Выбор теста</title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    <body>
        <p class="content">Выберите тест:</p>
        <form name="Передаю тесты" method="GET" action="test.php">
            <div class="radio_form">
                <div class="radio_buttom">
<?php
    $testsCatalog = 'tests/';
    $scanCatalog = scandir($testsCatalog);
//    var_dump($scanCatalog); //Test print
        foreach ($scanCatalog as $part => $value) {
            if (is_string($value) and stripos($value, '.json')){
                ?>
                    <input type="radio" name="test" value="<?php echo $value ?>"> <p><?php echo $value ?></p>
        <?php }
        } ?>  
                </div>
            </div>
             <div class="radio_buttom">
                 <input class="content" type="submit" value="Выбрать">
            </div>
        </form>   
    </body>
</html>