<?php
// 给定不同面额的硬币 coins 和一个总金额 amount。编写一个函数来计算可以凑成总金额所需的最少的硬币个数。如果没有任何一种硬币组合能组成总金额，返回 -1。

//  

// 示例 1:

// 输入: coins = [1, 2, 5], amount = 11
// 输出: 3
// 解释: 11 = 5 + 5 + 1
// 示例 2:

// 输入: coins = [2], amount = 3
// 输出: -1
//  

// 说明:
// 你可以认为每种硬币的数量是无限的。

// 来源：力扣（LeetCode）
// 链接：https://leetcode-cn.com/problems/coin-change
// 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。

// 1、暴力：递归
// 2、BFS
// 3、DP
//     a.分治(子问题)
//     b.状态数组定义  f(n) = min(f(n-k),for k in  [1,2,5])
//     c.DP方程
class Solution {
  public function coinChange($coins, $amount) {
    $max = $amount + 1;
    $dp = array_fill(0,$max,$max);
    $dp[0] = 0; // 走 0 步
    for ($i = 1; $i <= $amount; $i++) { // 把之前的步数遍历一次
        for ($j = 0; $j < count($coins); $j++) {
            if ($coins[$j] <= $i) { // i 表示要凑的面值
                $dp[$i] = min($dp[$i], $dp[$i - $coins[$j]] + 1);
            }
        }
    }
    return $dp[$amount] > $amount ? -1 : $dp[$amount];
  }
}

$n = new Solution();
// echo $n->coinChange([2, 5, 1],4);
echo time();