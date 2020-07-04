<?php

// 367. 有效的完全平方数
// 给定一个正整数 num，编写一个函数，如果 num 是一个完全平方数，则返回 True，否则返回 False。

// 说明：不要使用任何内置的库函数，如  sqrt。

// 示例 1：

// 输入：16
// 输出：True
// 示例 2：

// 输入：14
// 输出：False

class Solution {

    /**
     * @param Integer $num
     * @return Boolean
     */
    // 牛顿迭代法
    // function isPerfectSquare($nums) {
    //     if ($nums == 0) return 0;
    //     $r = $nums;
    //     while ($r*$r > $nums) {
    //         $r = floor($r + $nums/$r)/2;
    //     }
    //     return $r*$r == $nums;
    // }

    // 二分法
    function isPerfectSquare($nums) {
        if ($nums < 2) return true;
        $left = 2; $right = $nums; // 左边界 // 右边界
        while ($left <= $right) {
            $mid = $left+floor(($right-$left)/2);
            if($mid*$mid > $nums) {
                $right = $mid-1;
            } else {
                $left = $mid+1;
            }
        }
        return $right*$right == $nums;
    }
}

$n = new Solution();
var_dump($n->isPerfectSquare(5));
// echo sqrt(0);