<?php

class SelectSort
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

        for($i = 0; $i < $len - 1; $i++)
        {
            $min = $i;
            for($j = $i+1; $j < $len; $j++)
            {
                if ($arr[$j] < $arr[$min]) {
                    $min = $j;
                }
            }

            $this->swap($arr[$i], $arr[$min]);
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