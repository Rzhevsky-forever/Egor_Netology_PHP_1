<?php
function getPost() {
    $options = [
        'tables' => FILTER_SANITIZE_STRING,
        'column' => FILTER_SANITIZE_STRING,
        'deletTables' => FILTER_SANITIZE_STRING, // Удалить колонку
        'modify' => FILTER_SANITIZE_STRING, // Изменить колонку
        'rename' => FILTER_SANITIZE_STRING, // Переименовать
        'ctrl' => FILTER_SANITIZE_STRING,
        'modifyForRename' => FILTER_SANITIZE_STRING
    ];
    $request = filter_input_array(INPUT_POST, $options);
    return $request;
}
