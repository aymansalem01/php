<?php
class Car {
    private $make;
    private $model;
    private $year;

    public function setMake($make) {
        $this->make = $make;
    }
    public function getMake() {
        return $this->make;
    }
    public function setModel($model) {
        $this->model = $model;
    }
    public function getModel() {
        return $this->model;
    }
    public function setYear($year) {
        $this->year = $year;
    }
    public function getYear() {
        return $this->year;
    }
}
$car1 = new Car();
$car1->setMake("Toyota");
$car1->setModel("Corolla");
$car1->setYear(2020);
$car2 = new Car();
$car2->setMake("Honda");
$car2->setModel("Civic");
$car2->setYear(2021);
echo "Car 1: " . $car1->getMake() . " " . $car1->getModel() . " " . $car1->getYear();
echo "Car 2: " . $car2->getMake() . " " . $car2->getModel() . " " . $car2->getYear();
?>

<!----------------------------------------------------------->

<?php
class Vehicle {
    protected $type;
    public function __construct($type) {
        $this->type = $type;
    }
    public function move() {
        echo "The vehicle is moving.";
    }
}
class Car extends Vehicle {
    public function __construct() {
        parent::__construct("Car");
    }

    public function move() {
        echo "The car is driving on the road.";
    }
}

class Bike extends Vehicle {
    public function __construct() {
        parent::__construct("Bike");
    }

    public function move() {
        echo "The bike is pedaling on the road.";
    }
}

$vehicle = new Vehicle("Vehicle");
$vehicle->move();


$car = new Car();
$car->move();


$bike = new Bike();
$bike->move();

?>

<!----------------------------------------------------------->
<?php
class Car {
    private $model;
    private $color;
    public function __construct($model, $color) {
        $this->model = $model;
        $this->color = $color;
    }
    public function getModel() {
        return $this->model;
    }
    public function setModel($model) {
        $this->model = $model;
    }
    public function getColor() {
        return $this->color;
    }
    public function setColor($color) {
        $this->color = $color;
    }
    public function move() {
        echo "The car is driving on the road.";
    }
}
$car = new Car("Toyota", "Red");
echo $car->getModel();
echo $car->getColor();
$car->setModel("Honda");
$car->setColor("Blue");
echo $car->getModel();
echo $car->getColor();
?>
<!------------------------------------------------------------------------->

<?php
abstract class Shape {
    abstract public function calculateArea();
}
class Circle extends Shape {
    private $radius;
    public function __construct($radius) {
        $this->radius = $radius;
    }
    public function calculateArea() {
        return pi() * $this->radius * $this->radius;
    }
}
class Rectangle extends Shape {
    private $length;
    private $width;
    public function __construct($length, $width) {
        $this->length = $length;
        $this->width = $width;
    }
    public function calculateArea() {
        return $this->length * $this->width;
    }
}
$circle = new Circle(5);
echo "Circle Area: " . $circle->calculateArea();
$rectangle = new Rectangle(4, 6);
echo "Rectangle Area: " . $rectangle->calculateArea();
?>

<!---------------------------------------------------------------->