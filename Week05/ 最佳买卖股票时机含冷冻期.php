<?php

// 309. 最佳买卖股票时机含冷冻期
// 给定一个整数数组，其中第 i 个元素代表了第 i 天的股票价格 。​

// 设计一个算法计算出最大利润。在满足以下约束条件下，你可以尽可能地完成更多的交易（多次买卖一支股票）:

// 你不能同时参与多笔交易（你必须在再次购买前出售掉之前的股票）。
// 卖出股票后，你无法在第二天买入股票 (即冷冻期为 1 天)。
// 示例:

// 输入: [1,2,3,0,2]
// 输出: 3
// 解释: 对应的交易状态为: [买入, 卖出, 冷冻期, 买入, 卖出]
class Solution {
    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
        if (empty($prices)) return 0;
        $f0 = -$prices[0]; // 持有股票 收益为负
        $f1 = 0; // 卖出股票 处于冷冻期
        $f2 = 0; // 没有任何操作 并切不处于冷冻期
        for ($i=1; $i < count($prices); $i++) {  // 最后一天持有股票是无意义的
            $newf0 = max($f0,$f2-$prices[$i]);
            $newf1 = $f0+$prices[$i];
            $newf2 = max($f1,$f2);
            $f0 = $newf0;
            $f1 = $newf1;
            $f2 = $newf2;
        }
        return max($f1,$f2);
    }
}
$n = new Solution();
echo $n->maxProfit([1,2,3,0,2]);