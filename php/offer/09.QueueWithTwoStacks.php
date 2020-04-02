<?php

class CQueue
{
    private $stack1 = [];
    private $stack2 = [];

    public function appendTail($element)
    {
        $this->stack1[] = $element;
    }

    public function deleteHead()
    {
        if (count($this->stack2) == 0) {
            while (count($this->stack1) > 0) {
                $this->stack2[] = array_pop($this->stack1);
            }
        }

        if (count($this->stack2) == 0) {
            throw new Exception('queue is empty');
        }

        return array_pop($this->stack2);
    }
}


$queue = new CQueue();

$queue->appendTail(1);
$queue->appendTail(2);

echo $queue->deleteHead() . PHP_EOL;

$queue->appendTail(3);
$queue->appendTail(4);

echo $queue->deleteHead() . PHP_EOL;
echo $queue->deleteHead() . PHP_EOL;
echo $queue->deleteHead() . PHP_EOL;
