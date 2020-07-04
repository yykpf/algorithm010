<?php

// 74. 搜索二维矩阵
// 编写一个高效的算法来判断 m x n 矩阵中，是否存在一个目标值。该矩阵具有如下特性：

// 每行中的整数从左到右按升序排列。
// 每行的第一个整数大于前一行的最后一个整数。
// 示例 1:

// 输入:
// matrix = [
//   [1,   3,  5,  7],
//   [10, 11, 16, 20],
//   [23, 30, 34, 50]
// ]
// target = 3
// 输出: true
// 示例 2:

// 输入:
// matrix = [
//   [1,   3,  5,  7],
//   [10, 11, 16, 20],
//   [23, 30, 34, 50]
// ]
// target = 13
// 输出: false

class Solution {
    /**
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Boolean
     */
    function searchMatrix($matrix, $target) {
        // 可以看成是一个虚拟的有序的一维数组
        $m = count($matrix);
        $n = count($matrix[0]);
        $left = 0; $right = $m*$n-1;
        while ($left <= $right) {
            $mid = floor(($right+$left)/2); // 中间元素
            $num = $matrix[$mid/$n][$mid%$n];// 第几行第几列
            if ($num == $target) return true;
            if ($num > $target) {
                $right = $mid-1;
            } else {
                $left = $mid+1;
            }
        }
        return false;
    }

}

$matrix = [
  [1,   3,  5,  7],
  [10, 11, 16, 20],
  [23, 30, 34, 50]
];
$n = new Solution();
echo $n->searchMatrix($matrix,11);
