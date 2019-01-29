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
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    <body>
<?php
    ?>
        <form method="POST" enctype="multipart/form-data" action="admin.php">
            <div class="content form">
                <p>Выбирите файл .json</p>
                <div><input type="file" name="<?php echo $fileName = "uploadfile" ?>" multiple></div>
                <div><input type="submit"></div>
            </div>
        </form>
    <?php
    if (!empty($_FILES)) {
        if ($_FILES[$fileName]['type'] === 'application/json') {
        $testsCatalog = 'tests/' . $_FILES[$fileName]['name']; // Создаем конечный путь до файла, путь в себя включает имя файла
        move_uploaded_file($_FILES[$fileName]['tmp_name'], $testsCatalog);   // Перемещаем файл из директория по умолчанию в целевую директорию
        echo 'Файл загружен'; ?>
        <div class="link">
            <a href="list.php" target="_blank">Перейдите на страницу тестов</a>
        </div>
        <?php } 
        else {
            echo 'Проблемма... Загрузите файл в запрошенном формате ';
        } 
    } ?>
    </body>
</html>
