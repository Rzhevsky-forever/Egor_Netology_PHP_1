<?php
// Стартуем сессию
session_start();
// Подключаем функцию ацтентификацйии
include_once 'core/gatekeeper_session.php';
// Функция проверяет $_SESSION['role']
gatekeeper_session();
// Включаем отображение ошибок
    // Отображение ?????
    ini_set('error_reporting', E_ALL);
    // Отображение ?????
    ini_set('display_errors', 1);
    // Отображение ?????
    ini_set('display_startup_errors', 1); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" lang="RU">
        <title>Выбор теста</title>
        <link rel="stylesheet" href="CSS/style.css" type="text/css">
    </head>
    <body>
        <?php if (gatekeeper_session()){
            include_once 'core/scanCatalog.php'; ?>
            <div class="wrapper_row">
                <form class="wrapper_column" name="Передаю тесты" method="GET" action="test.php">
                    <p class="content">Выберите тест:</p>
                    <div class="radio_form">
                    <?php foreach (scanCatalog() as $key => $value) {
                        if (is_string($value) and stripos($value, ".json")){ ?>
                            <div class="radio_buttom">
                                <input type="radio" name="test" value="<?php echo $value ?>"> <p><?php echo $value ?></p>
                            </div>
                        <?php }
                        } ?>
                            <div class="radio_buttom">
                                <input class="content" type="submit" value="Выбрать">
                            </div>
                            <a href="core/logout.php">ВЫЙТИ</a>
                            <?php if (gatekeeper_session() === 'admin') { ?>
                                <div class="radio_buttom">
                                    <input class="content" type="submit" name="del" value="Удалить">
                                </div>
                                <a href="admin.php">К загрузке тестов</a>
                            <?php } ?>
                    </div>
                </form>
            </div>
        <?php } else { ?>
            <a href="index.php">
                <img class="fullScrinImag" src="resources/image/403_Forbidden.jpg">
            </a>
        <?php } ?>
    </body>
</html>