<html>
    <head>
        <title>Классы и объекты</title>
    </head>
    <body>
<?php
/*------------------------------ Машина --------------------------------------*/
class Car 
{
    private $name; // Марка машины
    private $wheels; // Колеса
    private $color; // Цвет
    private $steeringWheel; // Руль
    private $type; // Тип кузова, назначение, класс и все такое
    
    public function __construct (
            $name,
            $wheels = 4, 
            $color = 'не крашеный', 
            $steeringWheel = 'круглый', 
            $type = 'седан')
            {
        $this->name = $name; // Марка машины
        $this->wheels = $wheels; // Колес обычно 4 штуки
        $this->color = $color; // Цвет меняется
        $this->steeringWheel = $steeringWheel; // Руль всегда есть
        $this->type = $type; // Тип кузова меняется
    }
    
    function getCar() {
        echo 
        "<b>$this->name</b>" . '<br />' .
        'колес - ' . $this->wheels . '<br />' . 
        'цвет - ' . $this->color . '<br />' . 
        'руль - ' . $this->steeringWheel . '<br />' . 
        'тип - ' . $this->type . '<br />'
        ;
    }
}

$shoha = new Car('ВАЗ 2106', 4, $color = 'белый');
$shoha->getCar();
echo '<br />';
$nexia = new Car('DAEWOO NEXIA', 4, 'черный');
$nexia->getCar();

echo '<hr />';

/*--------------------------------- Телевизоры -------------------------------*/
class Tv
{
    private $brand;
    private $color;
    private $screenDiagonal;
    private $type;
    private $price;
            
    function __construct($brand, $color, $screenDiagonal, $type, $price)
    {
        $this->brand = $brand;
        $this->color = $color;
        $this->screenDiagonal = $screenDiagonal;
        $this->type = $type;
        $this->price = $price;
    }
    
    function getTv() {
        echo 
        "<b>$this->brand</b>" . '<br />' .
        'цвет - ' . $this->color . '<br />' .
        'диагональ - ' . $this->screenDiagonal . '<br />' .
        'тип - ' . $this->type . '<br />' .
        'цена - ' . $this->price . '<br />'
        ;
    }
}

$samsung = new Tv('Самсунг', 'цветной', 24, 'смарт тв', 34000);
$samsung->getTv();
echo '<br />';
$sony = new Tv ('Сони', 'черный', 36, 'лед тв', 35000);
$sony->getTv();

echo '<hr />';

/*------------------------ Шариковая ручка --------------------------*/
class Man
{
    private $color;
    private $ink;
    private $mechanism;
    private $brand;
    private $price;
    
    function __construct($color, $ink, $mechanism, $brand, $price)
    {
        $this->color = $color;
        $this->ink = $ink;
        $this->mechanism = $mechanism;
        $this->brand = $brand;
        $this->price = $price;
    }
            
    function getMan ()
    {
        echo 
        '<b>Цвет корпуса - </b>' . $this->color . '<br>' .
        'Цвет чернил - ' . $this->ink . '<br>' .
        'Механическая - ' . $this->mechanism . '<br>' .
        'Производство -  ' . $this->brand . '<br>' .
        'Цена - ' . $this->price . '<br>'
        ;
    }
}

$pavel = new Man('Белый', 'Синие', 'Нет', 'Китайская', 43);
$pavel->getMan();
echo '<br />';
$masha = new Man('Черный', 'Черные', 'Да', 'Россия', 65);
$masha->getMan();

echo '<hr />';

/*-------------------------------- Утки -----------------------------*/
class Duck
{
    private $name;
    private $age;
    private $flies;
    private $fromSouth;
    private $property;

    function __construct($name, $age, $flies, $fromSouth, $property) 
    {
        $this->name = $name;
        $this->age = $age;
        $this->flies = $flies;
        $this->fromSouth = $fromSouth;
        $this->property = $property;
    }
    
    function getDuck () 
    {
        echo 
        "<b>$this->name</b>" . '<br>' .
        'возраст - ' . $this->age . '<br>' .
        'летает - ' . $this->flies . '<br>' .
        'С юга - ' . $this->fromSouth . '<br>' .
        'Свойства - ' . $this->property . '<br>'
        ;
    }
}

$duckFerst = new Duck('Зорька', 2, 'очень даже', 'не говорит', 'жирная');
$duckFerst->getDuck();
echo '<br />';
$superDuck = new Duck('Скрудж', '62', 'не летает', 'из мультика', 'персонаж мультика');
$superDuck->getDuck();

echo '<hr />';

/*---------------------------------- Товар -----------------------------------*/
class Product
{
    private $name; // Наименование
    private $type; // Тип
    private $price; // Цена
    private $city; // Место нахождения
    private $quantity; // Количество
    
    function __construct($name, $type, $price, $city,  $quantity)
    {
        $this->name = $name;
        $this->type = $type;
        $this->price = $price;
        $this->city = $city;
        $this->quantity = $quantity;
    }
    
    function getProduct ()
    {
        echo
        "<b>$this->name</b>" . '<br />' .
        'Тип - ' . $this->type . '<br />' .
        'Цена - ' . $this->price . '<br />' .
        'Место нахождение - ' . $this->city . '<br />' .
        'Количество - ' . $this->quantity . '<br />'
        ;
    }
}

$thone = new Product('Моторола', 'Телефон', 2500, 'Омск', 16000);
$thone->getProduct();
echo '<br />';
$monitor = new Product('Benq', 'Монитор', 8500, 'Хабаровск', 500);
$monitor->getProduct();
?>
    </body>
</html>