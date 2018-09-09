<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8" lang="RU">
        <title></title>
    </head>
    <body>
        
<?php
    $testName = "\\D:\wamp64\www\netology_php_hw_lesson_5" . $testName;
    echo $testName;
//    var_dump($_FILES); // Test print
//    var_dump($_POST); // Test print
    if (file_exists($testName)) {
        ?>  <div>
            <form method="POST">
                <input type="radio" name="<?php echo $testName; ?>" value="xz">
            </form> 
            </div>
   <?php     
    }
    
    
    

//-----------СТАРОЕ **НЕ** ПРАВИЛЬНОЕ РЕШЕНИЕ---------------
////Получаем данные из test.json
//$test_list_j = file_get_contents(__DIR__ . "./test.json", true);
////echo $test_list_j; // Промежуточный вывод
//$test_list = json_decode($test_list_j, TRUE);
////var_dump($test_list); // Промежуточный вывод
//
//$i = 0; // Это я так передаю заголовки тестов в переменные для вывода
//foreach ($test_list as $key => $v) { 
//    if ($i < 1) { $a = $key; }  
//    if ($i > 1) { $b = $key; }
//    $i = $i+2; // Такое решение лучше предидущего
//}
?>
        
    </body>
</html>