<?php
class Point
{
    public string $letter;
    public array $roads;

    public function __construct(string $letter, int $road1, int $road2)
    {
        $this->letter = $letter;
        // 1か2を受け取り、次の地点を示す
        $this->roads = [
            1 => $road1,
            2 => $road2,
        ];
    }
}

[$N, $K, $S] = array_map('intval', explode(" ", trim(fgets(STDIN))));

// 地点番号をキーにして、各地点のオブジェクトを保存する
$points = [];

for ($i = 1; $i <= $N; $i++) { 
    [$letter, $road1, $road2] = explode(" ", trim(fgets(STDIN)));
    /**
     * 入力の p 2 4 から作られるオブジェクトは
     * $points[1]->letter   "p"
     * $points[1]->roads[1]  1つ目の行き先:地点2
     * $points[1]->roads[2]  2つ目の行き先:地点4
     */
    $points[$i] = new Point($letter, $road1, $road2);
}

// スタート地点の文字を記録する
$current = $S;
$spell = $points[$current]->letter;

// 指示を1つずつ読み込み、移動先の文字を追加する
for ($i = 0; $i < $K; $i++) { 
    $direction = (int) trim(fgets(STDIN));

    // $current が 1、$direction が 1 なら、地点1の1つめの道の行き先である 2 を取り出し、現在地を地点2に更新
    $current = $points[$current]->roads[$direction];
    $spell .= $points[$current]->letter;
}
echo $spell . "\n";