<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $m = trim(fgets(STDIN));
    $c = [];
    for ($i = 0; $i < $m; $i++) {
        $c[] = trim(fgets(STDIN));
    }
    $n = trim(fgets(STDIN));
    $s = [];
    for ($i = 0; $i < $n; $i++) {
         $s[] = trim(fgets(STDIN));
    }
    // print($m);
    // print_r($c);
    // print($n);
    // print_r($s);
    
    // 配列の要素である文字列s[$i]に文字c[$i]が含まれるか
    // c1がs1~snに含まれるかどうか、c2がs1~snに含まれるかどうか、cmがs1~snに含まれるかどうか
    for ($i = 0; $i < $m; $i++) {       // ciを固定
         for ($j = 0; $j < $n; $j++) {  // s1 ~ snを調べる
              if (strpos($s[$j], $c[$i]) !== false) {
                  echo "YES\n";
              } else {
                  echo "NO\n";
              }
         }
    }
    
?>