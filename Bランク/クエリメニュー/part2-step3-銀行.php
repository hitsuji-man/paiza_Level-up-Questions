<?php
class Bank
{
    private string $name;   // 会社名
    private int $PINcode;   // 口座の暗証番号
    private int $balance;   // その会社の口座残高

    public function __construct(string $name, int $PINcode, int $balance)
    {
        $this->name = $name;
        $this->PINcode = $PINcode;
        $this->balance = $balance;
    }

    // 口座の暗証番号が一致するか
    public function isPinCodeCorrect(int $PINCode): bool
    {
        return $this->PINcode == $PINCode;
    }

    // 金額を引き出し口座残高を計算する
    public function withdrawAndGetBalance(int $amount): int
    {
        return $this->balance -= $amount;
    }

    // 会社名と口座残高を出力する
    public function __tostring(): string
    {
        return $this->name . " " . $this->balance . "\n";
    }
}

[$N, $K] = array_map('intval', explode(" ", trim(fgets(STDIN))));
$bank = [];

// 会社名をキーにして連想配列にして口座を登録
for ($i = 1; $i <= $N; $i++) { 
    [$name, $PINcode, $balance] = explode(" ", trim(fgets(STDIN)));
    $bank[$name] = new Bank($name, $PINcode, $balance);
}

// 入力された会社名の口座を処理
for ($i = 1; $i <= $K; $i++) { 
    [$name, $PINcode, $amount] = explode(" ", trim(fgets(STDIN)));
    
    // Point: ループを数える$iと口座を指定する名前を分ける
    // $bankの数はループ回数より少ないため
    /** @var Bank $account */
    $account = $bank[$name];

    // 口座番号がクラスに保持されているものと一致したら、残高処理の計算処理に移る
    if ($account->isPinCodeCorrect($PINcode)) {
        $account->withdrawAndGetBalance((int) $amount);
    }
}

foreach ($bank as $info) {
    echo $info;
}