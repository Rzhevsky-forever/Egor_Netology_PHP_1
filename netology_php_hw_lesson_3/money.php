<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8" lang="RU">
        <title>CSV</title>
    </head>
    <body>
        <?php
        date_default_timezone_set('UTC');
        //$price = 100;
        //$discr = "benzin";
        $date = date('Y-m-d');
        //echo $date;
        $money_arr = [
            [$date, "Еда", "100"],
            [$date, "Бензиин", "1000"]
                ];
        
        $money = fopen(__DIR__ . "/money.csv", "w");
        for($i=0; $i<count($money_arr); $i++) {
            $m = $money_arr[$i];
            fwrite($money, implode(";", $m));
        }
        fclose($money);
        ?>
    </body>
</html>
