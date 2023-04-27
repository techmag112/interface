<?php

interface AbilityCars {
    public function ability();
}

abstract class FeaturesCars {

    public function __construct(protected $trim = 'Нет отделки') {
        $this->setTrim($trim); 
    }

    public function signal() {
        // машина подает сигнал
    }

    public function toggleCleaner() {
        // включить-выключить дворники
    }

    public function move($direction = null) {
        if($direction) {
            // движение вперед
        } else {
            // движение назада
        }
        return $this;
    }

    public function getTrim() {
        return $this->trim;
    }

    private function setTrim(string $trim) {
        $this->trim = $trim; 
    }

}

class PassengerCar extends FeaturesCars implements AbilityCars {

    public function ability() {
        // включить закись азота
    }
}

class Excavator extends FeaturesCars implements AbilityCars {

    public function ability() {
        // двигает ковшом
    }
}

// Создаем объект легковой автомобиль
$car1 = new PassengerCar('Кожа');
// Создаем объект экскаватор
$car2 = new Excavator();

function testCar(FeaturesCars $car) {
    // Заставляем ехать и вызываем способность этой машины
    $car->move()->ability();    
    // Вызываем доп способность сигнал
    $car->signal();
    // Вызываем доп способность дворники (включаем)
    $car->toggleCleaner();
    echo $car->getTrim() . ' ';
}

testCar($car1);
testCar($car2);