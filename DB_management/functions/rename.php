<?php
// Функция переименования
function renameCol($tables, $column, $newName, $typeToModify, $connection) {
    $tables = $tables;
    $column = $column;
    $newName = $newName;
    $typeToModify = $typeToModify;
    $request = "ALTER TABLE $tables CHANGE $column $newName $typeToModify;";
    // Готовим запрос
    $stmtRequest = $connection->prepare($request);
    // Передаем
    $stmtRequest->execute();
}