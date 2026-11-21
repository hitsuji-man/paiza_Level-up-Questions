<?php
    $X = (int) trim(fgets(STDIN));
    [$F1, $F2] = array_map('intval', explode(" ", trim(fgets(STDIN))));
    [$L, $N] = array_map('intval', explode(" ", trim(fgets(STDIN))));
    $s = [];
    $s = array_map('intval', explode(" ", trim(fgets(STDIN))));

    // 「前に止まった地点から、次に止まる地点まで」を1区間として考える
    $sum = 0;
    $prev = 0;
    $s[] = $L;  // ゴール地点も最後の要素として追加する
    foreach ($s as $next) {
        // 1つの地点ずつ処理する
        $distance = $next - $prev;  // 区間を一般化し、毎回更新する

        if ($distance < $X) {
            // 区間が燃費F1m/mlの間に収まる
            $sum += $distance * $F1;
        } else {
            // 区間が燃費F1m/mlとF2m/mlの間をまたがる
            $sum += $X * $F1 + ($distance - $X) * $F2;
        }

        $prev = $next;  // 次の区間の始点を、今の終点に更新する
    }

    echo $sum . "\n";