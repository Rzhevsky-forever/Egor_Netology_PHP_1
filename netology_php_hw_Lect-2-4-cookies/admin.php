<html>
    <head>
        <meta charset="UTF-8" lang="RU">
        <title>Admin</title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    <body>
<?php
    if (!empty($_COOKIE)) {
        if ($_COOKIE['adminLogin'] === 'Login' && $_COOKIE['adminPass'] === 'Pass') : ?>
            <div class="superTitle">
                Административная панель
            </div>
            <form method="POST" enctype="multipart/form-data" action="admin.php">
                <div class="content wrapper_column">
                    <p class="form-item">Выбирите файл .json</p>
                    <div class="form-item"><input type="file" name="<?php echo $fileName = "uploadfile" ?>" multiple></div>
                    <div class="form-item"><input type="submit" value="Отправить"></div>
                </div>
            </form>
        <?php else :
            /*--- Удалить тест ---*/
            if (!empty ($_POST['delFile'])) :
                unlink($delFile);
            endif;
        endif;
    }
    var_dump($_COOKIE);
?>

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
