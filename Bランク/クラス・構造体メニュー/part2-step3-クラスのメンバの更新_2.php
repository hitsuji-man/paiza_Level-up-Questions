<?php
    class Employee
    {
        // 外部の関数からアクセスできるようにする
        public $number;
        public $name;

        public function __construct(int $number, string $name)
        {
            $this->number = $number;
            $this->name = $name;
        }

        public function getnum(): int
        {
            return $this->number;
        }

        public function getname(): string
        {
            return $this->name;
        }
    }

    // クラス外に定義した関数
    function change_num(Employee $employee, int $newNum): void
    {
        $employee->number = $newNum;
    }

    function change_name(Employee $employee, string $newName): void
    {
        $employee->name = $newName;
    }

    $N = (int)trim(fgets(STDIN));
    $employees = [];
    for ($i = 0; $i < $N; $i++) { 
        $line = explode(" ", trim(fgets(STDIN)));

        if ($line[0] == "make") {
            $employees[] = new Employee($line[1], $line[2]);
        } elseif ($line[0] == "getnum") {
            echo $employees[$line[1] - 1]->getnum() . "\n";
        } elseif ($line[0] == "getname") {
            echo $employees[$line[1] - 1]->getname() . "\n";
        } elseif ($line[0] == "change_num") {
            change_num($employees[$line[1] - 1], (int)$line[2]);
        } elseif ($line[0] == "change_name") {
            change_name($employees[$line[1] - 1], $line[2]);
        }
    }