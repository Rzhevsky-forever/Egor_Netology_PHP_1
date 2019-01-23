<?php
function gatekeeper_session(){
    // Проверяем определена ли переменная $_SESSION['role']
    if (isset($_SESSION['role'])) {
        // Если в $_SESSION['role'] админ то присвоим реультирующей знач. админ
        if ($_SESSION['role'] === 'admin'){
            $is_admin = 'admin';
        } 
        // Если в $_SESSION['role'] user то присвоим реультирующей знач. user
        else if (($_SESSION['role'] === 'user')) {
            $is_admin = 'user';
        }
        // Если в $_SESSION['role'] host то присвоим реультирующей знач. host
        else if ($_SESSION['role'] === 'host') {
            $is_admin = 'host';
        }
        // В любом другом случае - FALSE
        else {
            $is_admin = FALSE;
        }
    // Если $_SESSION['role'] пуста то результ. пер. будет "Фолс"
    } else {
        $is_admin = FALSE;
    }
    // Вернем результирующую пер.
    return $is_admin;
}
