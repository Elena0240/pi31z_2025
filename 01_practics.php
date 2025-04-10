<?php
interface Animal {
    public function make_sound(): string;
}
 
class Lion implements Animal {
    public function make_sound(): string {
        return 'Рычание';
    }
}
 
class Monkey implements Animal {
    public function make_sound(): string {
        return 'Визг';
    }
}
 
class Elephant implements Animal {
    public function make_sound(): string {
            return 'Трубление';
        }
    }
 
class Raven implements Animal {
    public function make_sound(): string {
        return 'Карканье';
    }
}
 
interface AnimalFactory {
    public function getAnimal(): Animal;
}
 
class LionFactory implements AnimalFactory {
    public function getAnimal(): Animal {
        return new Lion();
    }
 
    }
 
class MonkeyFactory implements AnimalFactory {
        public function getAnimal(): Animal {
            return new Monkey();
        }
    }
 
    class ElephantFactory implements AnimalFactory {
        public function getAnimal(): Animal {
            return new Elephant();
        }
    }
 
    class RavenFactory implements AnimalFactory {
        public function getAnimal(): Animal {
            return new Raven();
        }
    }
 
function interact_with_animal(AnimalFactory $factory) {
    $animal = $factory->getAnimal();
    echo 'Звук: ' . $animal->make_sound() . '!' . PHP_EOL;
}
 
$lion_factory = new LionFactory();
$monkey_factory = new MonkeyFactory();
$elephant_factory = new ElephantFactory();
$raven_factory = new RavenFactory();
interact_with_animal($lion_factory);     # Вывод: Звук: Рычание!
interact_with_animal($monkey_factory);   # Вывод: Звук: Визг!
interact_with_animal($elephant_factory); # Вывод: Звук: Трубление!
interact_with_animal($_factory);