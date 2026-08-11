<?php

$n = trim(fgets(STDIN));
[$a, $b] = explode(' ', trim(fgets(STDIN)));

$paiza = $kyoko = 1;
$times = 0;

while (true) {
    $times++;
    $kyoko += $paiza * $a;

    if ($kyoko > $n) {
        break;
    }

    $paiza += $kyoko % $b;
}

echo $times . "\n";