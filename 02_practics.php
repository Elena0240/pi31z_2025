<?php

abstract class Car {
    abstract public function drive();
}
class ElectricCar extends Car {
    public function drive() {
        echo "Driving an electric car.\n";
    }
}

class PetrolCar extends Car {
    public function drive() {
        echo "Driving a petrol car.\n";
    }
}

class HybridCar extends Car {
    public function drive() {
        echo "Driving a hybrid car.\n";
    }
}
abstract class CarFactory {
    abstract public function produceCar(): Car;
}
class ElectricCarFactory extends CarFactory {
    public function produceCar(): Car {
        return new ElectricCar();
    }
}

class PetrolCarFactory extends CarFactory {
    public function produceCar(): Car {
        return new PetrolCar();
    }
}

class HybridCarFactory extends CarFactory {
    public function produceCar(): Car {
        return new HybridCar();
    }
}
if (PHP_SAPI === 'cli') { // Для запуска в консоли
    $electricFactory = new ElectricCarFactory();
    $petrolFactory = new PetrolCarFactory();
    $hybridFactory = new HybridCarFactory();

    $electricCar = $electricFactory->produceCar();
    $petrolCar = $petrolFactory->produceCar();
    $hybridCar = $hybridFactory->produceCar();

    $electricCar->drive(); // Output: Driving an electric car.
    $petrolCar->drive();   // Output: Driving a petrol car.
    $hybridCar->drive();   // Output: Driving a hybrid car.
}
