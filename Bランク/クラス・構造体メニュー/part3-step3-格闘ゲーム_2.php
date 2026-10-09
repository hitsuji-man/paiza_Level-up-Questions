<?php
class Player2
{
    private int $hp;
    private array $techniques;
    private bool $isFinished = false;
    // 静的メンバ:クラス全体で共有する残り人数
    // (各インスタンスごとではない)
    public static int $remainingCount = 0;

    public function __construct(int $hp, int $F1, int $A1, int $F2, int $A2, int $F3, int $A3)
    {
        $this->hp = $hp;
        // 強化系の技:各$F = 0, $A = 0の時
        $this->techniques[1] = [
            'frame'  => $F1,
            'damage' => $A1,
        ];
        $this->techniques[2] = [
            'frame'  => $F2,
            'damage' => $A2,
        ];
        $this->techniques[3] = [
            'frame'  => $F3,
            'damage' => $A3,
        ];

        self::$remainingCount++;
    }

    // 退場の判定
    public function judgeHp(): void
    {
        if ($this->hp === 0 && !$this->isFinished) {
            // すでに退場したプレイヤーに再びjudgeHp()を呼んでも、人数を重複して減らないようにする
            $this->isFinished = true;
            self::$remainingCount--;
            return;
        }
    }

    // 退場しているかの状態を返す
    public function getIsFinished(): bool
    {
        return $this->isFinished;
    }

    // 強化技かどうか
    public function isBuf(int $techniqueNumber): bool
    {
        return $this->techniques[$techniqueNumber]['frame'] === 0 && $this->techniques[$techniqueNumber]['damage'] === 0;
    }

    // 強化技を使う
    public function useBuf(): void
    {
        foreach ($this->techniques as $number => $technique) {
            // 強化技自身は変更しない
            if ($technique['frame'] === 0 && $technique['damage'] === 0) {
                continue;
            }
            // 強化を反映させたいならtechniquesプロパティを指定する必要がある
            $this->techniques[$number]['frame'] = max(1, $technique['frame'] - 3);
            $this->techniques[$number]['damage'] += 5;
        }
    }

    // 相手が攻撃技を使う(自分がダメージを受ける)
    // 相手の選んだ技のdamageを受ける→相手のオブジェクトと相手の選んだ技番号が必要
    public function receiveDamage(Player2 $opponent, int $techniqueNumber): void
    {
        $damage = $opponent->techniques[$techniqueNumber]['damage'];
        $this->hp = max(0, $this->hp - $damage);
    }

    // 互いに攻撃技を使う
    public function mutualDamage(Player2 $opponent, int $myTechniqueNumber, int $yourTechniqueNumber): void
    {
        $F1 = $this->techniques[$myTechniqueNumber]['frame'];
        $F2 = $opponent->techniques[$yourTechniqueNumber]['frame'];

        if ($F1 < $F2) {
            // プレイヤー2のhpがA1減る(プレイヤー2が相手のA1の技でダメージを受ける)
            $opponent->receiveDamage($this, $myTechniqueNumber);
        } elseif ($F1 > $F2) {
            // プレイヤー1のhpがA2減る(プレイヤー1が相手のA2の技でダメージを受ける)
            $this->receiveDamage($opponent, $yourTechniqueNumber);
        }
    }

    // 残り人数を取得する
    public static function getRemainingCount(): int
    {
        return self::$remainingCount;
    }
}

[$N, $K] = explode(" ", trim(fgets(STDIN)));
$players = [];
for ($i = 1; $i <= $N; $i++) {
    $line = array_map('intval', explode(" ", trim(fgets(STDIN)))); 
    $players[$i] = new Player2($line[0], $line[1], $line[2], $line[3], $line[4], $line[5], $line[6]);
}

for ($i = 1; $i <= $K; $i++) { 
    [$P1, $T1, $P2, $T2] = explode(" ", trim(fgets(STDIN)));

    /**  @var Player2 $me */
    $me = $players[$P1];
    /**  @var Player2 $opponent */
    $opponent = $players[$P2];
    
    // どちらか相手が退場済みなら処理をスキップ
    if ($me->getIsFinished() || $opponent->getIsFinished()) {
        continue;
    }

    $myBuf = $me->isBuf($T1);
    $yourBuf = $opponent->isBuf($T2);

    // 技の処理
    if ($myBuf && $yourBuf) {
        // どちらも強化技
        $me->useBuf();
        $opponent->useBuf();
    } elseif ($myBuf) {
        // 自分が強化技,相手が攻撃技(自分は相手の技でダメージを受ける)
        $me->useBuf();
        $me->receiveDamage($opponent, $T2);
    } elseif ($yourBuf) {
        // 自分は攻撃技(相手は自分の技でダメージを受ける),相手は強化技
        $opponent->receiveDamage($me, $T1);
        $opponent->useBuf();
    } else {
        // 互いに攻撃する
        $me->mutualDamage($opponent, $T1, $T2);
    }

    // 技の処理後に退場の判定をする
    $me->judgeHp();
    $opponent->judgeHp();
}

// 場に残っている人間を出力する
echo Player2::getRemainingCount() . "\n";