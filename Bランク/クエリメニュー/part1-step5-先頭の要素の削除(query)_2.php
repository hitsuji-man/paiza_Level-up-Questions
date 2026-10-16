<?php
    [$N, $K] = array_map('intval', explode(" ", trim(fgets(STDIN))));
    $A = [];
    for ($i = 0; $i < $N; $i++) { 
        $A[] = (int)trim(fgets(STDIN));
    }

    // 先頭の位置を変数で管理すると,popをO(1)で処理できる
    // 配列の要素はそのまま残し、showでは現在の先頭位置から出力する
    // 現在の先頭位置
    $head = 0;
    for ($i = 0; $i < $K; $i++) { 
        $command = trim(fgets(STDIN));

        if ($command === "pop") {
            if ($head < $N) {
                $head++;
            }
        } elseif ($command === "show") {
            for ($j = $head; $j < $N; $j++) { 
                echo $A[$j] . "\n";
            }
        }
    }