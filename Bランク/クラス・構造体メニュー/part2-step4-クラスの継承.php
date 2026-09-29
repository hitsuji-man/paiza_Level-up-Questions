<?php
    // 未成年のお客さん
    class Customer
    {
        protected $total = 0;

        public function order($type, $price)
        {
            // 未成年のお酒の注文は取り消す
            if ($type === "alcohol") {
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
    class AdultCustomer1 extends Customer
    {
        // すでにお酒を注文したことがあるか
        private $hasOrderedAlcohol = false;

        public function order($type, $price)
        {
            if ($type === "alcohol") {
                $this->hasOrderedAlcohol = true;
                $this->total += $price;
                return;
            }

            // お酒を注文した後の食事は毎回200円引き
            if ($type === "food" && $this->hasOrderedAlcohol) {
                $price -= 200;
            }

            // 料金を会計に加算
            parent::order($type, $price);
        }
    }

    [$N, $K] = array_map('intval', explode(" ", trim(fgets(STDIN))));
    $customers = [];

    // お客さんの番号に合わせて添え字を1から始める
    for ($i = 1; $i <= $N; $i++) { 
        $age = (int) trim(fgets(STDIN));
        if ($age >= 20) {
            $customers[$i] = new AdultCustomer1();
        } else {
            $customers[$i] = new Customer();
        }
    }

    // 注文は保存せず、読み込んだ順に処理する
    for ($i = 0; $i < $K; $i++) { 
        [$number, $type, $price] = explode(" ", trim(fgets(STDIN)));

        $customers[(int)$number]->order($type, $price);
    }

    foreach ($customers as $customer) {
        echo $customer->getTotal() . "\n";
    }

?>