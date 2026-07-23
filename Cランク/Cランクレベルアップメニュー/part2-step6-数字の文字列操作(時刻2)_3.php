<?php
$s = explode(":", trim(fgets(STDIN)));

$h = $s[0];
$m = $s[1];

if ($m + 30 >= 60) {
    $h += 1;
    $m = $m + 30 - 60;
} else {
    $m = $m + 30;
}

if (mb_strlen($h) === 1) {
    $h = '0' . $h;
}

if (mb_strlen($m) === 1) {
    $m = '0' . $m;
}

echo $h . ":" . $m . "\n";