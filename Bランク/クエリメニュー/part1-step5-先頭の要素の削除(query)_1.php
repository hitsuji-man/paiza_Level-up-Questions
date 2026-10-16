<?php
    [$N, $K] = array_map('intval', explode(" ", trim(fgets(STDIN))));
    $array = [];
    for ($i = 0; $i < $N; $i++) { 
        $array[] = (int) trim(fgets(STDIN));
    }

    for ($i = 0; $i < $K; $i++) { 
        $line = trim(fgets(STDIN));
        if ($line === "pop") {
            if (!empty($array)) {
                array_shift($array);
            } else {
                continue;
            }
        } elseif ($line === "show") {
            if (!empty($array)) {
                showArray($array);
            } else {
                continue;
            }
        } 
    }

    function showArray(array $array): void
    {
        foreach ($array as $item) {
            echo $item . "\n";
        }
    }