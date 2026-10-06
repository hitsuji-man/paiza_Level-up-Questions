<?php
class Player
{
    private int $hp;
    private array $techniques;  // 技
    private bool $isFinished = false;   // 退場したか

    public function __construct(int $hp, int $F1, int $A1, int $F2, int $A2, int $F3, int $A3)
    {
        $this->hp = $hp;
        // 強化技 + 攻撃技2種 or 攻撃技3種
        // 'frame'と'damage'のどちらの値も0の時、強化技
        $this->techniques[1] = [
            'frame' => $F1,
            'damage' => $A1,
        ];
        $this->techniques[2] = [
            'frame' => $F2,
            'damage' => $A2,
        ];
        $this->techniques[3] = [
            'frame' => $F3,
            'damage' => $A3,
        ];
    }

    public function getIsFinished(): bool
    {
        return $this->isFinished;
    }

    // 強化技かどうか判定する
    public function isBuf(int $techniqueNumber): bool
    {
        $technique = $this->techniques[$techniqueNumber];
        return $technique['frame'] === 0 && $technique['damage'] === 0;
    }

    // 強化技を使う: 全ての技の発生フレーム(最短1フレーム)を-3,攻撃力を+5
    public function useBuf(): void
    {
        foreach ($this->techniques as $number => $technique) {
            // 強化技自身は変更しない
            if ($technique['frame'] === 0 && $technique['damage'] === 0) {
                continue;
            }
            // 発生フレームを-3(最小値1)
            $this->techniques[$number]['frame'] = max(1, $technique['frame'] - 3);
            // 攻撃力を+5
            $this->techniques[$number]['damage'] += 5;
        }
    }

    // 相手が攻撃技を使う: 攻撃力分hpが減少する
    // 相手の選んだ技のdamageを取得する必要がある→相手のPlayerオブジェクトと選んだ技番号が必要
    public function receiveDamage(Player $opponent, int $techniqueNumber): void
    {
        $damage = $opponent->techniques[$techniqueNumber]['damage'];
        $this->hp = max(0, $this->hp - $damage);
    }

    // 互いに攻撃技を使う
    // F1 < F2 の時、プレイヤー2のhpがA1減る
    // F1 > F2 の時、プレイヤー1のhpがA2減る
    // F1 = F2 の時、何も起こらない
    public function mutualDamage(Player $opponent, int $myTechniqueNumber, int $yourTechniqueNumber): void
    {
        $F1 = $this->techniques[$myTechniqueNumber]['frame'];
        $F2 = $opponent->techniques[$yourTechniqueNumber]['frame'];

        // if ($F1 < $F2) {
        //     $opponent->hp = max(0, $opponent->hp - $this->techniques[$myTechniqueNumber]['damage']);
        // } elseif ($F1 > $F2) {
        //     $this->hp = max(0, $this->hp - $opponent->techniques[$yourTechniqueNumber]['damage']);
        // }

        if ($F1 < $F2) {
            // 相手が自分の技によってダメージを受ける
            $opponent->receiveDamage($this, $myTechniqueNumber);
        } elseif ($F1 > $F2) {
            // 自分が相手の技によってダメージを受ける
            $this->receiveDamage($opponent, $yourTechniqueNumber);
        }
    }

    // hp の判定
    public function judgeHp(): void
    {
        if ($this->hp === 0) {
            $this->isFinished = true;
            return;
        }
    }
}

[$N, $K] = explode(" ", trim(fgets(STDIN)));
$players = [];
for ($i = 1; $i <= $N; $i++) { 
    $line = explode(" ", trim(fgets(STDIN)));
    $players[$i] = new Player($line[0], $line[1], $line[2], $line[3], $line[4], $line[5], $line[6]);
}
// print_r($players);

for ($i = 1; $i <= $K ; $i++) { 
    [$P1, $T1, $P2, $T2] = array_map('intval', explode(" ", trim(fgets(STDIN))));

    // プレイヤーの指定。新しいプレイヤーを作る処理ではない(同じオブジェクトを扱う)
    /** @var Player $me */
    $me = $players[$P1];
    /** @var Player $opponent */
    $opponent = $players[$P2];

    // どちらかが退場していたら何も起こらない
    if ($me->getIsFinished() || $opponent->getIsFinished()) {
        continue;
    }

    $myBuf = $me->isBuf($T1);
    $yourBuf = $opponent->isBuf($T2);

    if ($myBuf && $yourBuf) {
        // 両者とも強化技
        $me->useBuf();
        $opponent->useBuf();
    } elseif ($myBuf) {
        // 自分は強化、相手は攻撃(自分はダメージを受ける)
        $me->useBuf();
        $me->receiveDamage($opponent, $T2);
    } elseif ($yourBuf) {
        // 自分は攻撃(相手はダメージを受ける)、相手は強化
        $opponent->useBuf();
        $opponent->receiveDamage($me, $T1);
    } else {
        // 両者とも攻撃技
        $me->mutualDamage($opponent, $T1, $T2);
    }

    // ダメージ処理の後に退場状態を更新
    $me->judgeHp();
    $opponent->judgeHp();
}

// 場に残っているプレイヤーを数える
$count = 0;
foreach ($players as $player) {
    if (!$player->getIsFinished()) {
        $count++;
    }
}
echo $count . "\n";
?>