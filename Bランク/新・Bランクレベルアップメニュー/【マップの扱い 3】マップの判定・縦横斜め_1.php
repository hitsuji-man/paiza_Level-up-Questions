<?php
    [$h, $w] = array_map('intval', explode(" ", trim(fgets(STDIN))));

    $board = [];
    for ($i = 0; $i < $h; $i++) { 
        $board[] = trim(fgets(STDIN));
    }

    [$y, $x] = array_map('intval', explode(" ", trim(fgets(STDIN))));

    $offsets = [
        [-1, 0],    // 上
        [1, 0],     // 下
        [0, -1],    // 左
        [0, 1],     // 右
        [1, 1],     // 右下
        [1, -1],    // 左下
        [-1, 1],    // 右上
        [-1, -1],   // 左上
    ];

    // 入力例1:y=0,x=0 中心マスは先に反転
    $board[$y][$x] = $board[$y][$x] === '.' ? '#' : '.';

    // 最近接のマスについてはこれでいいが、「列」についてはどうするか？
    // -> whileループ
    foreach ($offsets as [$dy, $dx]) {
        $ny = $y + $dy;
        $nx = $x + $dx;

        // マップの行数$h(添え字$h-1)と列数$w(添え字$w-1)を出ない間繰り返す
        while ($ny >= 0 && $ny < $h && $nx >= 0 && $nx < $w) {
            // 反転した値を代入
            $board[$ny][$nx] = $board[$ny][$nx] === '.' ? '#' : '.';

            // 各方向に1マスずつ進む
            $ny += $dy;
            $nx += $dx;
        }
    }

    echo implode("\n", $board), "\n";