<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $n = trim(fgets(STDIN));
    $person = [];
    for ($i = 0; $i < $n; $i++) {
        $person[] = trim(fgets(STDIN));
    }
    // print_r($person);
    $m = trim(fgets(STDIN));
    $personDamage = [];
    for ($i = 0; $i < $m; $i++) {
        [$name, $damage] = explode(" ", trim(fgets(STDIN)));
        $personDamage[] = [$name, $damage];
    }
    // print_r($personDamage);
    $targetPerson = trim(fgets(STDIN));
    // print($targetPerson);
    $damageSum = 0;
    
    for ($i = 0; $i < $m; $i++) {
        if ($personDamage[$i][0] === $targetPerson) {
            $damageSum += $personDamage[$i][1];
        }
    }
    echo $damageSum . "\n";
?>