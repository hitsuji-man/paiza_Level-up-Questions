<?php
    [$h, $w] = array_map('intval', explode(" ", trim(fgets(STDIN))));

    $board = [];
    for ($i = 0; $i < $h; $i++) { 
        $board[] = trim(fgets(STDIN));
    }

    [$y, $x] = array_map('intval', explode(" ", trim(fgets(STDIN))));

    $offsets = [
        [0, 0],     // 中心
        [-1, 0],    // 上
        [1, 0],     // 下
        [0, -1],    // 左
        [0, 1],     // 右
    ];

    foreach ($offsets as [$dy, $dx]) {
        $ny = $y + $dy;
        $nx = $x + $dx;

        if ($ny < 0 || $ny >= $h || $nx < 0 || $nx >= $w) {
            continue;
        }

        $board[$ny][$nx] = $board[$ny][$nx] === '.' ? '#' : '.';
    }

    echo implode("\n", $board), "\n";