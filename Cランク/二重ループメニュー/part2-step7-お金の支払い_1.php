<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    // 
    // 50 100 855
    // 14
    // 170 999 1020
    // 6
    $input_line = trim(fgets(STDIN));
    $input_line = explode(" ", $input_line);
    $X = $input_line[0];
    $Y = $input_line[1];
    $Z_pay = $input_line[2];
    $answer = $Z_pay;
    $count1 = 0;
    
    // 全ての1,X,Y円硬貨の支払いからを調べる
    // ちょうどZ_pay円を支払うため,X,Y円硬貨の支払う枚数をa,b枚と決めた場合、1円硬貨を支払う枚数はZ-X*a-Y*b枚となる
    // この関係を用いることで、x,y円の2種類の効果をチェックするだけで1円硬貨の枚数も求めることができる
    // よってx,y円の枚数について二重ループを用いてチェックすることで、この問題を解ける
    // 2<= X,Y <= 1000と1 <= Z <= 3000より、X,Y円硬貨を支払う枚数は最大で1500枚になるので、各ループは 0~1500 で回せばいい 
    
    for ($i = 0; $i <= 1500; $i++) {
        for ($j = 0; $j <= 1500; $j++) {
            if ($X*$i + $Y*$j <= $Z_pay) {
                $count1 = $Z_pay - $X * $i - $Y * $j;
                if ($i + $j + $count1 < $answer) {
                    $answer = $i + $j + $count1;
                }
            } 
        }
    }
    echo "$answer\n";
?>