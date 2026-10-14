<?php
class SuperCar
{
    protected int $l;       // 燃料
    protected int $f;       // 燃費

    protected int $distance = 0; // 距離

    public function __construct(int $l, int $f)
    {
        $this->l = $l;
        $this->f = $f;
    }

    public function run(): void
    {
        if ($this->l >= 1) {
            $this->l -= 1;
            $this->distance += $this->f;
        }
    }

    public function __tostring(): string
    {
        return $this->distance . "\n";
    }
}

class SuperSuperCar extends SuperCar
{
    public function fly(): void
    {
        if ($this->l >= 5) {
            $this->l -= 5;
            $this->distance += $this->f ** 2;
        } else {
            parent::run();
        }
        
    }
}

class SuperSuperSuperCar extends SuperSuperCar
{

    public function fly(): void
    {
        if ($this->l >= 5) {
            $this->l -= 5;
            $this->distance += 2 * $this->f ** 2;
        } else {
            parent::run();
        }
        
    }

    public function teleport(): void
    {
        if ($this->l >= $this->f ** 2) {
            $this->l -= $this->f ** 2;
            $this->distance += $this->f ** 4;    
        } else {
            $this->fly();
        }
        
    }
}

[$N, $K] = explode(" ", trim(fgets(STDIN)));
$cars = [];
for ($i = 1; $i <= $N; $i++) { 
    $line = explode(" ", trim(fgets(STDIN)));
    if ($line[0] === "supercar") {
        $cars[$i] = new SuperCar($line[1], $line[2]);
    } elseif ($line[0] === "supersupercar") {
        $cars[$i] = new SuperSuperCar($line[1], $line[2]);
    } elseif ($line[0] === "supersupersupercar") {
        $cars[$i] = new SuperSuperSuperCar($line[1], $line[2]);
    }
}
// print_r($cars);

for ($i = 1; $i <= $K; $i++) { 
    $line = explode(" ", trim(fgets(STDIN)));
    if ($line[1] === "run") {
        $cars[$line[0]]->run();
    } elseif ($line[1] === "fly") {
        $cars[$line[0]]->fly();
    } elseif ($line[1] === "teleport") {
        $cars[$line[0]]->teleport();
    }
}

foreach ($cars as $car) {
    echo $car;
}