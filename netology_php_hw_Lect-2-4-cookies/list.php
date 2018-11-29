<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" lang="RU">
        <title>Выбор теста</title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    <body>
<?php
    include_once 'scanCatalog.php';
    include_once 'checkAdmin.php'; ?>
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
                    <p>
                     Шалом <?php echo $_COOKIE['userLogin']; ?> !
                    </p>
                </div>
            </form>
        </div>
    </body>
</html>

<?php
//var_dump($_COOKIE);
?>