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
            <div><input type="submit"></div>
        </form>
        <?php
        if (!empty($_FILES)) {
//            var_dump($_FILES); // Test print
            if ($_FILES[$fileName]['type'] === 'application/json'){
//                echo ($_FILES[$fileName]['type']) . "<br>"; // Test print
                $testName = $_FILES[$fileName]["name"];
//                echo "<br>"."<br>"."<br>"."<br>"."<br>"."<br>".$testName;
                move_uploaded_file($_FILES[$fileName]["tmp_name"], $_FILES[$fileName]["name"]); // Перемещаем файл из директория по умолчанию в директорию, где admin.php
        }   else {
                echo 'Проблемма... Загрузите файл в запрошенном формате ';
            } 
        }   
        else {
            echo 'Файл не был загружен. Загрузите файл и повторите отправку';
        }
        ?>
    </body>
</html>
