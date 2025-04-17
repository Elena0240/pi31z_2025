<?php
class Engine {
    public function __construct($type) {
        $this->type = type;
    }
}
class Transmission {
    public function __construct($type) {
        $this->type = $type;
    }
}
class Body {
    public function __construct($color) {
        $this->color = $color;
    }
}
interface BuilderInterface {
    public function setEngine(Engine $engine);
    public function setTransmission(Transmission $transmission);
    public function setBody(Body $body);
    public function getCar();
}
class SedanBuilder implements BuilderInterface {
    private $car;
    
    public function __construct() {
        $this->reset();
    }
   
    public function reset() {
        $this->car = new stdClass();
    }
    
    public function setEngine(Engine $engine) {
        $this->car->engine = $engine;
    }
    
    public function setTransmission(Transmission $transmission) {
        $this->car->transmission = $transmission;
    }
    
    public function setBody(Body $body) {
        $this->car->body = $body;
    }
    
    public function getCar() {
        $product = $this->car;
        $this->reset();
        
        return $product;
    }
}



class Director {
    private $builder;
    
    public function __construct(BuilderInterface $builder) {
        $this->builder = $builder;
    }
    
    public function constructCar() {
        $this->builder->setEngine(new Engine('V12'));
        $this->builder->setTransmission(new Transmission('Mechanical'));
        $this->builder->setBody(new Body('Black'));
        
        return $this->builder->getCar();
    }
}

$sedanBuilder = new SedanBuilder();
$director = new Director($sedanBuilder);
$sedan = $director->constructCar();

echo "Создан автомобиль:\n";
echo "Двигатель: " . $sedan->engine->type . "\n";
echo "Трансмиссия: " . $sedan->transmission->type . "\n";
echo "Цвет кузова: " . $sedan->body->color . "\n";