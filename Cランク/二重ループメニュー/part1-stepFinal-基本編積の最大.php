<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $input_line = trim(fgets(STDIN));
    $input_line = explode(" ", $input_line);
    $xA = $input_line[0];
    $xB = $input_line[1];
    $array_2d = [];
    
    for ($i = 0; $i < 2; $i++) {
        $line = trim(fgets(STDIN));
        $array_2d[$i] = array_map(
            "intval",
            explode(" ", $line)
        );
    }
    // print_r($array_2d);

    $arrayA = $array_2d[0];
    $arrayB = $array_2d[1];
    $max_product = -1000;
    for ($i = 0; $i < $xA; $i++) {
         for ($j = 0; $j < $xB; $j++) {
            $product = $arrayA[$i] * $arrayB[$j];
            // echo "A[$i] x B[$j] = ";
            // echo "$arrayA[$i] x $arrayB[$j] = $product\n";
            if ($product > $max_product) {
                $max_product = $product;
                // echo "max_product: $max_product\n";
            }
        }
    }
    echo "$max_product\n";
?>