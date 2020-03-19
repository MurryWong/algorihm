<?php

require './QuickSort.php';

$testCase = [
    [],
    [1],
    [2,1],
    [1,2,3,4,5],
    [2,3,4,5,1],
];


$sort = new QuickSort();
foreach($testCase as $case) {
    echo implode(', ', $sort->sort($case)).PHP_EOL;
}
