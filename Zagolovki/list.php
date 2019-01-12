<?php
session_start();
if ($_SESSION['role'] === 'alen') header('HTTP/1.0 403 Forbidden');
var_dump($_SESSION); // Testing
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" lang="RU">
        <title>Выбор теста</title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    <body>
<?php include_once 'core/scanCatalog.php'; ?>
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
                        <?php if ($_SESSION['role'] === 'admin') { ?>
                            <div class="radio_buttom">
                                <input class="content" type="submit" name="del" value="Удалить">
                            </div>
                        <?php } ?>
                    <p>
                     Шалом!
                    </p>
                </div>
            </form>
        </div>
    </body>
</html>

<?php
//var_dump($_COOKIE);
?>