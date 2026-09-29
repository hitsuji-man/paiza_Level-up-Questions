<?php
// 未成年のお客さん
class Customer2
{
    protected $total = 0;

    // デフォルト引数を指定
    public function order($type, $price = 500)
    {
        // お酒・ビールの注文は取り消す
        if ($type === "alcohol" || $type === "0") {
            return;
        }
        $this->total += $price;
    }

    public function getTotal()
    {
        return $this->total;
    }
}

// 成人のお客さん
class AdultCustomer2 extends Customer2
{
    private $hasOrderedAlcohol = false;

    public function order($type, $price = 500)
    {
        if ($type === "alcohol" || $type === "0") {
            $this->hasOrderedAlcohol = true;
            $this->total += $price;
            return;
        }

        // お酒を注文した後の食事は、毎回200円引き
        if ($type === "food" && $this->hasOrderedAlcohol) {
            $price -= 200;
        }

        parent::order($type, $price);
    }
}

[$N, $K] = array_map('intval', explode(" ", trim(fgets(STDIN))));
$customers = [];

for ($i = 1; $i <= $N; $i++) {
    $age = (int) trim(fgets(STDIN));

    if ($age >= 20) {
        $customers[$i] = new AdultCustomer2();
    } else {
        $customers[$i] = new Customer2();
    }
}

for ($i = 0; $i < $K; $i++) { 
    $line = explode(" ", trim(fgets(STDIN)));
    $number = (int) $line[0];
    $type = $line[1];

    if ($type === "0") {
        // 第2引数を省略すると、$priceは500になる
        $customers[$number]->order($type);
    } else {
        $price = $line[2];
        $customers[$number]->order($type, $price);
    }
}

foreach ($customers as $customer) {
    echo $customer->getTotal() . "\n";
}
?>