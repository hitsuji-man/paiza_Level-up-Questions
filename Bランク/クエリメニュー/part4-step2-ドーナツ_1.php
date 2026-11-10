<?php
    // 生地の高さH、幅W、ドーナツの個数Nを読み込む
    [$H, $W, $N] = array_map('intval', explode(" ", trim(fgets(STDIN))));

    // 累積和の1行分の要素数(左端に0の列を追加)
    $stride = $W + 1;
    // 上端と左端を0にした累積和配列を用意
    // 2次元の表を1本の1次元配列に格納している
    $sum = array_fill(0, ($H + 1) * $stride, 0);

    // 生地の各行を上から順に処理
    for ($y = 1; $y <= $H; $y++) { 
        // この行のチョコの数を読み込む
        $row = array_map('intval', explode(" ", trim(fgets(STDIN))));
        // この行の左端からの合計を初期化
        $rowSum = 0;

        // 累積和配列における現在の行の開始位置
        $current = $y * $stride;
        // 累積和配列における1つ上の行の開始位置
        $previous = ($y - 1) * $stride;

        // この行の各区画を左から順に処理
        for ($x = 1; $x <= $W ; $x++) { 
            // 現在の区画までの行内の合計を計算
            $rowSum += $row[$x - 1];
            // 上側の長方形の合計に現在の行の合計を加算
            $sum[$current + $x] = $sum[$previous + $x] + $rowSum;
        }   // この行の処理を終了
    }   // 累積和の作成を終了


    // 中心(y,x), 一辺sizeの正方形内にあるチョコの合計を返す関数
    /**
     * &$sumで配列を参照渡しし、元の累積和配列を利用する
     * → 配列を渡しても、実際に変更するまではデータのコピーを避ける* 仕組み(コピーオンライト)があるため、$sumで渡しても良い.
     * 今回のsquareSumは配列を読むだけなので、&は不要
     */
    function squareSum(
        array &$sum,    // 作成済みの累積和配列
        int $stride,    // 累積和の1行分の要素数
        int $y,         // 中心の行番号(1始まり)
        int $x,         // 中心の列番号(1始まり)
        int $size       // 正方形の一辺の長さ
    ): int {
        // 中心から上下左右の端までの区画数を計算
        $radius = intdiv($size, 2);

        // 正方形の上端の1つ上の行番号
        $top = $y - $radius - 1;
        // 正方形の左端の1つ左の列番号
        $left = $x - $radius - 1;
        // 正方形の下端の行番号
        $bottom = $y + $radius;
        // 正方形の右端の行番号
        $right = $x + $radius;

        
        return $sum[$bottom * $stride + $right] // 左上から正方形の右下までの合計
            - $sum[$top * $stride + $right]     // 正方形より上にある領域を引く
            - $sum[$bottom * $stride + $left]   // 正方形より左にある領域を引く
            + $sum[$top * $stride + $left];     // 二重に引いた左上の領域を足し戻す      
    }

    $output = '';   // 出力する文字列を初期化

    // N個のドーナツを順番に処理
    for ($i = 0; $i < $N; $i++) { 
        [$y, $x, $B, $S] = array_map('intval', explode(" ", trim(fgets(STDIN))));

        $outer = squareSum($sum, $stride, $y, $x, $B);  // 外側の正方形に含まれるチョコの数
        $inner = squareSum($sum, $stride, $y, $x, $S);  // 穴となる内側の正方形に含まれるチョコの数

        $output .= ($outer - $inner) . "\n";    // 外側から内側を引いた答えと改行を追加
    }

    echo $output;