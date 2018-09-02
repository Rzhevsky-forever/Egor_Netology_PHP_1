<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8" lang="RU">
        <title>Быстрый тест</title>
    </head>
    <body>
        <?php
            $test__str = file_get_contents(__DIR__. '/test.json'); //Получаем значения
            $test__arr = json_decode($test__str, TRUE); // Дектодируем
            var_dump($test__arr);  // Промежуточный вывод


            if (empty($_GET)): // Лечим ошибку с пустым значеним массива, которая возникает когда пользователь выбирает меньше двух( в этом случае обоих) тестов
                $_GET = ['a' => NULL, 'b' => NULL];
            elseif (empty($_GET['a'])) :             
                $_GET['a'] = NULL;
            elseif (empty($_GET['b'])) :             
                $_GET['b'] = NULL;
            endif;
           var_dump($_GET); // Контрольный вывод значений
//           var_dump($_POST); // Контрольный вывод значений
           
            if ($_GET['a'] == null and $_GET['b'] == null) { // Пользователь ни чего не выбрал.
                echo 'Вы не выбрали не один тест';
            } elseif ($_GET['a'] != NULL) { // Пользователь выбрал вариант "тест 1".
                $test_1 = $_GET['a'];
            ?>
            <p>Сколько бит в байте?</p>
            <form action="NON.php" method="POST">
            <?php
                foreach ($test__arr[$test_1] as $value) { ?>
                    
                        
                    <p><input type="radio" name="q_1" value="<?php echo $value; ?>"> <?php echo $value; ?> </p>
                    
                    
            <?php
                }
            ?>
                    <input type="submit" value="Отправить">        
                    </form>
            <?php
            } elseif ($_GET['b'] != NULL) { // Пользователь выбрал вариант "тест 2".           
                $test_2 = $_GET['b'];
            };
        ?>

    </body>
</html>
