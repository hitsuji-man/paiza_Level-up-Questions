<?php
    $N = (int) trim(fgets(STDIN));
    $array = [];
    for ($i = 0; $i < $N; $i++) { 
        $array[] = (int) trim(fgets(STDIN));
    }

    array_shift($array);
    foreach ($array as $item) {
        echo $item . "\n";
    }