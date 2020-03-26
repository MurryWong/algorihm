<?php

/**
 * 题目一：找出数组中重复的数字
 * 在一个长度为 n 的数组里的所有数字都在 0 ~ n-1 的范围内。数组中某些数字是重复的，但不知道有几个数字重复了，也不知道每个数字重复了几次。
 * 请找出数组中任意一个重复的数字
 */

// 三种可实现的方式：
// 1. 排序后比较，时间复杂度：O(nlogn)
// 2. 利用哈希表，时间复杂度：O(n)，空间复杂度：O(n)
// 3. 利用数组下标，时间复杂度：O(n)，空间复杂度：O(n)

$arr = [
    [0, 1],
    [0, 1, 1],
    [1, 2, 3, 4, 5, 5],
    [3, 1, 3, 4, 1, 3, 2, 3]
];

foreach ($arr as $case) {
    echo '当前case：' . implode(', ', $case) . PHP_EOL;
    echo method1($case) . PHP_EOL;
    echo method2($case) . PHP_EOL;
    echo method3($case) . PHP_EOL;

    echo PHP_EOL;
}

// 1. 排序后比较
function method1($arr)
{
    sort($arr);

    $len = count($arr);
    for ($i = 1; $i < $len; $i++) {
        if ($arr[$i] == $arr[$i - 1]) {
            return $arr[$i];
        }
    }

    return -1;
}

// 2. 利用哈希表
function method2($arr)
{
    $map = [];

    foreach ($arr as $val) {
        if (array_key_exists($val, $map)) {
            return $val;
        }

        $map[$val] = 1;
    }

    return -1;
}

// 3. 利用数组下标
function method3($arr)
{
    $len = count($arr);

    $i = 0;
    while ($i < $len) {
        if ($arr[$i] == $i) {
            $i++;
            continue;   // 与下标相同访问下一个
        }

        if ($arr[$i] == $arr[$arr[$i]]) {
            return $arr[$i];
        }

        swap($arr[$i], $arr[$arr[$i]]);
    }

    return -1;
}

function swap(&$x, &$y)
{
    $tmp = $x;
    $x = $y;
    $y = $tmp;
}


