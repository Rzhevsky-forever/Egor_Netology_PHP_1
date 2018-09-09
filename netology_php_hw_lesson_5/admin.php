<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8" lang="RU">
        <title>Admin</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <?php
        $fileName = "uploadfile";
        ?>
        <form method="POST" enctype="multipart/form-data" action="admin.php">
            <p>Выбирите файл .json</p>
            <div><input type="file" name="<?php echo $fileName ?>" multiple></div>
            <div><input type="submit"</div>
        </form>
        <?php
        if (!empty($_FILES)) {
            var_dump($_FILES); // Test print
            if ($_FILES[$fileName]['type'] === 'application/json'){
                echo ($_FILES[$fileName]['type']) . "<br>"; // Test print
                $testName = $_FILES[$fileName]["name"];
                echo "<br>"."<br>"."<br>"."<br>"."<br>"."<br>".$testName;
                move_uploaded_file($_FILES[$fileName]["tmp_name"], $_FILES[$fileName]["name"]); // Перемещаем файл из директория по умолчанию в директорию, где admin.php
        }   else {
                echo 'Проблемма... Загрузите файл в запрошенном формате ';
            } 
        }   
        else {
            echo 'Файл не был загружен. Загрузите файл и повторите отправку';
        }
        
        
//-----------СТАРОЕ **НЕ** ПРАВИЛЬНОЕ РЕШЕНИЕ---------------
// . $_FILES[$fileName]["name"]        
//        $u = 'qw'; // Работ с массивом
//        $t = 'er';
//        $o = 'po';
//        $z = 'rt';
//        $a = ['name' => [$u => $t, $z => $o]];
//        if ($a['name'][$u] == $t) {
//            echo $a['name'][$z];
//        };
//        $uploadDir = './testsDir/';
//        $uploadfile = $uploadDir.basename($_FILES['uploadfile']['name']);
//        
//        if (is_uploaded_file($_FILES ['uploadfile']['tmp_name'])){
//            copy($_FILES ['test-fileName']['tmp_name'], $uploadDir);
//        }
//            $form = [
//                'test-1'=>['a1' => 8, 'a2' => 16, 'a3' => 60, 'a4' => 100],
//                'test-2'=>['b1' => 10, 'b2' => 20, 'b3' => 30, 'b4' => 40]
//            ];
//            //var_dump($form); // Промежуточный контрольный вывод массива
//            $json_form = json_encode($form);
//            // echo $json_form; // Промежуточный контрольный вывод строчной формы для JSON
//            file_put_contents(__DIR__ . '/test.json', $json_form);//Создаем и одновременно пишем файл test.json
//            //echo file_get_contents('test.json'); // Тестовый вывод
            
        ?>
        
    </body>
</html>
