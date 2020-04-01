<?php

class ListNode
{
    public $value;
    public $next;

    public function __construct($value, $next = null)
    {
        $this->value = $value;
        $this->next = $next;
    }
}

$arr = [
    null,
    new ListNode(1),
    new ListNode(1, new ListNode(2)),
    new ListNode(1, new ListNode(2, new ListNode(3))),
];

foreach ($arr as $case) {
    // printListInReversedOrder($case);
    printListInReversedOrder2($case);
    echo PHP_EOL;
}

// 栈
function printListInReversedOrder($head)
{
    $nodes = [];    // 用数组模拟栈

    $curNode = $head;
    while (!empty($curNode)) {
        $nodes[] = $curNode; // 等价 array_push，当前这样因为没有调用函数的额外负担
        $curNode = $curNode->next;
    }

    while (count($nodes) > 0) {
        $node = array_pop($nodes);
        echo $node->value . PHP_EOL;
    }
}

// 递归
function printListInReversedOrder2($head)
{
    if (!empty($head)) {
        if (!empty($head->next)) {
            printListInReversedOrder2($head->next);
        }

        echo $head->value . PHP_EOL;
    }
}
