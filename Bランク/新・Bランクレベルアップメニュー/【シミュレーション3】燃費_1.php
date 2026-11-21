<?php
    $X = (int) trim(fgets(STDIN));
    [$F1, $F2] = array_map('intval', explode(" ", trim(fgets(STDIN))));
    [$L, $N] = array_map('intval', explode(" ", trim(fgets(STDIN))));
    $s = [];
    $s = array_map('intval', explode(" ", trim(fgets(STDIN))));

    // X=10m 走るまでは1mあたりF1=7m,そのあと止まるまでは1mあたりF2=3m
    // s1=50mの地点で一時停止をして、全長L=100m 走る
    // 10m * F1 + (50 - 10)m * F2 + 10m * $F1 + (100 - 10 + (50 - 10) + 10)m * $F2
    // $sum = 0;
    // $sum = $X * $F1 + ($s[0] - $X) * $F2 + $X * $F1 + ($L - ($X + ($s[0] - $X) + $X)) * $F2;

    // 一時停止地点が2つの場合: 30m, 60m, X=50, L=100
    // 発進から50m走るまでは、1mあたりF1=5m,発進から50m走ったあと止まるまでは1mあたりF2=4m
    // 30m * F1 + (60 - 30) * F1 + (100 - 60) * F1
    // $sum = $s[0] * $F1 + ($s[1] - $s[0]) * $F1 + ($L - $s[1]) * $F1;

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

        $prev = $next;      // 次の区間の始点を、今の終点に更新する
    }

    echo $sum . "\n";