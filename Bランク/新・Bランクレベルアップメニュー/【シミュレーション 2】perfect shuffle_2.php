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
                $index = intdiv($i, 2); 
                if ($i % 2 == 0) {
                    $deck[$i] = $upperSide[$index];
                } else {
                    $deck[$i] = $lowerSide[$index];
                }
            }
        }

        return $deck;
    }