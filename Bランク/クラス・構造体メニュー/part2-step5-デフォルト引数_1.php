<?php
    // 未成年のお客さん
    class Customer
    {
        protected $total = 0;

        public function order($type, $price = null)
        {
            if ($price == null) {
                // order($type)の場合
                // 未成年のビールの注文は取り消す
                return;
            } else {
                // order($type, $price)の場合
                // 未成年のお酒の注文は取り消す
                if ($type === "alcohol") {
                    return;
                }
                $this->total += $price;
            }
        }

        public function getTotal()
        {
            return $this->total;
        }
    }

    // 成人のお客さん
    class AdultCustomer extends Customer
    {
        // すでにお酒を注文したことがあるか
        private $hasOrderedAlcohol = false;

        public function order($type, $price = null)
        {
            if ($price == null) {
                // order($type)の場合
                $this->hasOrderedAlcohol = true;
                $this->total += 500;
                return;
            } else {
                // order($type, $price)の場合
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
    }

    [$N, $K] = array_map('intval', explode(" ", trim(fgets(STDIN))));
    $customers = [];

    // お客さんの番号に合わせて添え字を1から始める
    for ($i = 1; $i <= $N; $i++) { 
        $age = (int) trim(fgets(STDIN));
        if ($age >= 20) {
            $customers[$i] = new AdultCustomer();
        } else {
            $customers[$i] = new Customer();
        }
    }

    // 注文は保存せず、読み込んだ順に処理する
    for ($i = 0; $i < $K; $i++) {
        $line = explode(" ", trim(fgets(STDIN)));
        $number = (int) $line[0];
        if (count($line) === 2) {
            $type = (int) $line[1]; // ビール: $type=0
            $customers[$number]->order($type);
        } elseif (count($line) === 3) {
            $type = $line[1];
            $price = $line[2];
            $customers[$number]->order($type, $price);
        }
    }

    foreach ($customers as $customer) {
        echo $customer->getTotal() . "\n";
    }

?>