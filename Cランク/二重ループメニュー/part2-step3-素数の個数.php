<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $N = trim(fgets(STDIN));
    $count = 0;
    
    for ($i = 2; $i <= $N; $i++) {
        $isPrime = true;
        
        // $jが$iの平方根以下である間
        // $i は $jをカウントアップしていって$iの平方根になるまで、
        // 割り切れない=素数,割り切れる=素数でない(ループを抜ける)
        for ($j = 2; $j * $j  <= $i; $j++) {
            if ($i % $j == 0) {
                $isPrime = false;
                break;
            }
        }
        if ($isPrime) {
            // echo "$i は素数です\n";
            $count += 1;
        }
    }
    echo $count . "\n";
?>