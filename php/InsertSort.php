<?php

class InsertSort
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

        for ($i = 1; $i < $len; $i++) {
            $cur = $arr[$i];

            $j = $i - 1;
            while ($j >= 0 && $arr[$j] > $cur) {
                $arr[$j + 1] = $arr[$j];
                $j--;
            }

            $arr[$j + 1] = $cur;
        }

        return $arr;
    }
}
