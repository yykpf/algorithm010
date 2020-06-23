<?php
// nginx加权轮询算法 http://dubbo.apache.org/zh-cn/docs/source_code_guide/loadbalance.html
class Test {
    public $weight = [];
    public $server = [];
    public $currentWright = []; //初始化为0
    public $num = 0;
    public function __construct($weights) {
        foreach ($weights as $server => $value) {
            $this->weight[] = $value; // 权重
            $this->server[] = $server; //服务器
            $this->num += $value; //权重总和
        }
        $this->currentWright = $this->weight;
    }

    // 获取服务器
    public function getServer() {
        // 循环查找最大值
        $maxK = 0;
        $maxV = 0;
        foreach ($this->currentWright as $key => $value) {
            if ($value > $maxV) {
                $maxV = $value;
                $maxK = $key;
            }
        }
        $server = $this->server[$maxK]; //找到服务器
        // 减去最大值
        $this->currentWright[$maxK] -= $this->num;
        foreach ($this->currentWright as $key => $value) {
            $this->currentWright[$key] += $this->weight[$key];
        }
        return $server;
    }
}
$serverW = ['A'=>1,'B'=>1,'C'=>1];

$t = new Test($serverW);
echo $t->getServer(),PHP_EOL;
echo $t->getServer(),PHP_EOL;
echo $t->getServer(),PHP_EOL;
echo $t->getServer(),PHP_EOL;
echo $t->getServer(),PHP_EOL;
echo $t->getServer(),PHP_EOL;