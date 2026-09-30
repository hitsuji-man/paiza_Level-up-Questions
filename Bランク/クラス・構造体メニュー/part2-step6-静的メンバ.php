<?php
// 未成年のお客さん
class Customer3
{
    // お客さん(各インスタンス)ごとに持つ情報
    protected $total = 0;

    // お客さん(クラス)全体で共有する情報
    protected static $accountedNumber = 0;   // 会計した人数

    // デフォルト引数を指定
    public function order($type, $price = 500)
    {
        // お酒・ビールの注文は取り消す
        if ($type === "alcohol" || $type === "0") {
            return;
        }

        if ($type === "A") {
            // 会計をして退店する
            self::$accountedNumber += 1;
            return;
        }

        $this->total += $price;
    }

    public function getTotal()
    {
        return $this->total;
    }

    // 会計して退店した人数を取得
    public static function getAccountedNumber()
    {
        return self::$accountedNumber;
    }
}

// 成人のお客さん
class AdultCustomer3 extends Customer3
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
        $customers[$i] = new AdultCustomer3();
    } else {
        $customers[$i] = new Customer3();
    }
}

for ($i = 0; $i < $K; $i++) { 
    $line = explode(" ", trim(fgets(STDIN)));
    $number = (int) $line[0];
    $type = $line[1];

    if ($type === "0" || $type == "A") {
        // 第2引数を省略すると、$priceは500になる
        // $type = 0 はビールを注文($priceはデフォルト引数)
        // $type = "A"はお客さんが会計して退店することを表す
        $customers[$number]->order($type);
    } else {
        $price = $line[2];
        $customers[$number]->order($type, $price);
    }

    // 会計した時点での金額を、その場で出力する
    if ($type == "A") {
        echo $customers[$number]->getTotal() . "\n";   
    }
}

// 最後にお客さん全体で退店した人数を出力する
echo Customer3::getAccountedNumber() . "\n";
?>