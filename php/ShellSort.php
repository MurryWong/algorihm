<?php

class ShellSort
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

        for ($gap = $len >> 1; $gap > 0; $gap >>= 1) {  // 调整步长
            // 指定步长的插入排序
            for ($i = $gap; $i < $len; $i++) {
                $cur = $arr[$i];
                for ($j = $i - $gap; $j >= 0 && $arr[$j] > $cur; $j -= $gap) {
                    $arr[$j + $gap] = $arr[$j];
                }

                $arr[$j + $gap] = $cur;
            }
        }

        return $arr;
    }
}
