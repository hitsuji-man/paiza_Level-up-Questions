<?php

[$X, $Y, $Z] = array_map('intval', explode(' ', trim(fgets(STDIN))));

$dp = array_fill(0, $Z + 1, PHP_INT_MAX);
$dp[0] = 0;

$coins = [1, $X, $Y];

for ($amount = 1; $amount <= $Z; $amount++) {
    foreach ($coins as $coin) {
        if ($amount >= $coin) {
            $dp[$amount] = min(
                $dp[$amount],
                $dp[$amount - $coin] + 1
            );
        }
    }
}

echo $dp[$Z] . PHP_EOL;
?>