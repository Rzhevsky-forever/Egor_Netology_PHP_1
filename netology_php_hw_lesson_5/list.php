<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
<?php
//Получаем данные из test.json
$test_list_j = file_get_contents(__DIR__ . "./test.json", true);
echo $test_list_j;
$test_list = json_decode($test_list_j, TRUE);
var_dump($test_list);
$a = 1;
$b = 0;
    foreach ($test_list as $name => $value) :
        switch ($a) :
            case $a == 1: // Когда $a задавалась 0 и проверка шла на равеноство (==) или (===) нулю этот код не работал
            $a = $name;
            case $a != 1:
            $b = $name;
        endswitch;
    endforeach;
    ?>
    <form action="test.php" method="get">
        <input type="radio" name="a" value="<?php echo $a; ?>"><?php echo $a; ?>
        <input type="radio" name="b" value="<?php echo $b; ?>"><?php echo $b; ?>
        <input type="submit">
    </form>
        
</body>
</html>