<?php

/**
 * 题目二：不修改数组找出重复的数字
 * 在一个长度为 n+1 的数组里的所有数字都在 1~n 的范围内，所以数组中至少有一个数字是重复的。
 * 请找出数组中任意一个重复的数字，但不能修改输入的数字。
 */

// 三种可实现的方式：
// 1. 双重遍历对比，时间复杂度：O(n^2) [实现同 题目一]
// 2. 利用哈希表，时间复杂度：O(n)，空间复杂度：O(n) [实现同 题目一]
// 3. 二分查找，时间复杂度：O(nlogn)，空间复杂度：O(1)

$arr = [
    [0, 1],
    [0, 1, 1],
    [1, 2, 3, 4, 5, 5],
    [3, 1, 3, 4, 1, 3, 2, 3]
];

foreach ($arr as $case) {
    echo '当前case：' . implode(', ', $case) . PHP_EOL;
    echo method3($case) . PHP_EOL;

    echo PHP_EOL;
}

// 3. 二分查找思路
function method3($arr)
{
    $len = count($arr);

    $start = 1;
    $end = count($arr) - 1;

    while ($start <= $end) {
        $mid = (($end - $start) >> 1) + $start;
        $count = countRange($arr, $len, $start, $mid);

        if ($start == $end) {
            if ($count > 1) {
                return $start;
            }

            return -1;
        }

        if ($count > ($mid - $start + 1)) {
            $end = $mid;
        } else {
            $start = $mid + 1;
        }
    }

    return -1;
}

function countRange($arr, $len, $start, $end)
{
    $count = 0;
    for ($i = 0; $i < $len; $i++) {
        if ($arr[$i] >= $start && $arr[$i] <= $end) {
            $count++;
        }
    }

    return $count;
}
