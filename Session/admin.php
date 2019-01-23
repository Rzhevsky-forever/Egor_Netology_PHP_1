<?php
// Запускаем сессию
session_start();
// Подключаем файл с функцией определения $_SESSION['role']
include_once 'core/gatekeeper_session.php';
// Функция проверяет $_SESSION['role']
gatekeeper_session();?>
    <html>
        <head>
            <meta charset="UTF-8" lang="RU">
            <title>Admin</title>
            <link rel="stylesheet" href="CSS/style.css" type="text/css">
        </head>
        <body>
            <?php
            // Включаем отображение ошибок
            // Отображение ?????
            ini_set('error_reporting', E_ALL);
            // Отображение ?????
            ini_set('display_errors', 1);
            // Отображение ?????
            ini_set('display_startup_errors', 1);
            // var_dump($_SESSION); // Testing
            if (!gatekeeper_session()) { ?>
                <a href="index.php">
                    <img class="fullScrinImag" src="resources/image/403_Forbidden.jpg">
                </a>
            <?php } else { ?>
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
                <div>
                    <a href="list.php">К списку тестов</a>
                </div>
                <div>
                    <a href="core/logout.php">ВЫЙТИ</a>
                </div>    
                <?php if (!empty($_FILES)) {
                    if ($_FILES[$fileName]['type'] === 'application/json') {
                    $testsCatalog = "tests/" . $_FILES[$fileName]["name"]; // Создаем конечный путь до файла, путь в себя включает имя файла
                    (move_uploaded_file($_FILES[$fileName]["tmp_name"], $testsCatalog)) ? header('location: ./list.php', TRUE) : 'Не удалось загрузить файл';   // Перемещаем файл из директория по умолчанию в целевую директорию
                    // И Делаем редирект на список тестов
                    echo 'Файл загружен';
                    } else {
                        echo 'Проблемма... Загрузите файл в запрошенном формате ';
                    } 
                }   
            } ?>
        </body>
    </html>
<?php ?>