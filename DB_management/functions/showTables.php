<?php
function showTables($tableName, $connection){
    $tableName = $tableName;
    // Сохраняем в переменную значение для аргумента запроса
    $request = $tableName;
    // Переменная для запроса
    $request = "DESCRIBE `$request`";
    // Готовим запрос
    $stmtRequest = $connection->prepare($request);
    // Передаем
    $stmtRequest->execute();
    // Получаем ответ
    $getSqlAnswer = $stmtRequest->fetchAll(PDO::FETCH_ASSOC);
    
    // Отображение 
    ?> 
    <h3> Таблица <?php echo $tableName ?>  </h3>
    <?php foreach ($getSqlAnswer as $row => $tablesDate) {
        if (isset($row)) {
            foreach ($tablesDate as $key => $field) {
                switch ($field) :
                    case NULL:
                        $field = 'NULL';
                        break;
                    case (empty($field)):
                        $field = '-----';
                        break;
                    default:
                        break;
                endswitch;
                
                switch ($key) :
                    case 'Field':
                        $colName = $field;
                        break;
                    case 'Type':
                        $type = $field;
                        break;
                    default :
                        break;
                endswitch;
            } ?>
            <div>
                <input type="radio" name="column" value="<?php echo "$colName,$type"; ?>" />
                <label class="colName"><?php echo "$colName"; ?></label>		
                <label class="type"><?php echo "тип : $type "; ?></label>		
            </div>
        <?php }
    }
}?>
