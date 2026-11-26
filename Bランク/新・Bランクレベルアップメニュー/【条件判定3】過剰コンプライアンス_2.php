<?php
$count = (int) trim(fgets(STDIN));
$bannedWord = trim(fgets(STDIN));

$length = strlen($bannedWord);
$middle = intdiv($length, 2);
// 奇数長の場合は前半と後半の両方に中央の文字を含める。
$halfLength = intdiv($length + 1, 2);
$left = substr($bannedWord, 0, $halfLength);
$right = substr($bannedWord, $middle);
$mask = str_repeat('x', $halfLength);

for ($i = 0; $i < $count; $i++) {
    $word = trim(fgets(STDIN));

    if (strlen($word) === $length) {
        if ($word === $bannedWord) {
            $word = 'banned';
        } elseif (substr($word, 0, $halfLength) === $left) {
            // 前半が一致したら x と　残す部分を連結
            $word = $mask . substr($word, $halfLength);
        } elseif (substr($word, $middle) === $right) {
            // 後半が一致したら　残す部分と x を連結
            $word = substr($word, 0, $middle) . $mask;
        }
    }

    echo $word . "\n";
}
