<?php
    $N = trim(fgets(STDIN));
    $count = 0;

    for ($i = 1; $i <=$N; $i++) { 
        $now = $i;
        while ($now % 2 == 0) {
            $now /= 2;
            $count += 1;
        }
    }
    echo "$count\n";
?>