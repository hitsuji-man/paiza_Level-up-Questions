<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    // パイザ君の魔法は 1 回目と 2 回目に使うときにはダメージ 1 ですが、 
    // 3 回目以降の n 回目には、(モンスターから受けた (n - 1) 回目の攻撃のダメージ) + (モンスターから受けた (n - 2) 回目の攻撃のダメージ) のダメージを与えます。
    // モンスターの魔法はこれよりも強力で、 1 回目と 2 回目には同じくダメージ 1 ですが、 
    // 3 回目以降の n 回目には、 (パイザ君から受けた (n - 1) 回目の攻撃のダメージ) * 2 + (パイザ君から受けた (n - 2) 回目の攻撃のダメージ) のダメージを与えます。
    // 入力例1
    //     7
    // 出力例1
    //     4
    $H = trim(fgets(STDIN));

    // パイザ君の直近2回のダメージ
    $paizaPrev2 = 1;
    $paizaPrev1 = 1;
    
    // モンスターの直近2回のダメージ
    $monsterPrev2 = 1;
    $monsterPrev1 = 1;
    
    // モンスターの1回目と2回目の攻撃
    $H -= 2;
    $count = 2;
    
    while ($H > 0) {
        // パイザ君のn回目の攻撃
        $paizaDamage = $monsterPrev1 + $monsterPrev2;
        
        // モンスターのn回目の攻撃
        // 計算にはパイザ君のn-1回目, n-2回目を使う
        $monsterDamage = $paizaPrev1 * 2 + $paizaPrev2;
        
        $H -= $monsterDamage;
        $count++;
        
        // パイザ君の攻撃履歴を更新
        $paizaPrev2 = $paizaPrev1;
        $paizaPrev1 = $paizaDamage;
        
        // モンスターの攻撃履歴を更新
        $monsterPrev2 = $monsterPrev1;
        $monsterPrev1 = $monsterDamage;
    }
    echo $count . "\n";
?>