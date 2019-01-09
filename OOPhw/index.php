<!DOCTYPE html>
<!--
Это рабочая реализация
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Тестовый новостной блог</title>
        <!-- Wrapper styles -->
        <link type="text/css" rel="stylesheet" href="wrapper.css">
        <!-- Castom styles -->
        <link type="text/css" rel="stylesheet" href="castom.css" >
    </head>
    <body>
    <?php include_once 'newsClass.php'; ?>
        <div class="wrapper">
            <?php foreach ($currentNews as $key => $value) {?>
                <div class="newsTitle titleFeld">
                    <?php echo $value[0]; ?>
                </div>
                <div class="newsText textFeld">
                    <?php echo $value[1]; ?>
                </div>
            <?php } ?>
        </div>
    </body>
</html>