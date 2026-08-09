<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    // 入力例1
    // 2 2 2
    // 2 1
    // 1 2
    // 1 1
    // 2 2
    // 出力例1
    // 1 2
    // 2 1
    [$a, $b, $c] = array_map(
        'intval',
        explode(' ', trim(fgets(STDIN)))
    );
    // echo "$a $b $c\n";
    $aToB = [];
    $bToC = [];
    for ($i = 0; $i < $a; $i++) {
        [$taska, $taskb] = explode(" ", trim(fgets(STDIN)));
        $aToB[$taska] = $taskb;
    }
    // print_r($aToB);
    
    for ($i = 0; $i < $b; $i++) {
        [$taskb, $taskc] = explode(" ", trim(fgets(STDIN)));
        $bToC[$taskb] = $taskc;
    }
    // print_r($bToC);
    
    ksort($aToB);
    
    foreach ($aToB as $aNumber => $bNumber) {
        $cNumber = $bToC[$bNumber];
        echo $aNumber . " " . $cNumber . "\n";
    }
?>