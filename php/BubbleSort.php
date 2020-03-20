<?php

class BubbleSort
{
    public function execute(array $arr)
    {
        return $this->sort($arr);
    }

    public function sort($arr)
    {
        $len = count($arr);

        if ($len <= 1 ) {
            return $arr;
        }

        for ($i = $len - 1; $i >= 0; $i--) {
            for ($j = 0; $j < $i; $j++) {
                if ($arr[$j] > $arr[$j + 1]) {
                    $this->swap($arr[$j], $arr[$j + 1]);
                }
            }
        }

        return $arr;
    }

    private function swap(&$x, &$y)
    {
        $tmp = $x;
        $x = $y;
        $y = $tmp;
    }
}
