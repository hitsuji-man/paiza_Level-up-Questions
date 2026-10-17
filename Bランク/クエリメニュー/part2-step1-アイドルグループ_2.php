<?php
    [$N, $K] = array_map('intval', explode(" ", trim(fgets(STDIN))));
    // どのようなデータにするか：名前を連想配列のキーとして管理する
    $robotIdols = [];
    for ($i = 0; $i < $N; $i++) { 
        $name = trim(fgets(STDIN));
        $robotIdols[$name] = true;
    }

    for ($i = 0; $i < $K; $i++) { 
        $event = explode(" ", trim(fgets(STDIN)));
        if ($event[0] === "join") {
            $robotIdols[$event[1]] = true;
        } elseif ($event[0] === "leave") {
            // $event[1]という値を持つ要素を削除したい
            // ここで計算量を食っていた: O(M)→O(1)へ
            unset($robotIdols[$event[1]]);
        } elseif ($event[0] === "handshake") {
            // 名前(キー)を文字列の辞書順で並べる
            ksort($robotIdols, SORT_STRING);
            showAllMembersName($robotIdols);
        }
    }

    function showAllMembersName(array $robotIdols): void
    {
        if (empty($robotIdols)) {
            return;
        }
        foreach ($robotIdols as $IdolName => $value) {
            echo $IdolName . "\n";
        }
    }