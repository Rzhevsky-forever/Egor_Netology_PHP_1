<?php
// Подключаем передатчик запросов
include_once 'dbManager.php';
//include_once 'router.php';
// insert into task (user_id, description, is_done) values (14, 'Новая задача', 0)
class userManager 
{
    private $userLogin;
    private $userPass;
    private $role;
    private $idUser;


    private $databaseResponse;
    
    private $userPassHash;
            
    function __construct (
        $userLogin = 'none',
        $userPass = 'none',
        $role = 'none')
    {
        $this->userLogin = $userLogin ;
        $this->userPass = $userPass;
        $this->role = $role;
    }
    
    // Принимает данные из массива $_POST
    function getUserData($inputData) {
        $filterOptions = [
            'userLogin' => FILTER_SANITIZE_STRING,
            'userPass' => FILTER_SANITIZE_STRING
        ];
        $inputData = filter_input_array(INPUT_POST, $filterOptions);
        if (isset($inputData) && !empty($inputData)) {
            $this->userLogin = $inputData['userLogin'];
            $this->userPass = $inputData['userPass'];
        }
    }
    
    // Формирует и передает модели строку для запроса в базу данных
    function putUserDate($value = 'default'){
        // Промежуточное хранение логина
        $login = $this->userLogin;
        // Промежуточное хранение пароля
        $pass = $this->userPass;
        // Объявляем строку запроса к базе данных
        switch ($value) :
            case 'toRegister':
                $userDataRequest = "INSERT INTO user(login, password) VALUES ('$this->userLogin', '$this->userPassHash')";
                break;
            default:
                $userDataRequest = "select * from user where login = \"$login\"";
                break;
        endswitch;
        return $userDataRequest;
    }
    
    // Загружает ответ в класс как $this->databaseResponse
    function get_db_response ($databaseResponse) {
        $this->databaseResponse = $databaseResponse;
    }
    
    // Функция проверки учетных данных
    function verification () {
        foreach ($this->databaseResponse as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $key => $val) {
                    if ($key === 'login') {
                        if ($val === $this->userLogin) {
                            $checkLogin = TRUE;
                            //echo $checkLogin; // Testing
                        } else {
                            $checkLogin = FALSE;
                        }
                    }
                    if ($key === 'password') {
                        if (password_verify($this->userPass, $val)) {
                            $checkPass = TRUE;
                            //echo $checkPass; // Testing
                        } else {
                            $checkPass = FALSE;
                        }
                    }
                }
            } 
            if ($checkLogin === TRUE and $checkPass === TRUE) {
                $_SESSION['role'] = 'user';
                $_SESSION['userLogin'] = $this->userLogin;
            } elseif ($checkLogin != TRUE or $checkPass != TRUE) {
                $_SESSION['role'] = 'notUser';
            }
        }
        if (!isset($checkLogin) and !isset($checkPass)) {
            $_SESSION['role'] = 'notUser';
        }
    }
    
    // Эта функция должна срабатывать если пользователь хочет войти (ранее он уже зарегистрировался)
    function authentication () {
        
        // Получаем данные из пост
        $this->getUserData($_POST);
        // Создаем объект класса workWithDb
        $workWithDb = new workWithDb;
        // Соединяемся с базой
        $workWithDb->connection();
        // Выполняем запрос к базе и получаем значение в ответ. В качестве аргумента значение возвращаемые из метода putUserDate класса userManager
        $databaseResponse = $workWithDb->output($this->putUserDate());
        // Загружаем ответ в класс как $this->databaseResponse
        $this->get_db_response($databaseResponse);
        // Вызываем функцию проверки учетных данных
        $this->verification();
        
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] === 'user') {
                $this->getUserId();
            }
        }
    }
    
    // Получает id user
    function getUserId() {
        $workWithDb = new workWithDb;
        // Соединяемся с базой
        $workWithDb->connection();
        // Выполняем запрос к базе и получаем значение в ответ.
        $idUser = $workWithDb->output('select id from user where login =' . '\'' . $_SESSION['userLogin'] .'\'');
        $this->idUser = $idUser;
        $_SESSION['idUser'] = $this->idUser;
    }
    
    // Эта функция должна срабатывать если пользователь хочет зарегистрироваться
    function registration ($login, $pass) {
        $this->userLogin = $login;
        $this->userPass = $pass;
        // Создаем объект класса workWithDb
        $workWithDb = new workWithDb;
        // Соединяемся с базой
        $workWithDb->connection();
        // Выполняем запрос к базе, что бы проверить есть ли такой user
        $databaseResponse = $workWithDb->output($this->putUserDate());
        
        
        // Если ответ пустой значит такого пользователя нет
        if (empty($databaseResponse)) {
            // Шифруем пароль
            $this->passHash();
            // Передаем его в базу данных 
            $workWithDb->toRegistration($this->putUserDate('toRegister'));
            
            // Проверяем прошла ли регистрация
            // Выполняем запрос к базе и получаем
            $databaseResponse = $workWithDb->output($this->putUserDate());
            var_dump($databaseResponse); // Testing
            $_SESSION['userLogin'] = $this->userLogin;
            $_SESSION['role'] = 'user';
            if (isset($_SESSION['role'])) {
                if ($_SESSION['role'] === 'user') {
                    $this->getUserId();
                }
            }
            print '<br>'; // Testing
            var_dump($_POST); // Testing
            print '<br>'; // Testing
            $_SESSION['statusRegistration'] = 'newUser';
            echo 'Поздравляем регистрация прошла успешно etc...';
        } else {
            // Если пользователь существует посылаем статус
            $_SESSION['statusRegistration'] = 'userAlreadyExists';
        }
    }
    
    function passHash() {
        $this->userPassHash = password_hash($this->userPass, PASSWORD_DEFAULT);
    }
}