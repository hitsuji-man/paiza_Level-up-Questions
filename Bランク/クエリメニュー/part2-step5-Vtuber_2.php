<?php
// 名前をキー、累計金額を値とする連想配列で管理する
// メンバーシップは名前だけの配列で管理する

$N = (int) trim(fgets(STDIN));

$superchats = [];
$memberships = [];

for ($i = 0; $i < $N; $i++) { 
    $event = explode(" ", trim(fgets(STDIN)));

    $name = $event[0];
    $command = $event[1];

    if ($command === "give") {
        $money = (int) $event[2];

        // 初回は 0 に加算し、以降は累計金額に加算する
        $superchats[$name] = ($superchats[$name] ?? 0) + $money;
    } else {
        $memberships[] = $name;
    }
}

// 同額の場合、名前の辞書順の降順で並び替える
// 名前の辞書順の降順 → 金額の降順　でソートする
// (金額で先に降順にしてから、名前の辞書順の降順だと、名前が優先され、金額の降順が崩れる。)
krsort($superchats, SORT_STRING);
arsort($superchats, SORT_NUMERIC);

// メンバーシップ加入者は名前の辞書順の昇順
sort($memberships, SORT_STRING);

foreach ($superchats as $name => $total) {
    echo $name . "\n";
}

foreach ($memberships as $name) {
    echo $name . "\n";
}