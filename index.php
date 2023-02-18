<?php 
abstract class Animal {
    abstract public function say();
    public function walk() {}
    public function tryToFly() {}
}

abstract class Ungulate extends Animal {
    public function walk() {
        echo "Топ-топ";
    }
}

abstract class Bird extends Animal {
    public function walk() {
        $this->tryToFly();
    }
    public function tryToFly() {
        echo "Вжих-вжих-топ-топ";
    }
}

class Cow extends Ungulate {
    public function say() {
        echo "Му ";
    }
}

class Pig extends Ungulate {
    public function say() {
        echo "Хрю ";
    }
}

class Chicken extends Bird {
    public function say() {
        echo "Ко-ко-ко ";
    }
}

class Goose extends Bird {
    public function say() {
        echo "Га-га-га ";
    }
}

class Turkey extends Bird {
    public function say() {
        echo "Гул-гул-гул ";
    }
}

class Horse extends Ungulate {
    public function say() {
        echo "Иго-го-го ";
    }
}

class Farm {
    public $animals = [];

    public function addAnimal(Animal $animal) {
        array_push($this->animals, $animal);
    }

    public function rollCall() {
        shuffle($this->animals);
        foreach($this->animals as $animal) {
            $animal->say();
        }
    }
}

class BirdFarm extends Farm {
    public function addAnimal(Animal $animal) {
        parent::addAnimal($animal);
    }

    public function showAnimalsCount() {
        $count = count($this->animals);
        echo "Птиц на ферме: $count\n";
    }
}

class Farmer {
    public function addAnimal(Farm $farm, Animal $animal) {
        $farm->addAnimal($animal);
    }
    public function rollCall(Farm $farm) {
        $farm->rollCall();
    }
}

$farmer = new Farmer();
$hoofFarm = new Farm();
$birdFarm = new BirdFarm();

$farmer->addAnimal($hoofFarm, new Cow());
$farmer->addAnimal($hoofFarm, new Pig());
$farmer->addAnimal($hoofFarm, new Pig());
$farmer->addAnimal($hoofFarm, new Horse());
$farmer->addAnimal($hoofFarm, new Horse());

$farmer->addAnimal($birdFarm, new Chicken());
$farmer->addAnimal($birdFarm, new Turkey());
$farmer->addAnimal($birdFarm, new Turkey());
$farmer->addAnimal($birdFarm, new Turkey());
$farmer->addAnimal($birdFarm, new Goose());

$farmer->rollCall($hoofFarm);
echo "<br>";
$farmer->rollCall($birdFarm);
echo "<br>";
$birdFarm->showAnimalsCount();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<style>
</style>
<body>
    
</body>
</html>