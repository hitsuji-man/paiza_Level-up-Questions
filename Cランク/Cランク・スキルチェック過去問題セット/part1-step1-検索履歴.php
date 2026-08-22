<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $N = trim(fgets(STDIN));
    $words = [];
    for($i = 0; $i < $N; $i++) {
        $input_word = trim(fgets(STDIN));
        // 以前入力されたことがある場合,$input_word中の該当単語を削除
        $key = array_search($input_word, $words, true);
        if ($key !== false) {
            // 該当単語を削除(添え字に欠番ができる)
            unset($words[$key]);
        }
        
        // 配列の先頭に要素を追加する(添え字を自動的に振り直す)
        array_unshift($words, $input_word);
    }
    // print_r($words);
    foreach ($words as $word) {
        echo "{$word}\n";
    }
?>