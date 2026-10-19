<?php
class Account
{
    private string $name;        // アカウント名
    private int $money = 0;         // superchatの金額
    private bool $isMembership = false; // membershipに加入しているか

    public function __construct(string $name, ?int $money = 0, ?bool $isMembership = false)
    {
        $this->name = $name;
        $this->money = $money;
        $this->isMembership = $isMembership;
    }

    // superchatの金額追加
    public function addSuperchat(int $money): void
    {
        $this->money += $money;        
    }

    // superchatの合計金額の取得
    public function getTotalSuperchat(): int
    {
        return $this->money;
    }

    // membershipに加入しているか
    public function isMembership(): bool
    {
        return $this->isMembership;
    }

    // membershipに加入する
    public function addMembership(): void
    {
        $this->isMembership = true;
    }

    // membershipに加入したアカウント名を取得する
    public function readMembershipAccountName(): ?string
    {
        if (!$this->isMembership) {
            return null;
        }

        return $this->name;
}
}

$N = (int) trim(fgets(STDIN));
$accounts = [];
for ($i = 1; $i <= $N; $i++) { 
    $event = explode(" ", trim(fgets(STDIN)));
    if ($event[1] === "give") {
        if (empty($accounts[$event[0]])) {
            $accounts[$event[0]] = new Account($event[0], $event[2], false);
        } else {
            $accounts[$event[0]]->addSuperchat($event[2]);
        }
    } elseif ($event[1] === "join") {
        if (empty($accounts[$event[0]])) {
            $accounts[$event[0]] = new Account($event[0], 0, true);
        } else {
            // superchat済みでアカウント作成済みの場合、金額は変更せずmembershipのフラグだけ立てたい
            $accounts[$event[0]]->addMembership();
        }
    }
}
// print_r($accounts);
/** @var Account $account */
// superchatの総額の高い順の配列を用意したい
$superchats = [];
foreach ($accounts as $name => $account) {
    // superchatの合計金額を値に格納
    $superchats[$name] = $account->getTotalSuperchat();
}
// 値が0の要素はmembershipの配列として管理、出力したいので取り除く
$superchats = array_filter(
    $superchats,
    fn($total) => $total != 0
);

// superchatの総額が同じである場合、同じ金額の中で辞書順の降順(z->a)でソートしたい
// 先に名前の辞書順の降順でソート
krsort($superchats, SORT_STRING);
// 次にsuperchatの金額の高い順にソート
arsort($superchats, SORT_NUMERIC);


// membershipに加入した人のアカウント名の辞書順の配列を用意したい
$memberships = [];
foreach ($accounts as $name => $account) {
    if ($account->isMembership()) {
        $memberships[$name] = $account->readMembershipAccountName();
    }
}
// アカウント名の辞書順にソート
ksort($memberships, SORT_STRING);

// アカウント名を出力
// superchat
foreach ($superchats as $name => $totalSuperchat) {
    echo $name . "\n";
}
// membership
foreach ($memberships as $name => $membershipAccountName) {
    echo $name . "\n";
}