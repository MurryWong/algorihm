<?php

$arr = [
    [1, 2, 3, 4, 5, 6],
    [1, 2, 2, 3, 4, 5, 5],
];

foreach ($arr as $case) {
    echo implode(',', $case) . PHP_EOL;
    echo removeDuplicates($case) . PHP_EOL;
    echo implode(',', $case) . PHP_EOL;

    echo PHP_EOL;
}

function removeDuplicates(&$nums)
{
    $len = count($nums);

    if ($len == 0) {
        return 0;
    }

    $j = 1;
    for ($i = 1; $i < $len; $i++) { // 从第二个元素开始才可能重复
        if ($nums[$i] != $nums[$i - 1]) {
            $nums[$j++] = $nums[$i];
        }
    }

    return $j;
}
