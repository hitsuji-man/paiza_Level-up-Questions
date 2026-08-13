<?php

$h = trim(fgets(STDIN));

$a = $b = [0, 1, 1];

$dmg = 2;

$i = 2;

while ($dmg < $h) {
    $a[0] = $a[1];
    $a[1] = $a[2];
    $b[0] = $b[1];
    $b[1] = $b[2];
    $a[2] = $b[0] + $b[1];
    $b[2] = $a[0] + $a[1] * 2;

    $dmg += $b[2];

    $i++;
}

echo $i . "\n";