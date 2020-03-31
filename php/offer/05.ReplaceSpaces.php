<?php

$arr = [
    'We are happy.',
    'Are you OK?',
];

foreach ($arr as $case) {
    echo implode('', str_split($case)) . PHP_EOL;
    echo implode('', (replace_spaces(str_split($case)))) . PHP_EOL;
}

function replace_spaces($arr)
{
    $len = count($arr);

    $space_count = 0;
    foreach ($arr as $char) {
        if ($char === ' ') {
            $space_count++;
        }
    }

    $new_index = $len - 1 + $space_count * 2; // 每个空格由 1 个长度，变成 3 个，所以 *2
    $original_index = $len - 1; // 遍历源内容

    // 填充至指定长度
    for ($i = $original_index + 1; $i <= $new_index; $i++) {
        $arr[$i] = '';
    }

    // 从后向前替换
    while ($original_index >= 0 && $new_index > $original_index) {
        if ($arr[$original_index] === ' ') {
            $arr[$new_index--] = '0';
            $arr[$new_index--] = '2';
            $arr[$new_index--] = '%';
        } else {
            $arr[$new_index--] = $arr[$original_index];
        }

        --$original_index;
    }

    return $arr;
}
