<?php
    [$H, $W] = array_map('intval', explode(" ", trim(fgets(STDIN))));
    $map = [];

    for ($i = 0; $i < $H; $i++) { 
        $map[] = trim(fgets(STDIN));
    }
    [$y, $x] = array_map('intval', explode(" ", trim(fgets(STDIN))));
    if ($map[$y][$x] === ".") {
        $map[$y][$x] = "#";
    } elseif ($map[$y][$x] === "#") {
        $map[$y][$x] = ".";
    }

    for ($i = 0; $i < $H; $i++) { 
        for ($j = 0; $j < $W; $j++) { 
            echo $map[$i][$j];
        }
        echo "\n";
    }