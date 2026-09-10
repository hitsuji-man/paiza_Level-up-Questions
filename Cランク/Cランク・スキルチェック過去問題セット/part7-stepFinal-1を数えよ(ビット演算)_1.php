<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $N = trim(fgets(STDIN));
    // 1の個数を管理する変数
    $ans = 0;
    // 論理積(AND演算)を取る相手(ビットマスク)を用意
    $bitMask = 1;
    // $Nを2進数にした時の桁数がわからないので、whileを使って繰り返し処理をすればいい
    while ($bitMask <= $N) {
        if (($N & $bitMask) != 0) {
            $ans += 1;
        }
        // $bitMaskのビットが立っている桁を左に1ずらす
        $bitMask *= 2;
    }
    echo "$ans\n";
?>