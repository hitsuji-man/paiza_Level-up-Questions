<?php
    // 生徒数、試合数
    [$N, $K] = array_map('intval', explode(" ", trim(fgets(STDIN))));

    // N は平方数なので、ブロックの大きさ・個数は共に√N
    $blockSize = (int) sqrt($N);
    $blockCount = intdiv($N, $blockSize);

    $scores = [];
    $blockMin = array_fill(0, $blockCount, PHP_INT_MAX);
    $blockMax = array_fill(0, $blockCount, PHP_INT_MIN);

    // 得点を読み込み、ブロックごとの最低点・最高点を記録
    for ($i = 0; $i < $N; $i++) { 
        $score = (int) trim(fgets(STDIN));
        $scores[] = $score;

        $blockIndex = intdiv($i, $blockSize);

        $blockMin[$blockIndex] = min($blockMin[$blockIndex], $score);
        $blockMax[$blockIndex] = max($blockMax[$blockIndex], $score);
    }

    // 生徒番号 left ~ rightの「最高点 - 最低点」を求める
    function scoreRange(
        int $left,
        int $right,
        array &$scores,
        int $blockSize,
        array &$blockMin,
        array &$blockMax
    ): int {
        // 生徒番号は 1 始まり、添え字は 0 始まり
        $left--;
        $right--;

        $minimum = PHP_INT_MAX;
        $maximum = PHP_INT_MIN;

        // 左端の途中のブロックは、1人ずつ調べる
        while ($left <= $right && $left % $blockSize !== 0) {
            $minimum = min($minimum, $scores[$left]);
            $maximum = max($maximum, $scores[$left]);
            $left++;
        }

        // 丸ごと含まれるブロックは、記録した最低点・最高点を使う
        while ($left + $blockSize - 1 <= $right) {
            $blockIndex = intdiv($left, $blockSize);

            $minimum = min($minimum, $blockMin[$blockIndex]);
            $maximum = max($maximum, $blockMax[$blockIndex]);

            $left += $blockSize;
        }

        // 右端に残った部分は、1人ずつ調べる
        while ($left <= $right) {
            $minimum = min($minimum, $scores[$left]);
            $maximum = max($maximum, $scores[$left]);
            $left++;
        }

        return $maximum - $minimum;
    }

    $results = [];

    for ($i = 0; $i < $K; $i++) { 
        [$aLeft, $aRight, $bLeft, $bRight] = array_map('intval', explode(" ", trim(fgets(STDIN))));

        $aRange = scoreRange(
            $aLeft,
            $aRight,
            $scores,
            $blockSize,
            $blockMin,
            $blockMax
        );

        $bRange = scoreRange(
            $bLeft,
            $bRight,
            $scores,
            $blockSize,
            $blockMin,
            $blockMax
        );

        if ($aRange > $bRange) {
            $results[] = 'A';
        } elseif ($aRange < $bRange) {
            $results[] = 'B';
        } else {
            $results[] = 'DRAW';
        }
    }

    echo implode("\n", $results), "\n";