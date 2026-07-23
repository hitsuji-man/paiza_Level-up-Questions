<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $n = fgets(STDIN);
    $isSeven = false;
    for ($i = 0; $i < $n; $i++) {
         $number = trim(fgets(STDIN));
         if ($number == 7) {
             $isSeven = true;
             break;
         }
    }
    if ($isSeven) {
        echo "YES\n";
    } else {
        echo "NO\n";
    }
?>