<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $n = trim(fgets(STDIN));
    $array = [];
    for ($i = 0; $i < $n; $i++) {
        [$name, $property] = explode(" ", trim(fgets(STDIN)));
        $array[] = [$name, $property];
    }
    // print_r($array);
    $searchName = trim(fgets(STDIN));
    // print($searchName);
    
    for ($i = 0; $i < $n; $i++) {
        if ($array[$i][0] === $searchName) {
            echo $array[$i][1] . "\n";
        }
    }
?>