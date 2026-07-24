<?php

$n = trim(fgets(STDIN));
$ab = [];

for ($i = 0; $i < $n; $i++) {
    [$a, $b] = explode(' ', trim(fgets(STDIN)));
    $ab[] = [$a, $b];
}

rsort($ab);

for ($i = 0; $i < $n; $i++) {
    echo $ab[$i][0] . ' ' . $ab[$i][1] . "\n";
}