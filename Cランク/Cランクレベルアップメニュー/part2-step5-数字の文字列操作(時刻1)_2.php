<?php
$s = explode(':', trim(fgets(STDIN)));

$h = (int)$s[0];    // 0埋めを解除するには文字列を整数型に変換する
$m = (int)$s[1];

echo $h . "\n";
echo $m . "\n";