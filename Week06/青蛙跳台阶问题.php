<?php
// 剑指 Offer 10- II. 青蛙跳台阶问题
// 一只青蛙一次可以跳上1级台阶，也可以跳上2级台阶。求该青蛙跳上一个 n 级的台阶总共有多少种跳法。

// 答案需要取模 1e9+7（1000000007），如计算初始结果为：1000000008，请返回 1。

// 示例 1：

// 输入：n = 2
// 输出：2
// 示例 2：

// 输入：n = 7
// 输出：21
// 示例 3：

// 输入：n = 0
// 输出：1
// 提示：

// 0 <= n <= 100
class Solution {
    /**
     * @param Integer $n
     * @return Integer
     */
    function numWays($n) {
        if ($n <=1 ) return 1;
        $one = 1;
        $two = 2;
        for ($i=3; $i <= $n; $i++) {
            $three = ($one+$two)% 1000000007;
            $one = $two;
            $two = $three;
        }
        return $two;
    }
}

$n = new Solution();
echo $n->numWays(7);