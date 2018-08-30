<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $form = [
                ['a1' => 10, 'a2' => 20, 'a3' => 30, 'a4' => 40],
                ['b1' => 10, 'b2' => 20, 'b3' => 30, 'b4' => 40]
            ];
            //var_dump($form); // Промежуточный контрольный вывод массива
            $json_form = json_encode($form);
            // echo $json_form; // Промежуточный контрольный вывод строчной формы для JSON
            file_put_contents(__DIR__ . '/test.json', $json_form);//Создаем и одновременно пишем файл test.json
            //echo file_get_contents('test.json'); // Тестовый вывод
            
        ?>
    </body>
</html>
