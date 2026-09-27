<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    /**
     * 
     */
    class User
    {
        public $nickname;
        public $old;
        public $birth;
        public $state;
        
        public function __construct($nickname, $old, $birth, $state)
        {
            $this->nickname = $nickname;
            $this->old = $old;
            $this->birth = $birth;
            $this->state = $state;
        }
        
        public function __toString(): string
        {
            return "{$this->nickname} {$this->old} {$this->birth} {$this->state}\n";
                
        }
    }
    
    $N = (int)trim(fgets(STDIN));
    $users = [];
    
    for ($i = 0; $i < $N; $i++) {
        [$nickname, $old, $birth, $state] = explode(" ", trim(fgets(STDIN)));
        $users[] = new User($nickname, (int)$old, $birth, $state);
    }
    
    // usort: 戻り値がどちらを前に並べるかの指示になる
    // 戻り値-1: $aを$bより前にする
    // 戻り値0: 順序を変更しない
    // 戻り値1: $aを$bより後ろにする
    usort($users, function ($a, $b) {
        // <=> は左右の値を比較して、次の値を返す演算子です。
        // - 左が小さい：-1
        // - 同じ：0
        // - 左が大きい：1    
        return $a->old <=> $b->old; 
    });
    
    foreach ($users as $user) {
        echo $user;
    }
?>