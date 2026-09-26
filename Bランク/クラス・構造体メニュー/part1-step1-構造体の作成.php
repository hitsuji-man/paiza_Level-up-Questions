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
            return "User{\n"
                . "nickname : {$this->nickname}\n"
                . "old : {$this->old}\n"
                . "birth : {$this->birth}\n"
                . "state : {$this->state}\n"
                . "}\n";
                
        }
    }
    
    $N = (int)trim(fgets(STDIN));
    $users = [];
    
    for ($i = 0; $i < $N; $i++) {
        [$nickname, $old, $birth, $state] = explode(" ", trim(fgets(STDIN)));
        $users[] = new User($nickname, (int)$old, $birth, $state);
    }
    
    foreach ($users as $user) {
        echo $user;
    }
?>