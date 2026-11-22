<?php
    $n = (int) trim(fgets(STDIN));

    $t = [];
    $y = [];
    $x = [];

    for ($i = 0; $i < $n; $i++) {
        [$t[$i], $y[$i], $x[$i]] = array_map('intval', explode(" ", trim(fgets(STDIN))));
    }