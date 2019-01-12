<?php
//    echo '<hr /> Сработал checkUser <hr />'; // Testing
    function getUser () {
    // Получаем данные из $_POST
        $options = [
          'userLogin' => FILTER_SANITIZE_STRING,
          'userPass' => FILTER_SANITIZE_STRING
        ];
        $post_date = filter_input_array(INPUT_POST, $options);
//        var_dump($post_date); // Testing
        if (!empty($post_date['userLogin']) && !empty($post_date['userPass'])) {
//         var_dump($post_date); // Testing
            // Открываем каталог с учетными данными пользователей
            $scanDir = scandir('core/users', TRUE);
            foreach ($scanDir as $fileName) {
                $fileName = iconv('Windows-1251', 'UTF-8', $fileName);
                var_dump($fileName);
                // Ищем файл с учетными данными админа
                if ($fileName === 'adminData.json') {
                    // Читаем данные из файла учетных данных админа
                    $adminFile = json_decode(file_get_contents('users/' . $fileName, 1), TRUE);
                    // var_dump($adminFile); // Testing
                    // Ищем учетные данные админа
                    foreach ($adminFile as $key => $value) {
                        if ($key === 'admin') {
                            // Ищем логин админа
                            foreach ($value as $adminLoginKey => $adminLoginValue) {
                                if ($adminLoginKey === 'adminLogin') {
                                    // Проверяем совпадает ли с введенным
                                    if ($adminLoginValue === $post_date['userLogin']) {
                                        // Ищем пароль админа
                                        foreach ($value as $adminPassKey => $adminPassValue) {
                                            if ($adminPassKey === 'adminPass') {
                                                // Проверяем совпадает ли с введенным
                                                if ($adminPassValue === $post_date['userPass']) {
                                                    $userCheck = 'admin'; // Присваиваем пользователю статус админа
                                                    $_SESSION['role'] = 'admin'; // Передаем роль в сессию
                                                    $_SESSION['userName'] = 'admin'; // Передаем имя пользователя
                                                }
                                                // Защита от ввода неверного пароля
                                                else {
                                                    // Промежуточный статус
                                                    $userCheck = 'not_admin?';
                                                    // Файл который хранит количество попыток ввода пароля
                                                    $cont_admin_Pass_inter_dir = 'resources/counters/cont_admin_Pass_inter.txt';
                                                    // Прибавляем 1 при каждой неудачной попытке ввести пароль
                                                    $cont_admin_Pass_inter = file_get_contents($cont_admin_Pass_inter_dir) + 1;
                                                    // Записываем промежуточное значение количества попыток
                                                    file_put_contents($cont_admin_Pass_inter_dir, $cont_admin_Pass_inter);
                                                    // если количество попыток привышает три
                                                    if ($cont_admin_Pass_inter >= 3) {
//                                                        echo 'Это не админ'; // Testing
                                                        file_put_contents($cont_admin_Pass_inter_dir, '0');
                                                        $userCheck = 'not_admin';
                                                        $_SESSION['role'] = 'not_admin';
                                                        $_SESSION['captcha'] = rand(1111, 9999);
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                // Ищем файл учетных данных других пользоввателей
                if ($fileName === $post_date['userLogin'] . '.json') {
                    $userFile = json_decode(file_get_contents('users/' . $fileName, 1), TRUE);
                    var_dump($userFile);
                    foreach ($userFile as $key => $value) {
                        if ($key === 'Login') {
                            if ($value === $post_date['userLogin']) $checkFerst = TRUE; // Проверяем правильность ввода логина
                        }
                        if ($key === 'Pass') {
                            if ($value === $post_date['userPass']) $checkSecond = TRUE; // Проверяем правильность ввода пароля
                        }
                    }
                    if ($checkFerst = TRUE && $checkSecond = TRUE){
                        $userCheck = 'user'; // Присваиваем пользователю стату пользователя
                        $_SESSION['userName'] = $userFile['Login']; // Передаем имя пользователя в сессию
                        $_SESSION['role'] = 'user'; // Передаем роль в сессию
                    }
                }
            }
        }
        // Отлавливаем незарегистрированных пользователей 
        else if (!empty ($post_date['userLogin']) && empty ($post_date['userPass'])) { // Если передано только значение имени
            $userCheck = 'host'; // Присваиваем пользователю роль гость
            $_SESSION['name'] = $post_date['userLogin'];
            $_SESSION['role'] = 'host'; // Передаем роль в сессию
        }
        // Если посетитель не представил присваиваем ему роль чужой
        else {
            $_SESSION['role'] = 'alen';
            $userCheck = 'alen';
        }
                return $userCheck;
    }
//    echo '<hr /> Конец checkUser <hr />'; // Testing