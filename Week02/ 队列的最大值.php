<?php
// 剑指 Offer 59 - II. 队列的最大值
// 请定义一个队列并实现函数 max_value 得到队列里的最大值，要求函数max_value、push_back 和 pop_front 的均摊时间复杂度都是O(1)。

// 若队列为空，pop_front 和 max_value 需要返回 -1

// 示例 1：

// 输入:
// ["MaxQueue","push_back","push_back","max_value","pop_front","max_value"]
// [[],[1],[2],[],[],[]]
// 输出: [null,null,null,2,1,2]
// 示例 2：

// 输入:
// ["MaxQueue","pop_front","max_value"]
// [[],[],[]]
// 输出: [null,-1,-1]

// 限制：

// 1 <= push_back,pop_front,max_value的总操作数 <= 10000
// 1 <= value <= 10^5
class MaxQueue
{
    private $queue;
    private $maxQueue; // 最大队列
    /**
     */
    function __construct()
    {
        $this->queue = new SplQueue();
        $this->maxQueue = [];
    }

    /**
     * @return Integer
     */
    function max_value()
    {
        if ($this->queue->isEmpty()) {
            return -1;
        }

        return reset($this->maxQueue);
    }

    /**
     * @param Integer $value
     * @return NULL
     */
    function push_back($value)
    {
        $this->queue->enqueue($value);
        while (!empty($this->maxQueue) && $value > end($this->maxQueue)) {
            array_pop($this->maxQueue);
        }

        array_push($this->maxQueue, $value);
    }

    /**
     * @return Integer
     */
    function pop_front()
    {
        if ($this->queue->isEmpty()) {
            return -1;
        }

        $result = $this->queue->dequeue();
        if (reset($this->maxQueue) == $result) {
            array_shift($this->maxQueue);
        }
        return $result;
    }
}

/**
 * Your MaxQueue object will be instantiated and called as such:
 * $obj = MaxQueue();
 * $ret_1 = $obj->max_value();
 * $obj->push_back($value);
 * $ret_3 = $obj->pop_front();
 */