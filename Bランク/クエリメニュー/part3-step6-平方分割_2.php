<?php
    $K = (int) trim(fgets(STDIN));
    
    $N = 10000;
    $blockSize = 100;
    $A = [];
    $blockMax = array_fill(0, 100, PHP_INT_MIN);

    // 入力を読みながら、各ブロックの最大値を保存
    for ($i = 0; $i < $N; $i++) { 
        $A[$i] = (int) trim(fgets(STDIN));

        // 添え字$iの要素が何番目のブロックに属するかを求める
        $block = intdiv($i, $blockSize);
        $blockMax[$block] = max($blockMax[$block], $A[$i]);
    }

    // 区間l~区間rに対して最大値を求める
    for ($q = 0; $q < $K; $q++) { 
        [$l, $r] = array_map(
            'intval',
            explode(" ", trim(fgets(STDIN)))
        );

        // 要素番号を0始まりの添字に変換
        $l--;
        $r--;

        $answer = PHP_INT_MIN;
        $pos = $l;

        while ($pos <= $r) {
            // ブロックの先頭で、末尾まで区間に含まれている場合
            if (
                // 現在位置がブロックの先頭である && そのブロックの最後まで検索区間に含まれる
                $pos % $blockSize === 0 &&
                $pos + $blockSize - 1 <= $r 
            ) {
                $block = intdiv($pos, $blockSize);
                // 保存済みの値を使う
                $answer = max($answer, $blockMax[$block]);

                // ブロック100個分をまとめて進む
                $pos += $blockSize;
            } else {
                // 現在位置がブロックの途中、またはブロックの末尾が検索区間の右端を超える場合
                // 現在の1要素を調べ、次の要素へ進む
                $answer = max($answer, $A[$pos]);
                $pos++;
            }
        }

        echo $answer . "\n";
    }

