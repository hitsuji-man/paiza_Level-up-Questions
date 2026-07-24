<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    // 1. ふたつのペアのりんごの数が異なる場合、りんごの数が多い方が偉い（この際、バナナの数は関係ない）。
    // 2. りんごの数が同じである場合、バナナの数が多い方が偉い。
    $n = trim(fgets(STDIN));
    $array = [];
    for ($i = 0; $i < $n; $i++) {
        $array[$i] = array_map(
            'intval',
            explode(" ", trim(fgets(STDIN)))
        );
    }
    // print_r($array);
    
    // 愚直に並べ替える
    for ($i = 0; $i < $n - 1; $i++) {
        // $iより右側だけを調べる
        for ($j = $i + 1; $j < $n; $j++) {
            // $array[$i]と$array[$j]を比較
             $shouldSwap = false;
             
            //  りんごが少ない場合
            if ($array[$i][0] < $array[$j][0]) {
                $shouldSwap = true;
            }
            // りんごが同じでバナナが少ない場合
            if ($array[$i][0] === $array[$j][0] && $array[$i][1] < $array[$j][1]) {
                $shouldSwap = true;
            }
            
            if ($shouldSwap) {
                $temp = $array[$i];
                $array[$i] = $array[$j];
                $array[$j] = $temp;
            }
        }
    }
    
    for ($i = 0; $i < $n; $i++) {
        echo $array[$i][0] . ' ' . $array[$i][1] . "\n";
    }
?>