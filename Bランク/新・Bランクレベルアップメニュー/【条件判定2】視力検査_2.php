<?php

$N = (int) trim(fgets(STDIN));
$test = [];
$best = 'E';

for ($i = 0; $i < $N; $i++) {
    [$class, $status] = preg_split('/\s+/', trim(fgets(STDIN)));
    // 未定義かnullの時だけ代入する
    $test[$class] ??= ['countOK' => 0, 'countNG' => 0];

    // 先に2回に達した結果で、この段階の合否を確定する。
    if ($test[$class]['countOK'] === 2 || $test[$class]['countNG'] === 2) {
        continue;
    }

    if ($status === 'ok') {
        $test[$class]['countOK']++;
        // カウントが2 かつ 文字が辞書順で小さいとき
        if ($test[$class]['countOK'] === 2 && $class[1] < $best) {
            // 文字(テスト結果)を更新する
            $best = $class[1];
        }
    } else {
        $test[$class]['countNG']++;
    }
}

echo $best . "\n";
