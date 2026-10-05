<?php
class Yuusha
{
    private int $l;
    private int $h;
    private int $a;
    private int $d;
    private int $s;
    private int $c;
    private int $f;
    // private string $command;

    public function __construct(int $l, int $h, int $a, int $d, int $s, int $c, int $f)
    {
        $this->l = $l;  // レベル
        $this->h = $h;  // 体力
        $this->a = $a;  // 攻撃力
        $this->d = $d;  // 防御力
        $this->s = $s;  // 素早さ
        $this->c = $c;  // 賢さ
        $this->f = $f;  // 運
    }

    public function levelUp(int $h, int $a, int $d, int $s, int $c, int $f): void
    {
        $this->l += 1;
        $this->h += $h;
        $this->a += $a;
        $this->d += $d;
        $this->s += $s;
        $this->c += $c;
        $this->f += $f;
    }

    public function muscleTraining(int $h, int $a): void
    {
        $this->h += $h;
        $this->a += $a;
    }

    public function running(int $d, int $s): void
    {
        $this->d += $d;
        $this->s += $s;
    }

    public function study(int $c): void
    {
        $this->c += $c;
    }

    public function pray(int $f): void
    {
        $this->f += $f;
    }

    // public function getL(): int
    // {
    //     return $this->l;
    // }

    // public function getH(): int
    // {
    //     return $this->h;
    // }

    // public function getA(): int
    // {
    //     return $this->a;
    // }

    // public function getD(): int
    // {
    //     return $this->d;
    // }

    // public function getS(): int
    // {
    //     return $this->s;
    // }

    // public function getC(): int
    // {
    //     return $this->c;
    // }

    // public function getF(): int
    // {
    //     return $this->f;
    // }

    public function __toString(): string
    {
        return "{$this->l} {$this->h} {$this->a} {$this->d} {$this->s} {$this->c} {$this->f}\n";
    }
}

[$N, $K] = explode(" ", trim(fgets(STDIN)));
$yuusha = [];
for ($i = 1; $i <= $N; $i++) { 
    [$l, $h, $a, $d, $s, $c, $f] = explode(" ", trim(fgets(STDIN)));
    $yuusha[$i] = new Yuusha($l, $h, $a, $d, $s, $c, $f);
}

for ($i = 1; $i <= $K; $i++) { 
    $line = explode(" ", trim(fgets(STDIN)));
    if ($line[1] === "levelup") {
        $yuusha[$line[0]]->levelUp($line[2], $line[3], $line[4], $line[5], $line[6], $line[7]);
    } elseif ($line[1] === "muscle_training") {
        $yuusha[$line[0]]->muscleTraining($line[2], $line[3]);
    } elseif ($line[1] === "running") {
        $yuusha[$line[0]]->running($line[2], $line[3]);
    } elseif ($line[1] === "study") {
        $yuusha[$line[0]]->study($line[2]);
    } elseif ($line[1] === "pray") {
        $yuusha[$line[0]]->pray($line[2]);
    }
}

foreach ($yuusha as $status) {
    echo $status;
}