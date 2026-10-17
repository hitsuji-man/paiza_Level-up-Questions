<?php
    [$N, $K] = array_map('intval', explode(" ", trim(fgets(STDIN))));
    $robotIdols = [];
    for ($i = 0; $i < $N; $i++) { 
        $robotIdols[] = trim(fgets(STDIN));
    }

    for ($i = 0; $i < $K; $i++) { 
        $event = explode(" ", trim(fgets(STDIN)));
        if ($event[0] === "join") {
            $robotIdols[] = $event[1];
        } elseif ($event[0] === "leave") {
            // $event[1]という値を持つ要素を削除した配列を生成
            $robotIdols = array_values(array_filter(
                $robotIdols,
                fn($value) => $value !== $event[1]
            ));
        } elseif ($event[0] === "handshake") {
            sort($robotIdols);
            showAllMembersName($robotIdols);
        }
    }

    function showAllMembersName(array $robotIdols): void
    {
        if (empty($robotIdols)) {
            return;
        }
        foreach ($robotIdols as $idolName) {
            echo $idolName . "\n";
        }
    }