<?php

$arrs = [
    [],
    [1, 3],
    [1, 2, 3, 5, 9]
];

$key = 3;
foreach ($arrs as $case) {
    echo binary_search($case, $key) . PHP_EOL;
}

echo "递归版" . PHP_EOL;
foreach ($arrs as $case) {
    echo binary_search2($case, 0, count($case) - 1, $key) . PHP_EOL;
}

// 非递归
function binary_search($arr, $key)
{
    $len = count($arr);

    $left = 0;
    $right = $len - 1;

    while ($left <= $right) {
        $mid = intval(($right - $left) / 2) + $left;    // 防止溢出

        if ($arr[$mid] == $key) {
            return $mid;
        } elseif ($arr[$mid] > $key) {
            $right = $mid - 1;
        } else {
            $left = $mid + 1;
        }
    }

    return -1;
}

// 递归
function binary_search2($arr, $left, $right, $key)
{
    if ($left > $right) {
        return -1;
    }

    $mid = intval(($right - $left) / 2) + $left;
    if ($arr[$mid] == $key) {
        return $mid;
    } elseif ($arr[$mid] > $key) {
        return binary_search2($arr, $left, $mid - 1, $key);
    }

    return binary_search2($arr, $mid + 1, $right, $key);
}
