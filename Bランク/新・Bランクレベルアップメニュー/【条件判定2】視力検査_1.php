<?php
    $N = (int) trim(fgets(STDIN));
    $test = [];
    $classes = [];
    for ($i = 1; $i <= $N; $i++) { 
        [$class, $status] = explode(" ", trim(fgets(STDIN)));
    
        // 未定義かnullの時だけ代入する
        $test[$class] ??= [
            'countOK' => 0,
            'countNG' => 0,
        ];
        
        if ($status === "ok") {
            $test[$class]['countOK']++;
        } else {
            $test[$class]['countNG']++;
        }

        if ($test[$class]['countNG'] < 2 && $test[$class]['countOK'] === 2) {
            $classes[] = $class[1];     // "TA"なら"A"
        } else {
            $classes[] = "E";
        }
    }
    // print_r($classes);

    // $classesから辞書順で最も小さい文字列を取り出す
    sort($classes, SORT_STRING);
    $smallest = $classes[0];
    echo $smallest . "\n"; 
