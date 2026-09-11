<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    // 文字列$Sの中にタグが1つしか存在しない場合にのみ対応
    [$tag_start, $tag_end] = explode(" ", trim(fgets(STDIN)));
    $S = trim(fgets(STDIN));
    // echo "$tag_start $tag_end $S\n";
    
    // 開始タグで文字列を分割
    $parts = explode($tag_start, $S);
    $targetText = [];
    if (count($parts) > 1) {
        // 開始タグの直後を取得
        // echo "$parts[1]\n";
        $targetText[] = explode($tag_end, $parts[1])[0];
    }
    foreach ($targetText as $text) {
        if ($text == "") {
            echo "<blank>\n";   
        } else {
            echo "$text\n";
        }
    }
?>