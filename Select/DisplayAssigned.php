<?php
session_start();
//var_dump($_SESSION); // Testing
include_once 'dbManager.php';

function displayAssigned () {
    $connection = new workWithDb();
    $connection->connection();
    $request = 'select user.login as Пользователь, description as Задача
                from task
                inner join user on user.id = task.user_id
                inner join user as u on u.id = assigned_user_id';
    $displayAssigned = $connection->output($request);
    return $displayAssigned;
}

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] === 'user') {
        $displayAssigned = displayAssigned();
        foreach ($displayAssigned as $value) {
            foreach ($value as $userName => $task) {?>
                <h4 style="color: #555;"> <?php echo $userName; ?> </h4>
                <h4 style="color: #999;"> <?php echo $task ; ?> </h4>
                <h4 style="color: #999;"> ==================== </h4>
            <?php }
        }
    }
}
?>
<div>
    <a href="Exit.php">Выйти</a>
</div>

<?php
/*select user.login as Пользователь, description as Задача
from task
inner join user on user.id = task.user_id
inner join user as u on u.id = assigned_user_id

 * = 
 * 
 *  */
?>