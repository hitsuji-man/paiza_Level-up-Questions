<?php
    [$H, $W] = array_map('intval', explode(" ", trim(fgets(STDIN))));
    $map = [];

    for ($i = 0; $i < $H; $i++) { 
        $map[] = trim(fgets(STDIN));
    }
    [$y, $x] = array_map('intval', explode(" ", trim(fgets(STDIN))));

    // "#"の場合、"."に置き換える
    // y,xと上下左右隣接するマスの合計5マス
    if ($map[$y][$x] === "#") {
        $map[$y][$x] = ".";
    } elseif ($map[$y][$x] === ".") {
        $map[$y][$x] = "#";
    } 
    if ($x >= 1 && $map[$y][$x - 1] === "#") {
        $map[$y][$x - 1] = ".";
    } elseif ($x >= 1 && $map[$y][$x - 1] === ".") {
        $map[$y][$x - 1] = "#";
    } 
    if ($map[$y][$x + 1] === "#") {
        $map[$y][$x + 1] = ".";
    } elseif ($map[$y][$x + 1] === ".") {
        $map[$y][$x + 1] = "#";
    }
    if ($y >= 1 && $map[$y - 1][$x] === "#") {
        $map[$y - 1][$x] = ".";
    } elseif ($y >= 1 && $map[$y - 1][$x] === ".") {
        $map[$y - 1][$x] = "#";
    }
    if ($map[$y + 1][$x] === "#") {
        $map[$y + 1][$x] = ".";
    } elseif ($map[$y + 1][$x] === ".") {
        $map[$y + 1][$x] = "#";
    }

    for ($i = 0; $i < $H; $i++) { 
        for ($j = 0; $j < $W; $j++) { 
            echo $map[$i][$j];
        }
        echo "\n";
    }