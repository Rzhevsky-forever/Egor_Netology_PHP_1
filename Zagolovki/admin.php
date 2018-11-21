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
            <div><input type="submit" value="Отправить"></div>
        </div>
    </form>



<?php
if (!empty($_FILES)) {
    if ($_FILES[$fileName]['type'] === 'application/json') {
    $testsCatalog = "tests/" . $_FILES[$fileName]["name"]; // Создаем конечный путь до файла, путь в себя включает имя файла
    (move_uploaded_file($_FILES[$fileName]["tmp_name"], $testsCatalog)) ? header('location: ./list.php', TRUE) : 'Не удалось загрузить файл';   // Перемещаем файл из директория по умолчанию в целевую директорию
    // И Делаем редирект на список тестов
    echo 'Файл загружен';
}   else {
        echo 'Проблемма... Загрузите файл в запрошенном формате ';
    } 
}   
   
?>
    </body>
</html>
