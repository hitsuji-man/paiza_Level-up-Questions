<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    [$tag_start, $tag_end] = explode(" ", trim(fgets(STDIN)));
    $S = trim(fgets(STDIN));
    $start_tag = "<";
    $indexes = [];
    for ($i = 0; $i < mb_strlen($S); $i++) {
         if ($S[$i] == $start_tag) {
             $indexes[] = $i + 1;
         }
    }
    // 配列をあらかじめ2つごとのグループに分割してから処理
    foreach (array_chunk($indexes, 2) as $index) {
        // 配列の要素を空白で連結し、1つの文字列に変換する
        echo implode(" ", $index) . "\n";
    }
?>