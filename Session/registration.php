<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Регистрация</title>
        <link rel="stylesheet" href="CSS/style.css" type="text/css">
    </head>
    <body>
        <form method="POST" action="">
            <p>Придумайте логин</p>
                <input type="text" name="Login">
            <p>Придумайте пароль</p>
                <input type="text" name="Pass">
            <div class="radio_buttom buttom_submit">
                <input type="submit" value="Отправить">
            </div>
        </form>
        <?php
            // Получаем данные из POST
            $options = [
                'Login' => FILTER_SANITIZE_STRING,
                'Pass' => FILTER_SANITIZE_STRING
            ];
            $post_date = filter_input_array(INPUT_POST, $options);
            
            // Проверяем есть ли значения
            if (isset($post_date) && !empty($post_date)) {
            
                // Заменяем кодировку с UTF-8 на Windows-1251 для корректного отображения имени в файловой системе
                $userFileName = iconv('UTF-8', 'Windows-1251', $post_date['Login']);

                // Преобразуем данные из POST в JSON
                $json_client = json_encode($post_date, JSON_UNESCAPED_UNICODE);

                // Пишем файл .json
                file_put_contents('core/users/' . $userFileName . '.json', $json_client);

                // ---------- Проверяем записался ли файл -----------

                // Открываем директорию в которую производилась запись
                $scanDir = scandir('core/users', TRUE);

                // Ищем имя файла с логином
                foreach ($scanDir as $file) {
                    if ($file === $userFileName . '.json') { // Если находим : ?>
                        <p>Регистрация прошла успешно!</p>
                        <a href="index.php">Перейдите на основной сайт</a>
                    <?php }
                }
            }
        ?>
    </body>
</html>
