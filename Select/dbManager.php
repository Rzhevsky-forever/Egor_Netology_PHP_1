<?php
// stmt - Statement - с англ. утверждение
class workWithDb {
    
    // Переменные в которых храняться данные для соединения
    private $driver;
    private $host;
    private $dbNname;
    private $charset;
    private $login;
    private $pass;
    private $options;
    
    // Переменная которая хронит соединение
    private $connection;
            
    function __construct (
        $driver = 'mysql',
        $host = 'localhost',
        $dbNname ='evolchanov',
        $charset ='utf8',
        $login = 'evolchanov',
        $pass = 'neto1822',
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]) {
            $this->driver = $driver;
            $this->host = $host;
            $this->dbNname = $dbNname;
            $this->charset = $charset;
            $this->login = $login;
            $this->pass = $pass;
            $this->options = $options;
    }
    
    // Соединение с базой данных
    function connection () {
        $this->connection = 
            new PDO("$this->driver:host=$this->host; dbname=$this->dbNname; charset=$this->charset", "$this->login", "$this->pass", $this->options);
    }
    
    // Функция предназначенная для регистрации
    function toRegistration($userRequest) {
        // Готовим запрос
        $stmtUserRequest = $this->connection->prepare($userRequest);
        // Передаем
        $stmtUserRequest->execute();
    }

    function request($userRequest){
        // Готовим запрос
        $stmtUserRequest = $this->connection->prepare($userRequest);
        // Передаем
        $stmtUserRequest->execute();
    }

    // Отправка запроса и возврат значения
    function output($userRequest) {
        // Готовим запрос
        $stmtUserRequest = $this->connection->prepare($userRequest);
        // Передаем
        $stmtUserRequest->execute();
        // Возвращаем значение
        
        return $getSqlAnswer = $stmtUserRequest->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // Запрос id user
    function getUserId() {
        
    }
}

// Интерфейс модели
// Создаем объект класса
// $a = new workWithDb;
// Вызоваем метод который соединяет нас с базой
// $a->connection();

// Передаем запрос в метод который запрос выводит
// $userRequest - это основной элемент интерфейса модели. В него будем передавать значения запросов
// Пример передачи :
// $userRequest = 'select * from user limit 50';
// Возвращаем значение
// $b = $a->output($userRequest);
// var_dump($b); // Testing