<?php

[$h, $w, $d] = array_map('intval', preg_split('/\s+/', trim(fgets(STDIN))));
$map = array_fill(0, $h, array_fill(0, $w, 0));

if ($d === 2 || $d === 3) {
    for ($y = 0; $y < $h; $y++) {
        for ($x = 0; $x < $w; $x++) {
            $map[$y][$x] = $d === 2 ? $y * $w + $x + 1 : $x * $h + $y + 1;
        }
    }
} else {
    $number = 1;
    $step = $d === 1 ? -1 : 1;

    // y + x が同じマスをまとめ、左上に近い斜め列から処理する。
    for ($sum = 0; $sum <= $h + $w - 2; $sum++) {
        $minY = max(0, $sum - ($w - 1));
        $maxY = min($h - 1, $sum);
        [$startY, $endY] = $d === 1 ? [$maxY, $minY] : [$minY, $maxY];

        for ($y = $startY; $y !== $endY + $step; $y += $step) {
            $x = $sum - $y;
            $map[$y][$x] = $number++;
        }
    }
}

foreach ($map as $row) {
    echo implode(' ', $row), "\n";
}