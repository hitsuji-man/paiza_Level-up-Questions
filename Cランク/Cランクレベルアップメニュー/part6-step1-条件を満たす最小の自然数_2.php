<?php

$n = 10000;

while (true) {
    if ($n % 13 === 0) {
        break;
    }
    $n++;
}

echo $n . "\n";