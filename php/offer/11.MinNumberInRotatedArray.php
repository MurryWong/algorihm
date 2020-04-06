<?php

$arr = [
    [1],
    [1, 1, 1, 1, 0, 1, 1],
    [1, 2, 3, 0, 0, 0, 0, 1, 1],
    [1, 2, 3, 4, 5],
    [3, 4, 5, 1, 2],
];

foreach ($arr as $case) {
    echo minInRotatedArray($case) . PHP_EOL;
}

function minInRotatedArray($arr)
{
    $len = count($arr);

    if ($len == 0) {
        return false;
    }

    $index1 = 0;
    $index2 = $len - 1;
    $mid = $index1; // 已经是有序的，会直接返回第一个元素
    while ($arr[$index1] >= $arr[$index2]) {
        if ($index2 - $index1 == 1) {
            return $arr[$index2]; // 相邻时，第二个下标指向最小值
        }

        $mid = intval(($index1 + $index2) / 2);

        // 当 左，中，右 相等时，只能进行顺序查找
        if ($arr[$index1] == $arr[$index2] && $arr[$index1] == $arr[$mid]) {
            return minInOrder($arr, $index1, $index2);
        }

        if ($arr[$mid] >= $arr[$index1]) {
            $index1 = $mid;
        } elseif ($arr[$mid] <= $arr[$index2]) {
            $index2 = $mid;
        }
    }

    return $arr[$mid];
}

function minInOrder($arr, $index1, $index2)
{
    $min = $arr[$index1];

    for ($i = $index1 + 1; $i < $index2; $i++) {
        if ($arr[$i] < $min) {
            $min = $arr[$i];
        }
    }

    return $min;
}
