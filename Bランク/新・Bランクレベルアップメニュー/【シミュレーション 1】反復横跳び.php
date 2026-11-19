<?php

[$n, $x, $k] = array_map('intval', explode(' ', trim(fgets(STDIN))));

// 4N 回目の中央から、左の線を跨ぐのは各周期の3回目。
// 4N回目で中央に戻った後、'右→中央→左→中央'の4回を繰り返す。このうち'中央→左'と'左→中央'でそれぞれ $x cm多く移動する。
// 残りを4で割り、商ごとに2回、余りが3ならさらに1回数える
$remaining = $k - 4 * $n;
$extraMoves = 2 * intdiv($remaining, 4);

if ($remaining % 4 === 3) {
    $extraMoves++;
}

echo $extraMoves * $x, "\n";
