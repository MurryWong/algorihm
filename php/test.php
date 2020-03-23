<?php

require './QuickSort.php';
require './BubbleSort.php';
require './SelectSort.php';
require './InsertSort.php';
require './MergeSort.php';
require './ShellSort.php';

$testCase = [
    [],
    [1],
    [2, 1],
    [3, 2, 1],
    [9, 2, 4, 7],
    [1, 2, 3, 4, 5],
    [2, 4, 3, 5, 1],
];


// $sort = new QuickSort();
// $sort = new BubbleSort();
// $sort = new SelectSort();
// $sort = new InsertSort();
// $sort = new MergeSort();
$sort = new ShellSort();
foreach ($testCase as $case) {
    echo implode(', ', $sort->execute($case)) . PHP_EOL;
}
