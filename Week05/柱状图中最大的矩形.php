<?php

// 84. 柱状图中最大的矩形
// 给定 n 个非负整数，用来表示柱状图中各个柱子的高度。每个柱子彼此相邻，且宽度为 1 。

// 求在该柱状图中，能够勾勒出来的矩形的最大面积。


// 以上是柱状图的示例，其中每个柱子的宽度为 1，给定的高度为 [2,1,5,6,2,3]。



// 图中阴影部分为所能勾勒出的最大矩形面积，其面积为 10 个单位。


// 示例:

// 输入: [2,1,5,6,2,3]
// 输出: 10


class Solution {
    /**
     * @param Integer[] $heights
     * @return Integer
     */
    function largestRectangleArea($heights) {
        $len   = count($heights);
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

$n = new Solution();
echo $n->largestRectangleArea([2,1,2]);