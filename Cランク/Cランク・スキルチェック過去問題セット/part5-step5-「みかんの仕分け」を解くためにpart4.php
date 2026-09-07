<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    [$N, $M] = explode(" ", trim(fgets(STDIN)));
    $P = trim(fgets(STDIN));
    $k = explode(" ", trim(fgets(STDIN)));
    // Nの倍数の箱
    $validBoxes = [];
    foreach ($k as $box) {
        if ($box % $N == 0) {
            $validBoxes[] = $box;
        }
    }
    // print_r($validBoxes);
    
    // みかんを1個ずつ読み込み、候補となる全ての箱との距離を調べ、最も近い箱を選ぶ
    for ($i = 0; $i < $M; $i++) {
         $mikan = trim(fgets(STDIN));
         
        //  初期値を入れておく
         $answer = $validBoxes[0];
         $minDistance = abs($mikan - $answer);
         
         foreach ($validBoxes as $box) {
             $distance = abs($mikan - $box);
             
            //  現在の箱の距離がこれまでの最小距離より小さいか or 距離が同じだった場合に現在の箱の数字がこれまでの答えより大きいか
             if ($distance < $minDistance || ($distance == $minDistance && $box > $answer)) {
                 $answer = $box;
                 $minDistance = $distance;
             }
         }
         echo "$answer\n";
    }  
?>