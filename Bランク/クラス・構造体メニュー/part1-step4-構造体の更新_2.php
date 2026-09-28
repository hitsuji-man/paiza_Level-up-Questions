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

        // 名前を変更するメソッド
        public function changeName(string $newNickname): void
        {
            $this->nickname = $newNickname;
        }
    }
    
    [$N, $K] = explode(" " , trim(fgets(STDIN)));
    for ($i = 0; $i < $N; $i++) {
        [$nickname, $old, $birth, $state] = explode(" ", trim(fgets(STDIN)));
        $users[] = new User($nickname, (int)$old, $birth, $state);
    }
    
    // 生徒番号と新しい名前を受け取り、名前を更新する処理
    for ($i = 0; $i < $K; $i++) {
        [$number, $newNickname] = explode(" ", trim(fgets(STDIN)));
        // メソッドを呼び出し名前を変更
        $users[$number - 1]->changeName($newNickname);
        
    }
    
    foreach ($users as $user) {
        echo $user;
    }
?>