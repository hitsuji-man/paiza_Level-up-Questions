<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
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
    
    // 生徒の構造体と新しい名前を受け取り、その名前を修正する関数 changeName を作成
    // クラス外に関数を作成
    function changeName(User $user, string $newNickname): void
    {
        $user->nickname = $newNickname;
    }
    
    [$N, $K] = explode(" " , trim(fgets(STDIN)));
    for ($i = 0; $i < $N; $i++) {
        [$nickname, $old, $birth, $state] = explode(" ", trim(fgets(STDIN)));
        $users[] = new User($nickname, (int)$old, $birth, $state);
    }
    
    // 生徒番号と新しい名前を受け取り、名前を更新する処理
    for ($i = 0; $i < $K; $i++) {
        [$number, $newNickname] = explode(" ", trim(fgets(STDIN)));
        // 生徒の構造体と新しい名前を受け取り、名前を更新
        changeName($users[$number - 1], $newNickname);
    }
    
    foreach ($users as $user) {
        echo $user;
    }
?>