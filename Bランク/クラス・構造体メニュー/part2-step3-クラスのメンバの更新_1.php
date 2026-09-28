<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    class Employee
    {
        private $number;
        private $name;
        
        public function __construct(int $number, string $name)
        {
            $this->number = $number;
            $this->name = $name;
        }
        
        // メソッド:インスタンスを作る時に保存した値をメソッドがreturnで返す
        public function getnum(): int
        {
            return $this->number;
        }
        
        public function changeNum(int $newNum): int
        {
            return $this->number = $newNum;
        }
        
        public function getname(): string
        {
            return $this->name;
        }

        public function changeName(string $newName): string
        {
            return $this->name = $newName;
        }
    }
    
    $N = trim(fgets(STDIN));
    $employees = [];
    for ($i = 0; $i < $N; $i++) {
        $line = explode(" ", trim(fgets(STDIN)));
        if ($line[0] == "make") {
            $employees[] = new Employee($line[1], $line[2]);
        } elseif ($line[0] == "getnum") {
            $number = $employees[$line[1] - 1]->getnum();
            echo "$number\n";
        } elseif ($line[0] == "getname") {
            $name = $employees[$line[1] - 1]->getname();
            echo "$name\n";
        } elseif ($line[0] == "change_num") {
            $employees[$line[1] - 1]->changeNum($line[2]);
        } elseif ($line[0] == "change_name") {
            $employees[$line[1] - 1]->changeName($line[2]);
        }
    }
?>