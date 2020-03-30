<?php

$arr = [
    [
        [1, 2, 8, 9],
        [2, 4, 9, 12],
        [4, 7, 10, 13],
        [6, 8, 11, 15],
    ]
];

$key = 13;
foreach ($arr as $case) {
    var_dump(find($case, $key));
}

function find($arr, $key)
{
    $len = count($arr);
    if ($len == 0) {
        return false;
    }

    $row = 0;
    $col = count($arr[0]) - 1;

    while ($row < $len && $col >= 0) {
        if ($arr[$row][$col] == $key) {
            return [$row, $col];
        } elseif ($arr[$row][$col] > $key) {
            $col--;
        } else {
            $row++;
        }
    }

    return false;
}
