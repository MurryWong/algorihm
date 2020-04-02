<?php

$arr = [
    0,
    1,
    3,
    5,
    10
];

foreach ($arr as $case) {
    echo fibonacci2($case) . PHP_EOL;
}

// 递归
function fibonacci($n)
{
    if ($n <= 0) {
        return 0;
    }

    if ($n == 1) {
        return 1;
    }

    return fibonacci($n - 1) + fibonacci($n - 2);
}

// 迭代
function fibonacci2($n)
{
    if ($n <= 0) {
        return 0;
    }

    if ($n == 1) {
        return 1;
    }

    $one = 1;
    $two = 0;
    $next = 0;
    for ($i = 2; $i <= $n; $i++) {
        $next = $one + $two;    // fib($n-1) + fib($n-2)

        $two = $one;
        $one = $next;
    }

    return $next;
}
