<?php

class QuickSort
{
    public function sort(array $arr)
    {
        // return $this->qucickSort($arr);

        return $this->qucickSort2($arr, 0, count($arr) - 1);
    }

    public function qucickSort($arr)
    {
        $len = count($arr);

        if ($len <= 1) {
            return $arr;
        }

        $pivot = $arr[0];
        $less = $greater = [];

        for ($i = 1; $i < $len; $i++) {
            if ($arr[$i] < $pivot) {
                $less[] = $arr[$i];
            } else {
                $greater[] = $arr[$i];
            }
        }

        return array_merge($this->qucickSort($less), [$pivot], $this->qucickSort($greater));
    }

    public function qucickSort2(&$arr, $left, $right)
    {
        if ($left < $right) {
            // $partitionIndex = $this->partition($arr, $left, $right);
            $partitionIndex = $this->partition2($arr, $left, $right);

            $this->qucickSort2($arr, $left, $partitionIndex - 1);
            $this->qucickSort2($arr, $partitionIndex + 1, $right);
        }

        return $arr;
    }

    private function partition(&$arr, $left, $right)
    {
        $pivot = $left;
        $index = $pivot + 1;

        for ($i = $index; $i <= $right; $i++) {
            if ($arr[$i] < $arr[$pivot]) {
                $this->swap($arr[$i], $arr[$index]);
                $index++;
            }
        }

        $this->swap($arr[$pivot], $arr[$index - 1]);
        return $index - 1;
    }

    private function partition2(&$arr, $left, $right)
    {
        $pivot = $arr[$left];
        while ($left < $right) {
            while ($left < $right && $arr[$right] > $pivot) {
                --$right;
            }

            $arr[$left] = $arr[$right];

            while ($left < $right && $arr[$left] <= $pivot) {
                ++$left;
            }
            $arr[$right] = $arr[$left];
        }

        $arr[$left] = $pivot;
        return $left;
    }

    private function swap(&$x, &$y)
    {
        $tmp = $x;
        $x = $y;
        $y = $tmp;
    }
}
