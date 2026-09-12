<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    [$tag_start, $tag_end] = explode(" ", trim(fgets(STDIN)));
    $S = trim(fgets(STDIN));
    $j = 0;
    while ($j < strlen($S)) {
        // j以降にある開始タグを検索
        $startPos = strpos($S, $tag_start, $j);
        if ($startPos === false) {
            break;
        }

        // 開始タグより後にある終了タグを検索
        $searchFrom = $startPos + strlen($tag_start);
        $endPos = strpos($S, $tag_end, $searchFrom);
        if ($endPos === false) {
            break;
        }

        // strposは0始まり、出力は1始まり
        echo ($startPos + 1) . " " . ($endPos + 1) . "\n";

        // 終了タグの直後から次の検索を開始
        $j = $endPos + strlen($tag_end);
    }
?>