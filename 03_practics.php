<?php
 
abstract class Car {
    protected string $type;
    protected int $enginePower;
    protected float $fuelConsumptionOrBatteryCapacity;
 
    public function getType(): string {
        return $this->type;
    }
 
    public function getEnginePower(): int {
        return $this->enginePower;
    }
 
    public function getFuelConsumptionOrBatteryCapacity(): float {
        return $this->fuelConsumptionOrBatteryCapacity;
    }
 
    
    abstract public function drive();
}
 

class ElectricCar extends Car {
    public function __construct(int $enginePower, float $batteryCapacity) {
        parent::__construct();
        $this->type = 'Electric';
        $this->enginePower = $enginePower;
        $this->fuelConsumptionOrBatteryCapacity = $batteryCapacity;
    }
 
    public function drive() {
        echo "Driving an electric car with {$this->enginePower} hp and {$this->fuelConsumptionOrBatteryCapacity} kWh battery.\n";
    }
}
 

class PetrolCar extends Car {
    public function __construct(int $enginePower, float $fuelConsumption) {
        parent::__construct();
        $this->type = 'Petrol';
        $this->enginePower = $enginePower;
        $this->fuelConsumptionOrBatteryCapacity = $fuelConsumption;
    }
 
    public function drive() {
        echo "Driving a petrol car with {$this->enginePower} hp and {$this->fuelConsumptionOrBatteryCapacity} l/100km fuel consumption.\n";
    }
}
 

class HybridCar extends Car {
    public function __construct(int $enginePower, float $fuelConsumption, float $batteryCapacity) {
        parent::__construct();
        $this->type = 'Hybrid';
        $this->enginePower = $enginePower;
        $this->fuelConsumptionOrBatteryCapacity = $fuelConsumption . '/' . $batteryCapacity;
    }
 
    public function drive() {
        list($fuelConsumption, $batteryCapacity) = explode('/', $this->fuelConsumptionOrBatteryCapacity);
        echo "Driving a hybrid car with {$this->enginePower} hp, {$fuelConsumption} l/100km fuel consumption, and {$batteryCapacity} kWh battery.\n";
    }
}
 

interface CarFactory {
    public function produceCar(): Car;
}
 

class ElectricCarFactory implements CarFactory {
    public function produceCar(): Car {
        return new ElectricCar(150, 60); // Электрический автомобиль с мощностью 150 л.с. и батареей 60 кВт·ч
    }
}
 

class PetrolCarFactory implements CarFactory {
    public function produceCar(): Car {
        return new PetrolCar(200, 10); // Бензиновый автомобиль с мощностью 200 л.с. и расходом 10 л/100км
    }
}
 

class HybridCarFactory implements CarFactory {
    public function produceCar(): Car {
        return new HybridCar(180, 8, 30); // Гибридный автомобиль с мощностью 180 л.с., расходом 8 л/100км и батареей 30 кВт·ч
    }
}
 

$electricFactory = new ElectricCarFactory();
$petrolFactory = new PetrolCarFactory();
$hybridFactory = new HybridCarFactory();
 
$electricCar = $electricFactory->produceCar();
$petrolCar = $petrolFactory->produceCar();
$hybridCar = $hybridFactory->produceCar();
 
$electricCar->drive(); // Вывод: Driving an electric car with 150 hp and 60 kWh battery.
$petrolCar->drive();  // Вывод: Driving a petrol car with 200 hp and 10 l/100km fuel consumption.
$hybridCar->drive();  // Вывод: Driving a hybrid car with 180 hp, 8 l/100km fuel consumption, and 30 kWh battery.
