<?php

// 53. 最大子序和
// 给定一个整数数组 nums ，找到一个具有最大和的连续子数组（子数组最少包含一个元素），返回其最大和。

// 示例:

// 输入: [-2,1,-3,4,-1,2,1,-5,4],
// 输出: 6
// 解释: 连续子数组 [4,-1,2,1] 的和最大，为 6。
// 进阶:

// 如果你已经实现复杂度为 O(n) 的解法，尝试使用更为精妙的分治法求解。

// 1、暴力：n^2
// 2、DP:
//     a.分治(子问题)  max_sum(i) = max(max_sum(i-1),0)+a[i]
//     b.状态数组定义  f(i)
//     c.DP方程
// 最大子序和 = 当前元素自身最大 或者 包含之前后最大
class Solution {
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxSubArray($nums) {
        // 贪心算法
        $pre = 0; // 若当前指针所指元素之前的和小于0，则丢弃当前元素之前的数列
        $maxAns = $nums[0]; // 记录最大值
        foreach ($nums as $num) {
            $pre = max($pre+$num,$num);
            $maxAns = max($maxAns,$pre);
        }
        return $maxAns;
    }

    // function maxSubArray($nums) {
    //     // 动态规划
    //     // 若前一个元素大于0，则将其加到当前元素上
    //     for ($i=1; $i < count($nums); $i++) {
    //         if ($nums[$i-1] > 0) {
    //             $nums[$i] += $nums[$i-1];
    //         }
    //     }
    //     return max($nums);
    // }
}

$n = new Solution();
var_dump($n->maxSubArray([-2,1,-3,4,-1,2,1,-5,4]));

