<?php
    $N = (int) trim(fgets(STDIN));
    $S = trim(fgets(STDIN));
    $V = [];
    for ($i = 1; $i <= $N; $i++) { 
        $V[$i] = trim(fgets(STDIN));
    }
    
    // $S を中央で分割する
    $length = strlen($S);
    $middle = intdiv($length, 2);       // 商は小数点切り捨て
    $leftS = substr($S, 0, $middle + ($length % 2));    // 0 から 奇数なら$middle+1 or 偶数なら$middle 文字数まで切り取る
    $rightS = substr($S, $middle);  // $middle から最後まで切り取る

    // 文字を検閲する
    for ($i = 1; $i <= $N; $i++) { 
        // $S と文字数が同じ
        if (strlen($V[$i]) === $length) {
            if ($V[$i] === $S) {
                // 完全に一致する場合は, 'banned'と出力する
                $V[$i] = "banned";
                echo $V[$i] . "\n";
                continue;
            }

            $leftV = substr($V[$i], 0, $middle + ($length % 2));
            $rightV = substr($V[$i], $middle);
            // 中央を含んだ文字数
            $halfLength = $length - $middle;

            // 前半分or後ろ半分 が同じ文字である単語$V[$i]は、重なっている部分の文字を全て x に置き換える
            if ($leftV === $leftS) {
                // 中央を含めた前半分を x で 置き換える
                $V[$i] = substr_replace($V[$i], str_repeat('x', $halfLength), 0, $middle + ($length % 2));
            } elseif ($rightV === $rightS) {
                // 中央を含めた後ろ半分を x で置き換える
                $V[$i] = substr_replace($V[$i], str_repeat('x', $halfLength), $middle);
            }
        }
        echo $V[$i] . "\n";
    }