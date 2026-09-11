<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    [$tag_start, $tag_end] = explode(" ", trim(fgets(STDIN)));
    $S = trim(fgets(STDIN));
    [$index_start, $index_end] = explode(" ", trim(fgets(STDIN)));
    // 開始位置: <>内の文字数 + 右に1つずらして文字列の先頭位置へ
    $position_start = ($index_start + 1) + (strlen($tag_start) - 2);
    // 文字列の長さ = (終了位置: <の左に一つずらす(文字列の終端位置)) - 開始位置
    $length = ($index_end - 1) - $position_start;
    
    // 指定した範囲の文字列を取得
    $targetText = mb_substr($S, $position_start, $length);
    
    if ($targetText == "") {
        echo "<blank>\n";
    } else {
        echo "$targetText\n";
    }
?>