<?php

// 322. 零钱兑换
// 给定不同面额的硬币 coins 和一个总金额 amount。编写一个函数来计算可以凑成总金额所需的最少的硬币个数。如果没有任何一种硬币组合能组成总金额，返回 -1。



// 示例 1:

// 输入: coins = [1, 2, 5], amount = 11
// 输出: 3
// 解释: 11 = 5 + 5 + 1
// 示例 2:

// 输入: coins = [2], amount = 3
// 输出: -1


// 说明:
// 你可以认为每种硬币的数量是无限的。

class Solution {
    public $len = 0;
    public $coins = [];
    /**
     * @param Integer[] $coins
     * @param Integer $amount
     * @return Integer
     */
    function coinChange($coins, $amount) {
        if ($amount == 0) return 0;
        rsort($coins); // 贪心算法，最大金额开始
        $ans = 2 << 31;
        $this->len = count($coins);
        $this->coins = $coins;
        $this->DFS($amount,0,0,$ans);
        return $ans == 2 << 31 ? -1:$ans;
    }
    function DFS($amount,$c_index,$count,&$ans) {
        if ($amount == 0) {
            $ans = min($ans,$count);
            return;
        }
        if ($c_index == $this->len) return;
        for ($k=floor($amount/$this->coins[$c_index]); $k >= 0 && $k+$count < $ans; $k--) { // 可以减去的最大金额的数量
            $this->DFS(floor($amount-$k*$this->coins[$c_index]),$c_index+1,$count+$k,$ans); // 回溯检查可以减去的最少数量
        }
    }
}
$n = new Solution();
echo $n->coinChange([1,3,6],7);