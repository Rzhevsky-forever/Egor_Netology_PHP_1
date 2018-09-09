<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8" lang="RU">
        <title>Выбор теста</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        
<?php
$testName = $_GET['get']; // Получаем значение переменной из admin.php
//    $testName = "D:/wamp64/www/netology_php_hw_lesson_5/" . $testName; // Правильный вид пути до файла
//    echo $testName;// Test print
    if (file_exists($testName)) {
        ?>  
            <div class="wrapper_row">
                <form method="POST" action="test.php">
                    <input type="radio" name="<?php echo $testName; ?>" value="<?php echo $testName; ?>"><p><?php echo $testName; ?></p>
                    <input type="submit" value="Выбрать">
                </form> 
            </div>
    <?php     
    }
?>
        
    </body>
</html>