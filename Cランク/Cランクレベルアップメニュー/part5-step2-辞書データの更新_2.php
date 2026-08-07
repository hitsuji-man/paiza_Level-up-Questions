<?php

$n = trim(fgets(STDIN));
$dmg = [];

for ($i = 0; $i < $n; $i++) { 
    $s = trim(fgets(STDIN));
    // 人名の連想配列を0で初期化
    $dmg[$s] = 0;
}

$m = trim(fgets(STDIN));
for ($i = 0; $i < $m; $i++) { 
    [$p, $a] = explode(" ", trim(fgets(STDIN)));
    $dmg[$p] += $a;
}

$S = trim(fgets(STDIN));
echo $dmg[$S] . "\n";
