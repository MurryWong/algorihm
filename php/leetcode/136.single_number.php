<?php

$arr = [
    [1],
    [1, 2, 1, 2, 3]
];

foreach ($arr as $case) {
    echo implode(',', $case) . PHP_EOL;
    echo singleNumber($case) . PHP_EOL;
    echo PHP_EOL;
}

function singleNumber($arr)
{
    $len = count($arr);
    $a = $arr[0];

    for ($i = 1; $i < $len; $i++) {
        $a ^= $arr[$i];
    }

    return $a;
}
