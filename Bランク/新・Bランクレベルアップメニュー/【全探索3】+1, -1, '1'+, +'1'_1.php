<?php
    
    function manipulateNumbers(array $pairs): int {
        $min = PHP_INT_MAX;
        // 操作を何もしないで、2つの数の差の絶対値の最小値を求める
        $min = absoluteDifference($pairs);

        // 操作をして、2つの数の差の絶対値を求める

        return $min;
    }

    // 2つの数の差の絶対値を求める
    function absoluteDifference(array $pairs): int {
        $min = PHP_INT_MAX;
        $pairCount = count($pairs);
        for ($i = 0; $i < $pairCount; $i++) { 
            $abs = abs($pairs[$i][1] - $pairs[$i][0]);
            if ($abs < $min) {
                $min = $abs;
            }
        }
        return $min;
    }

    $N = (int) trim(fgets(STDIN));
    $X = [];
    for ($i = 0; $i < $N; $i++) { 
        $X[$i] = (int) trim(fgets(STDIN));
    }

    // 2つの組み合わせを格納した配列
    $pairs = [];

    // 2つの組み合わせを全て選ぶ
    for ($i = 0; $i < $N; $i++) { 
        for ($j = $i + 1; $j < $N; $j++) { 
            // 常に $i < $j なので同じ位置を2回選ぶことはなく、逆順のペアは数えない
            $pairs[] = [$X[$i], $X[$j]];
        }
    }
    // print_r($pairs);
    $min = PHP_INT_MAX;
    $min= manipulateNumbers($pairs);
    echo $min . "\n";
