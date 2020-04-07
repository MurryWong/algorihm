<?php

$arrs = [
    [],
    [3],
    [1, 3],
    [1, 2, 3, 5, 9]
];

$key = 3;
foreach ($arrs as $case) {
    echo fibonacci_search($case, $key) . PHP_EOL;
}

function fibonacci_search($arr, $key)
{
    $F = [0, 1, 1, 2, 3, 5, 8, 13,];    // 斐波那契数列可根据 元素长度 来进行生成

    $max_index = count($arr) - 1;
    $low = 1;
    $high = $max_index;

    $k = 0;
    while ($max_index > $F[$k] - 1) {
        $k++;
    }

    // 补位
    for ($i = $max_index; $i < $F[$k] - 1; $i++) {
        $arr[$i] = $arr[$high];
    }

    while ($low <= $high) {
        $mid = $low + $F[$k - 1] - 1;
        if ($key < $arr[$mid]) {
            $high = $mid - 1;
            $k = $k - 1;
        } elseif ($key > $arr[$mid]) {
            $low = $mid + 1;
            $k = $k - 2;
        } else {
            if ($mid <= $max_index) {
                return $mid;
            } else {
                return $max_index;
            }
        }
    }

    return $arr[0] == $key ? 0 : -1;    // 首位
}
