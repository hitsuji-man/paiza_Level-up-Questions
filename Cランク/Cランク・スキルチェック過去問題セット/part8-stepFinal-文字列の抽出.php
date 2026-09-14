<?php
    [$tag_start, $tag_end] = explode(" ", trim(fgets(STDIN)));
    $S = trim(fgets(STDIN));

    $offset = 0;

    while (($startPos = strpos($S, $tag_start, $offset)) !== false) {
        // 開始タグの直後に移動
        $textStart = $startPos + strlen($tag_start);
        // 対応する終了タグを検索
        $endPos = strpos($S, $tag_end, $textStart);
        if ($endPos === false) {
            break;
        }
        $text = substr($S, $textStart, $endPos - $textStart);
        
        echo $text === "" ? "<blank>\n" : $text . "\n";

        // 終了タグの後から次の検索を開始
        $offset = $endPos + strlen($tag_end);
    }
?>