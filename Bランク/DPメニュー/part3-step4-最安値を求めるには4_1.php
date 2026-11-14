<?php
    // りんごx個がa円で、y個がb円で、z個がc円で売られている
    [$n, $x, $a, $y, $b, $z, $c] = array_map('intval', explode(" ", trim(fgets(STDIN))));

    $limit = $n + $z - 1;
    // 初期値は購入不可能にしておく
    $dp = array_fill(0, $limit + 1, PHP_INT_MAX);
    // 0個なら何も買わないため、必要な金額は0円
    $dp[0] = 0;

    // dp[i]: ちょうど i 個買うための最小金額
    for ($i = 1; $i <= $limit; $i++) {
        // i - x が負にならず、ちょうど i - x 個買える場合に、x 個セットの追加を検討する 
        // x = 2: i = 2 の時、dp[0] = 0 で $dp[0] !== PHP_INT_MAX は true
        // 以降 dp[2],dp[4]...は値が更新され、$dp[2] !== PHP_INT_MAX は true 
        if ($i >= $x && $dp[$i - $x] !== PHP_INT_MAX) {
            // 現在の最小金額と、i - x 個の最小金額に x 個セットを足した金額(a)を比較する
            $dp[$i] = min($dp[$i], $dp[$i - $x] + $a);
        }

        // i - y が負にならず、ちょうど i - y 個買える場合に、x 個セットの追加を検討する 
        // y = 3: i = 3 の時、dp[0] = 0 で $dp[0] !== PHP_INT_MAX は true
        // 以降 dp[3],dp[6]...は値が更新され、$dp[3] !== PHP_INT_MAX は true
        if ($i >= $y && $dp[$i - $y] !== PHP_INT_MAX) {
            // 現在の最小金額と、i - y 個の最小金額に y 個セットを足した金額(b)を比較する
            $dp[$i] = min($dp[$i], $dp[$i - $y] + $b);
        }

        // i - z が負にならず、ちょうど i - z 個買える場合に、x 個セットの追加を検討する 
        // z = 5: i = 5 の時、dp[0] = 0 で $dp[0] !== PHP_INT_MAX は true
        // 以降 dp[5],dp[10]...は値が更新され、$dp[5] !== PHP_INT_MAX は true
        if ($i >= $z && $dp[$i - $z] !== PHP_INT_MAX) {
            // 現在の最小金額と、i - z 個の最小金額に z 個セットを足した金額(c)を比較する
            $dp[$i] = min($dp[$i], $dp[$i - $z] + $c);
        }
    }

    $answer = PHP_INT_MAX;
    // n 個以上買った時の最小金額
    for ($i = $n; $i <= $limit; $i++) {
        // これまでの答えと、ちょうど i 個買う最小金額のうち、安い方を答えにする 
        $answer = min($dp[$i], $answer);
    }
    echo $answer . "\n";