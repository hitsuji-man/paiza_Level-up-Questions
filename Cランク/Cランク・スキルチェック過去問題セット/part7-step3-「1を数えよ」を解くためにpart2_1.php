<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $S = fgets(STDIN);
    $binaryDigits = mb_str_split($S);
    $oneCount = count(array_keys($binaryDigits, 1));
    echo "$oneCount\n";
?>