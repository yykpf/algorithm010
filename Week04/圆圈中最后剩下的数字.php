<?php
// 剑指 Offer 62. 圆圈中最后剩下的数字
// 0,1,,n-1这n个数字排成一个圆圈，从数字0开始，每次从这个圆圈里删除第m个数字。求出这个圆圈里剩下的最后一个数字。

// 例如，0、1、2、3、4这5个数字组成一个圆圈，从数字0开始每次删除第3个数字，则删除的前4个数字依次是2、0、4、1，因此最后剩下的数字是3。

// 示例 1：

// 输入: n = 5, m = 3
// 输出: 3
// 示例 2：

// 输入: n = 10, m = 17
// 输出: 2


// 限制：

// 1 <= n <= 10^5
// 1 <= m <= 10^6
// https://leetcode-cn.com/problems/yuan-quan-zhong-zui-hou-sheng-xia-de-shu-zi-lcof/solution/javajie-jue-yue-se-fu-huan-wen-ti-gao-su-ni-wei-sh/
class Solution {
    /**
     * @param Integer $n
     * @param Integer $m
     * @return Integer
     */
    function lastRemaining($n, $m) {
        $last = 0;
        for ($i = 2; $i <= $n; ++$i) {
            $last = ($last + $m) % $i;
        }
        return $last; // 从 1 开始的 约瑟夫环就需要最后加1，因为现在是从0开始的
    }
}
