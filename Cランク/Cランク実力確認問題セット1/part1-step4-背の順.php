<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $N = trim(fgets(STDIN));
    
    $students = [];

    for ($i = 0; $i < $N; $i++) { 
        [$height, $name] = explode(" ", trim(fgets(STDIN)));
        // 連想配列に格納(名前を出力。身長 =>名前)
        $students[$height] = $name;
    }

    // キー(身長)が大きい順にソート
    krsort($students);
    foreach ($students as $name) {
        echo "$name\n";
    }
?>