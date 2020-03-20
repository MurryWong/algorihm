<?php

require './QuickSort.php';
require './BubbleSort.php';
require './SelectSort.php';
require './InsertSort.php';

$testCase = [
    [],
    [1],
    [2,1],
    [1,2,3,4,5],
    [2,3,4,5,1],
];


// $sort = new QuickSort();
// $sort = new BubbleSort();
// $sort = new SelectSort();
$sort = new InsertSort();
foreach($testCase as $case) {
    echo implode(', ', $sort->execute($case)).PHP_EOL;
}
