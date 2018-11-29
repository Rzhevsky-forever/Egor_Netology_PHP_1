<?php
function checkAdmin () {
    $userData = json_decode(file_get_contents('./userData.json', TRUE), TRUE);
    foreach ($userData as $key => $value) :
        if ($key === 'admin') {
            foreach ($value as $adminData => $data) :
                if ($adminData === 'adminLogin') {
                    if ($data === 'Login') $adminLogin = $data;
                }
                if ($adminData === 'adminPass') {
                    if ($data === 'Pass') $adminPass = $data;
                }
            endforeach;
        }
    endforeach;

    if (!empty(filter_input(INPUT_POST, 'userLogin')) && !empty(filter_input(INPUT_POST, 'userPass'))) { 
        
        if ($_POST['userLogin'] === $adminLogin && $_POST['userPass'] === $adminPass) { 
            $checkAdmin = TRUE;
            setcookie ('adminLogin', $adminLogin);
            setcookie ('adminPass', $adminPass);
        } elseif ($_POST['userLogin'] === $adminLogin && $_POST['userPass'] !== $adminPass) { // Если кто - то неверно ввёл пароль админа (!! Не хватает аутентификации по COOKIES !!)
            $handle = fopen('contCapcha.txt', 'r'); // Открываем файл в котором хранима кол-во попыток
            $readContCapcha =  fread($handle, 100); // Считываем данные из файла и сохраняем их в переменную
            fclose($handle); // Закрываем файл
            settype($readContCapcha, 'integer'); // Преобразуем считанные данные в целочисленный тип
//            echo gettype($contCapcha) . '<br />'; // print type $contCapcha
            $contCapcha = 0;
            $contCapcha = $readContCapcha + 1; // Добавляем одну единицу к счетчику
            $handle = fopen('contCapcha.txt', 'w'); // Открываем файл - счетчик, в которм удаляем стартовые данные, в следующем шаге будем писать новые
            fwrite ($handle, $contCapcha); // Пишем обновленные данные счетчика
            
//            echo fread($handle, 10); // Test print
            
            fclose($handle); // Закрываем поток
            var_dump($contCapcha); echo ' var_dump' . '<br />';
            echo '<br />';
            echo gettype($contCapcha);echo ' gettype' . '<br />';
//            echo $contCapcha . ' значение $contCapcha' .  '<br />'; // Test print
            if ($contCapcha > 2) {  // Проверяем сколько было попыток ввести пароль, если больше двух сомневаемся, что эти попытки исходят от админа и сохраняем в переменную соотв. значение. (подразумевается,  что допускаем три попытки для введения пароля)
                $contCapcha = 'notAdmin?'; // записываем значение, якобы сомневаемся что это админ
                $handle = fopen('contCapcha.txt', 'w'); // С помощью аргумента 'w' удалем все значение из файла (обрезаем файл до нулевой длинны) 
                fwrite ($handle, ''); // пишем пустое значение
                fclose($handle); // Закрываем поток
            }
            $checkAdmin = $contCapcha; // сообщаем данные в выходную переменную
        } else {
            $checkAdmin = FALSE;
            setcookie ('userLogin', $_POST['userLogin']);
            setcookie ('userPass', $_POST['userPass']);
        }
    } elseif (!empty(filter_input(INPUT_POST, 'userLogin')) && empty(filter_input(INPUT_POST, 'userPass'))) {
            $checkAdmin = FALSE;
            setcookie('userLogin', $_POST['userLogin']);
    } else {
        $checkAdmin = FALSE;
    }
    
    return $checkAdmin;
    /*
    echo '<br />';
    var_dump($_COOKIE);
    echo '<br />';
    var_dump($userData);
    echo '<br />';
    var_dump($checkAdmin);
     * */
     
}
?>