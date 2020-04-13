<?php

$arr = [
    [1, 2, 3, 4, 5, 1],
    [1, 2, 3, 4, 5, 6],
];
foreach ($arr as $case) {
    var_dump(containsDuplicate($case));
}

function containsDuplicate($nums): bool
{
    $map = [];

    foreach ($nums as $num) {
        if (!empty($map[$num])) {
            return true;
        }

        $map[$num] = 1;
    }

    return false;
}
