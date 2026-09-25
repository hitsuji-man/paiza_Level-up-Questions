<?php
    $numbers = explode(" ", trim(fgets(STDIN)));

    // usort: 自分で決めた比較ルールで配列を並び替える関数
    // 戻り値はなく,指定した配列が並び替えて上書きされる
    // function ($a, $b): 無名関数:比較ルールを決める関数
    usort($numbers, function ($a, $b) {
        // strcmp: 文字列を辞書順で比較する関数
        // 引数の順番: 大きくなる並びを先にする
        return strcmp($b . $a, $a . $b);
    });

    // implode: 配列の要素を区切りなし文字で繋ぐ
    echo implode("", $numbers) . "\n";
?>