<?php

class HeapSort
{
    public function execute(array $arr)
    {
        return $this->sort($arr);
    }

    public function sort($arr)
    {
        $len = count($arr);

        if ($len <= 1) {
            return $arr;
        }

        for ($i = ceil($len >> 1) - 1; $i >= 0; $i--) {
            $this->maxHeapify($arr, $i, $len);
        }

        for ($i = $len - 1; $i > 0; $i--) {
            $this->swap($arr[0], $arr[$i]);
            $this->maxHeapify($arr, 0, $i);
        }

        return $arr;
    }

    private function maxHeapify(&$arr, $start, $end)
    {
        $parent = $start;
        $child = $parent * 2 + 1; // 左节点
        if ($child >= $end)
            return;

        // 找到两个子节点中 更小的那个 节点
        if ($child + 1 < $end && $arr[$child] < $arr[$child + 1])
            $child++;

        // 如果当前节点 小于等于 子节点，则交换并重新调整后续节点
        if ($arr[$parent] <= $arr[$child]) {
            $this->swap($arr[$parent], $arr[$child]);
            $this->maxHeapify($arr, $child, $end);
        }
    }

    private function swap(&$x, &$y)
    {
        $tmp = $x;
        $x = $y;
        $y = $tmp;
    }
}
