<?php ?>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Регистрация</title>
    </head>
    <body>
    <!-- 
        Постфикс "Reg" в значение userLogin_Reg атрибута name тега <input> 
        указывает на то, что пользователь идет регистрироваться 
     -->
        <form action="index.php" method="POST" name="reg">
            <h3>Регистрация :</h3>
            <p>Логин :</p>
                <input type="text" name="userLogin_Reg">
            <p>Пароль :</p>
                <input type="text" name="userPass_Reg">
            <div class="radio_buttom buttom_submit">
                <input type="submit">
            </div>
        </form>
    </body>
</html>
