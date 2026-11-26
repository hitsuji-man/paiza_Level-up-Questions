<?php
    $N = (int) trim(fgets(STDIN));
    $S = trim(fgets(STDIN));
    $V = [];
    for ($i = 1; $i <= $N; $i++) { 
        $V[$i] = trim(fgets(STDIN));
    }

    // $S を中央で分割する
    $length = strlen($S);
    $middle = intdiv($length, 2);     // 小数点切り捨て
    // 前半半分の文字($Sが奇数: 0から$middle+1文字数まで, $Sが偶数: 0から$middle文字数まで)
    $leftS = substr($S, 0, $middle + ($length % 2));
    // 後半半分の文字($middleから最後まで切り取る)
    $rightS = substr($S, $middle);

    // 文字を検閲する
    for ($i = 1; $i <= $N; $i++) { 
        if (strlen($V[$i]) === $length) {
            $leftV = substr($V[$i], 0, $middle + ($length % 2));
            $rightV = substr($V[$i], $middle);
            // 中央までの文字数
            $halfLength = $length - $middle;
          
            if ($V[$i] === $S) {
                // 完全一致した場合、banned に置き換える
                $V[$i] = "banned";
            } elseif ($leftV === $leftS) {
                // 中央を含んだ前半部分を x に置き換える
                $V[$i] = substr_replace($V[$i], str_repeat('x', $halfLength), 0, $middle + ($length % 2));
            } elseif ($rightV === $rightS) {
                // 中央を含んだ後半部分を x に置き換える
                $V[$i] = substr_replace($V[$i], str_repeat('x', $halfLength), $middle);
            }
        }
        echo $V[$i] . "\n";
    }