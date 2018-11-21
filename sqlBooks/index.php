<!DOCTYPE html>

<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>sql Книги</title>
        <!-------------------- Стили -------------------->
        <link type="text/css" rel="stylesheet" href="custom.css">
    </head>
    <body>
    <?php
        include_once './main.php'; // Включаем обрабочик main.php
        
/*-------------- Тестовые выводы --------------*/
//        var_dump($getSqlAll); echo '$getSqlAll - index.php <br />'; // Тестовый вывод
//        if (isset($request_inp)) {
//        var_dump($request_inp); // Тестовый вывод
//        }
//        if (!isset($_GET)) {
//            $setGet = $_GET;
//            var_dump($setGet); echo 'index.php'; // Тестовый вывод
//            var_dump($getSqlAll); // Тестовый вывод
//        }
/* ------------------------------------------ */        
    ?>
        <!--- Заголовок --->
    <div class="title">
        Библиотека успешного человека
    </div>
        <!--- Форма запроса --->
    <div class="form">
        <form method="GET" action="./index.php">
            <input name="ISBN" class="input_text" type="text" placeholder="ISBN">
            <input name="book_name" class="input_text" type="text" placeholder="Название книги">
            <input name="author" class="input_text" type="text" placeholder="Автор книги">
            <input type="submit">
        </form>
    </div>
        
   <table class="table">
        
                <!--- Ответ на запрос пользователя --->
    <?php
    ?>
       <div class="title">  
        <?php echo empty($getSqlAll) ? 'Это не корректный запрос' : ''; ?>
       </div>   
    <?php
    foreach ($getSqlAll as $value) {
    ?>
        <tr class="tr">
    <?php
        foreach ($value as $q) {
            ?>
                <td class="td"><?php echo $q ;?></td>
            <?php
        }
    ?>
        </tr>
    <?php
    }    
    ?>
    </body>
</html>
