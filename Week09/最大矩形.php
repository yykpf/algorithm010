<?php

// 85. 最大矩形
// 给定一个仅包含 0 和 1 的二维二进制矩阵，找出只包含 1 的最大矩形，并返回其面积。

// 示例:

// 输入:
// [
//   ["1","0","1","0","0"],
//   ["1","0","1","1","1"],
//   ["1","1","1","1","1"],
//   ["1","0","0","1","0"]
// ]
// 输出: 6


// 参考解法二 https://leetcode-cn.com/problems/maximal-rectangle/solution/xiang-xi-tong-su-de-si-lu-fen-xi-duo-jie-fa-by-1-8/
class Solution {


    /**
     * @param String[][] $matrix
     * @return Integer
     */
    function maximalRectangle($matrix) {
        $r = count($matrix);
        $l = count($matrix[0]);
        if ($r == 0 || $l == 0) return 0;
        $heights = array_fill(0, count($l), 0);
        $maxArea = 0;
        for ($row = 0; $row < $r; $row++) {
            //遍历每一列，更新高度
            for ($col = 0; $col < $l; $col++) {
                if ($matrix[$row][$col] == '1') {
                    $heights[$col] += 1;
                } else {
                    $heights[$col] = 0;
                }
            }
            //调用上一题的解法，更新函数
            $maxArea = max($maxArea, $this->largestRectangleArea($heights,$l));
        }
        return $maxArea;
    }

    // 84.柱状图中最大的矩形
    private function largestRectangleArea($heights,$len) {
        $stack = [-1];
        $ans   = 0;
        for ($i=0; $i <= $len; $i++) {
            $cur = $i < $len ? $heights[$i]:0;
            while (!empty($stack) && end($stack) != -1 && $cur < $heights[end($stack)]) {
                $k = array_pop($stack);
                $width = $i-end($stack)-1;
                $ans = max($ans,($width)*$heights[$k]);
            }
            array_push($stack,$i);
        }
        return $ans;
    }
}