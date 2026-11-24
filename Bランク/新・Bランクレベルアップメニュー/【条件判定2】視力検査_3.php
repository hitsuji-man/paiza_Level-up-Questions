<?php

$N = (int) trim(fgets(STDIN));
$results = [];

for ($i = 0; $i < $N; $i++) {
    $results[] = preg_split('/\s+/', trim(fgets(STDIN)));
}

$answer = 'E';

foreach (['D', 'C', 'B', 'A'] as $grade) {
    $countOK = 0;
    $countNG = 0;

    foreach ($results as [$test, $status]) {
        if ($test !== 'T' . $grade) {
            continue;
        }

        if ($status === 'ok') {
            $countOK++;
        } else {
            $countNG++;
        }

        if ($countOK === 2) {
            $answer = $grade;
            break;
        }

        if ($countNG === 2) {
            break;
        }
    }
}

echo $answer . PHP_EOL;
