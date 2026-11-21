<?php
    $K = (int) trim(fgets(STDIN));

    $deck = [];
    $mark = ['S', 'H', 'D', 'C'];

    for ($i = 3; $i >= 0; $i--) { 
        for ($j = 13; $j >= 1; $j--) {
            // i * 13: そのマークの先頭の添え字
            // j - 1: そのマークの中での位置 
            $deck[$i * 13 + $j - 1] = $mark[$i] . '_' . $j;
        }
    }

    ksort($deck);
    $deck = perfectShuffle($K, $deck);

    foreach ($deck as $card) {
        echo $card . "\n";
    }

    function perfectShuffle(int $K, array $deck): array {
        $upperSide = [];
        $lowerSide = [];

        for ($round = 0; $round < $K; $round++) { 
            
            for ($i = 0; $i < 26; $i++) { 
                $upperSide[$i] = $deck[$i];
            }
            for ($i = 0; $i < 26; $i++) { 
                $lowerSide[$i] = $deck[$i + 26];
            }

            for ($i = 0; $i < 52; $i++) {
                $index = intdiv($i, 2);     // 添え字:0~25の範囲(0,0,1,1,...),intdiv:0方向に切り捨て
                if ($i % 2 == 0) {
                    $deck[$i] = $upperSide[$index]; // 上半分の0番(i=0),
                } else {
                    $deck[$i] = $lowerSide[$index]; // 下半分の0番(i=1)
                }
            }
        }

        return $deck;
    }