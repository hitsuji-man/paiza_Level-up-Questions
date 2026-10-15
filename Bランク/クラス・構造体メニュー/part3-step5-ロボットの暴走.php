<?php

class Robot
{
    // プロパティ: ロボットごとに異なる
    private int $x;
    private int $y;
    private int $level;

    // クラス定数: 全てのロボットで共通
    // レベルに応じた移動距離
    private const DISTANCES = [
        1 => 1,
        2 => 2,
        3 => 5,
        4 => 10,
    ];

    public function __construct(int $x, int $y, int $level)
    {
        $this->x = $x;
        $this->y = $y;
        $this->level = $level;
    }

    // 移動の関数(距離の移動 + レベルアップ)
    public function move(string $direction, array $toolboxes): void
    {
        $distance = self::DISTANCES[$this->level];

        switch ($direction) {
            case 'N':
                $this->y -= $distance;
                break;
            case 'S':
                $this->y += $distance;
                break;
            case 'E':
                $this->x += $distance;
                break;
            case 'W':
                $this->x -= $distance;
                break;
        }

        $key = $this->x . ',' . $this->y;

        if ($this->level < 4 && isset($toolboxes[$key])) {
            $this->level++;
        }
    }

    public function getState(): string
    {
        return $this->x . ' ' . $this->y . ' ' . $this->level;
    }
}

[$H, $W, $N, $K] = explode(" ", trim(fgets(STDIN)));

// 工具箱の座標を記録
$toolboxes = [];
for ($i = 0; $i < 10; $i++) { 
    [$x, $y] = array_map('intval', explode(" ", trim(fgets(STDIN))));
    $toolboxes["$x,$y"] = true;
}

// ロボットを生成(初期位置ではレベルを上げない)
$robots = [];
for ($i = 1; $i <= $N; $i++) { 
    [$x, $y, $level] = array_map('intval', explode(" ", trim(fgets(STDIN))));
    $robots[$i] = new Robot($x, $y, $level);
}

// 指定されたロボットを順番に移動
for ($i = 0; $i < $K; $i++) { 
    [$number, $direction] = explode(" ", trim(fgets(STDIN)));
    $robots[(int)$number]->move($direction, $toolboxes);
}

// 最終状態を出力
foreach ($robots as $robot) {
    echo $robot->getState() . "\n";
}