<?php

class MergeSort
{
    public function execute(array $arr)
    {
        return $this->sort2($arr);
    }

    public function sort($arr)
    {
        $len = count($arr);
        if ($len <= 1) {
            return $arr;
        }

        $mid_len = intval($len / 2) + ($len & 1);
        $arr = array_chunk($arr, $mid_len);

        return $this->merge($this->sort($arr[0]), $this->sort($arr[1]));
    }

    private function merge($one, $two)
    {
        $one_len = count($one);
        $two_len = count($two);

        if ($one_len == 0) {
            return $two;
        }

        if ($two_len == 0) {
            return $one;
        }

        $tmp_arr = [];

        $i = 0;
        $j = 0;
        while ($i < $one_len && $j < $two_len) {
            if ($one[$i] <= $two[$j]) {
                $tmp_arr[] = $one[$i];
                $i++;
            } else {
                $tmp_arr[] = $two[$j];
                $j++;
            }
        }

        while ($i < $one_len) {
            $tmp_arr[] = $one[$i];
            $i++;
        }

        while ($j < $two_len) {
            $tmp_arr[] = $two[$j];
            $j++;
        }

        return $tmp_arr;
    }

    public function sort2($arr)
    {
        $len = count($arr);
        if ($len <= 1) {
            return $arr;
        }

        $half = ($len >> 1) + ($len & 1);
        $arr2d = array_chunk($arr, $half);

        $left = $this->sort2($arr2d[0]);
        $right = $this->sort2($arr2d[1]);

        $reg = [];
        while (count($left) && count($right))
            if ($left[0] < $right[0])
                $reg[] = array_shift($left);
            else
                $reg[] = array_shift($right);

        return array_merge($reg, $left, $right);
    }
}
