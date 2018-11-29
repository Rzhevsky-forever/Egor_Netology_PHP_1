<?php
  session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Авторизация</title>
        <link rel="stylesheet" href="style.css" type="text/css"/>
    </head>
    <body>
<?php
include_once './checkAdmin.php';
$checkAdmin = checkAdmin();
include_once 'makeUserName.php';
/*--- Отладка ---*/
//var_dump($_POST); echo 'POST';
//echo '<br />';
//var_dump(checkAdmin()); echo 'checkAdmin';
//echo '<br />';

    if ($checkAdmin === TRUE) : ?>
            <p>
                Привет админ!
            </p>
            <a href="admin.php">Вы админ вы вообще все тут можете</a>
    <?php elseif ( (empty($_POST) && $checkAdmin === FALSE)    ): ?>
            <p>
                Введите логин и пароль
            </p>
            <form method="POST" action="index.php">
                <p>Логин :</p>
                    <input type="text" name="userLogin">
                <p>Пароль :</p>
                    <input type="text" name="userPass">
                <div class="radio_buttom buttom_submit">
                    <input type="submit">
                </div>    
            </form>
    <?php elseif (!empty($_POST) && $checkAdmin === 'notAdmin?') : ?>
            <?php echo $checkAdmin; ?>
            <img src="image/capcha.php">
            <?php // var_dump(checkAdmin()); ?>
    <?php else : ?>
            <p>
                Вы гость. Вы не можете удалять тесты.
            </p>
            <?php // var_dump($_POST); // Test print?>            
            <div>
                <a href="list.php">Зато можете пройти тесты</a>
            </div>
    <?php
    endif;
?>

        
    </body>
</html>
