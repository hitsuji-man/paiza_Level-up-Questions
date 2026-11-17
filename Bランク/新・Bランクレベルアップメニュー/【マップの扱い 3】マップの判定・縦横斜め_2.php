<?php
    [$h, $w] = array_map('intval', explode(" ", trim(fgets(STDIN))));

    $board = [];
    for ($row = 0; $row < $h; $row++) { 
        $board[] = trim(fgets(STDIN));
    }

    [$y, $x] = array_map('intval', explode(" ", trim(fgets(STDIN))));

    $flip = ['.' => '#', '#' => '.'];

    // 縦方向(中心を含む)
    for ($row = 0; $row < $h; $row++) { 
        $board[$row][$x] = $flip[$board[$row][$x]];
    }

    // 横方向(中心を除く)
    for ($col = 0; $col < $w; $col++) { 
        if ($col === $x) {
            continue;
        }
        $board[$y][$col] = $flip[$board[$y][$col]];
    }

    // 斜め方向
    $directions = [
        [1, 1],     // 右下
        [1, -1],    // 左下
        [-1, 1],    // 右上
        [-1, -1],   // 左上
    ];

    $maxDistance = min($h, $w);
    for ($distance = 1; $distance < $maxDistance; $distance++) { 
        foreach ($directions as [$dy, $dx]) {
            $row = $y + $dy * $distance;
            $col = $x + $dx * $distance;

            if ($row >= 0 && $row < $h && $col >= 0 && $col < $w) {
                $board[$row][$col] = $flip[$board[$row][$col]];
            }
        }
    }

    echo implode("\n",$board), "\n";