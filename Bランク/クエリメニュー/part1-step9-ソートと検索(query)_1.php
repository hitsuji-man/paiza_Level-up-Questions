<?php
    [$N, $K, $P] = array_map('intval', explode(" ", trim(fgets(STDIN))));
    $array = [];
    $array[] = $P;
    for ($i = 0; $i < $N; $i++) { 
        $array[] = (int) trim(fgets(STDIN));
    }

    $count = 1;
    $max = $N + 1;
    for ($i = 0; $i < $K; $i++) { 
        $line = explode(" ", trim(fgets(STDIN)));
        if ($line[0] === "join") {
            $array[] = $line[1];
            $max += 1;
        } elseif ($line[0] === "sorting") {
            sort($array);
            showPaizaNum($array, $max, $P, $count);
        }
    }

    function showPaizaNum(array $array, int $max, int $P, int $count): void
    {
        for ($i = 0; $i < $max; $i++) { 
            if ($array[$i] === $P) {
                echo $count . "\n";     
            }
            $count++;
        }
    }