<?php
    [$N, $K, $P] = array_map('intval', explode(" ", trim(fgets(STDIN))));
    
    // paizaくん自身を含めた順位
    $position = 1;
    for ($i = 0; $i < $N; $i++) { 
        $height = (int) trim(fgets(STDIN));
        if ($height < $P) {
            $position++;
        }
    }

    for ($i = 0; $i < $K; $i++) { 
        $event = explode(" ", trim(fgets(STDIN)));
        if ($event[0] === "join") {
            if ((int)$event[1] < $P) {
                $position++;
            }
        } else {
            echo $position . "\n";
        }
    }