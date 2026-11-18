<?php

[$h, $w, $d] = array_map('intval', preg_split('/\s+/', trim(fgets(STDIN))));
$ans = array_fill(0, $h, array_fill(0, $w, 0));
$count = 1;

if ($d === 1) {
    // 左端の各マスから右上へ進む。
    for ($i = 0; $i < $h; $i++) {
        for ($j = 0; $j < min($w, $i + 1); $j++) {
            $ans[$i - $j][$j] = $count++;
        }
    }
    // 左下隅の次は、下端の残りのマスを始点にする。
    for ($i = 1; $i < $w; $i++) {
        for ($j = 0; $j < min($h, $w - $i); $j++) {
            $ans[$h - 1 - $j][$i + $j] = $count++;
        }
    }
} elseif ($d === 2) {
    for ($y = 0; $y < $h; $y++) {
        for ($x = 0; $x < $w; $x++) {
            $ans[$y][$x] = $count++;
        }
    }
} elseif ($d === 3) {
    for ($x = 0; $x < $w; $x++) {
        for ($y = 0; $y < $h; $y++) {
            $ans[$y][$x] = $count++;
        }
    }
} else {
    // 上端の各マスから左下へ進む。
    for ($i = 0; $i < $w; $i++) {
        for ($j = 0; $j < min($h, $i + 1); $j++) {
            $ans[$j][$i - $j] = $count++;
        }
    }
    // 右上隅の次は、右端の残りのマスを始点にする。
    for ($i = 1; $i < $h; $i++) {
        for ($j = 0; $j < min($w, $h - $i); $j++) {
            $ans[$i + $j][$w - 1 - $j] = $count++;
        }
    }
}

foreach ($ans as $row) {
    echo implode(' ', $row), PHP_EOL;
}
