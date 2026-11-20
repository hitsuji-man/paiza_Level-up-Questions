<?php
    $K = (int) trim(fgets(STDIN));
    $deck = [];
    for ($i = 1; $i <= 13; $i++) { 
        $deck[] = "S_{$i}";
    }
    for ($i = 1; $i <= 13; $i++) { 
        $deck[] = "H_{$i}";
    }
    for ($i = 1; $i <= 13; $i++) { 
        $deck[] = "D_{$i}";
    }
    for ($i = 1; $i <= 13; $i++) { 
        $deck[] = "C_{$i}";
    }
    
    perfectShuffle($K, $deck);

    function perfectShuffle(int $K, array $deck): void
    {        
        for ($round = 0; $round < $K; $round++) { 
            // デッキを2つに分ける(元のデッキは空にする)
            $topHalf = [];
            $bottomHalf = [];

            for ($i = 0; $i < 26; $i++) { 
                $topHalf[] = $deck[$i];
                unset($deck[$i]);
            }
            for ($i = 26; $i < 52; $i++) { 
                $bottomHalf[] = $deck[$i];
                unset($deck[$i]);
            }

            // 下半分の一番下のカード(添え字が最後のカード)、上半分の一番下のカード(添え字が最後のカード)を、デッキに挿入してデッキ配列を更新する
            // 2つの配列(topHalf,bottomHalf)を交互に挿入して、1つの配列にする(添え字が異なる)
            // 下半分の下から2番目のカード、上半分の下から2番目のカード...と繰り返す
            // deckの添え字:51,49,..,3,1(26回), bottomHalfの添え字:25,24,...,1,0(26回)
            for ($i = 25; $i >= 0; $i--) { 
                $deck[2*$i + 1] = $bottomHalf[$i];
            }
            for ($i = 25; $i >= 0; $i--) { 
                $deck[2*$i] = $topHalf[$i];
            }
        }
        ksort($deck);
        foreach ($deck as $card) {
            echo $card . "\n";
        }
    }