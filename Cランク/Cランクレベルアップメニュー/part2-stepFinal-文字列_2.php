<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $N = trim(fgets(STDIN));
    for ($i = 0; $i < $N; $i++) {
        $line = explode(" ", trim(fgets(STDIN)));
        $now = explode(":", $line[0]);
        $hour = $now[0];
        $minutes = $now[1];
        $addHour = $line[1];
        $addMinutes = $line[2];
        
        $hour = $hour + $addHour;
        $minutes = $minutes + $addMinutes;

        if ($minutes >= 60) {
            $hour += 1;
            $minutes -= 60;
        }
        // 24時以降の場合
        if ($hour >= 24) {
            $hour = $hour - 24;
        } elseif ($hour == 24) {
            $hour = "00";
        }
        // 1の桁の場合は0埋め
        if (mb_strlen($hour) === 1) {
            $hour = "0" . $hour;
        }
        if (mb_strlen($minutes) == 1) {
            $minutes = "0" . $minutes;
        }
        
        echo $hour . ":" . $minutes . "\n";
    }
?>