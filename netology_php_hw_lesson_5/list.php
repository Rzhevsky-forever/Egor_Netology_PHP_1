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
echo 'Название теущего файла ' . $testName . "<br>";
$pathToTest = "D:/wamp64/www/netology_php_hw_lesson_5/" . $testName; // Правильный полный путь до файла
echo 'Путь до текущего файла теста: ' . $pathToTest;
    if (file_exists($pathToTest)) {
        ?>  
            <div class="wrapper_row">
                <form method="POST" action="test.php">
                    <input type="radio" name="<?php echo $testName; ?>" value="<?php echo $testName; ?>"><p>Тест №1 под именем:  <?php echo $testName; ?></p>
                    <input type="submit" value="Выбрать">
                </form> 
            </div>
    <?php     
    }
?>
        
    </body>
</html>