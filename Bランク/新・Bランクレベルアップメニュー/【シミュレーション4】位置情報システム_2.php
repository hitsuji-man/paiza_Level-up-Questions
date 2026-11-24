<?php
// 出発座標と到着座標から、指定時刻の座標を補間して整数で返す
function interpolate(int $start, int $end, int $elapsed, int $duration): int
{
    // 出発座標 + (到着座標 - 出発座標) × 経過時間 ÷ 区間の長さ
    // = (出発座標 × 区間の長さ + (到着座標 - 出発座標) × 経過時間) ÷ 区間の長さ
    // = (出発座標 × (区間の長さ - 経過時間) + 到着座標 × 経過時間) ÷ 区間の長さ
    $numerator = $start * ($duration - $elapsed) + $end * $elapsed;
    // 座標の整数部分を求める。例えば -1.5 なら -1 になる。
    $coordinate = intdiv($numerator, $duration);

    // 余りが負なら、より小さい整数に丸めるため 1 を引く
    if ($numerator % $duration < 0) {
        $coordinate--;
    }

    return $coordinate;
}

$n = (int) trim(fgets(STDIN));
$times = [];
$ys = [];
$xs = [];

// 入力値を受け取る
for ($j = 1; $j <= $n; $j++) {
    [$time, $y, $x] = explode(' ', trim(fgets(STDIN)));

    $times[$j] = (int) $time;
    $ys[$j] = (int) $y;
    $xs[$j] = (int) $x;
}

$i = 1;

for ($t = 0; $t <= 100; $t++) {
    if ($t > $times[$i + 1]) {  // 現在の時刻が右端を超えていたら
        $i += 1;                // 次の区間へ移行する
    }

    $duration = $times[$i + 1] - $times[$i];    // 区間の長さ
    $elapsed = $t - $times[$i];                 // 経過時間

    $y = interpolate($ys[$i], $ys[$i + 1], $elapsed, $duration);
    $x = interpolate($xs[$i], $xs[$i + 1], $elapsed, $duration);

    echo "$y $x\n";
}