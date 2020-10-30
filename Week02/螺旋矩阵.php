<?php
// 54. 螺旋矩阵
// 给定一个包含 m x n 个元素的矩阵（m 行, n 列），请按照顺时针螺旋顺序，返回矩阵中的所有元素。

// 示例 1:

// 输入:
// [
//  [ 1, 2, 3 ],
//  [ 4, 5, 6 ],
//  [ 7, 8, 9 ]
// ]
// 输出: [1,2,3,6,9,8,7,4,5]
// 示例 2:

// 输入:
// [
//   [1, 2, 3, 4],
//   [5, 6, 7, 8],
//   [9,10,11,12]
// ]
// 输出: [1,2,3,4,8,12,11,10,9,5,6,7]

class Solution {

    /**
     * @param Integer[][] $matrix
     * @return Integer[]
     */
    function spiralOrder($matrix) {
        $row = count($matrix);
        if ($row == 0) return $matrix;
        $column = count($matrix[0]);

        $left = 0;          // 左侧边界
        $right = $column-1; // 右侧边界
        $bottom = $row-1;   // 下层边界
        $top = 0;           // 上层边界

        $order = [];
        while($left <= $right && $top <= $bottom) {
            for ($column = $left;$column <= $right; $column++) {  // 行
                $order[] = $matrix[$top][$column];
            }
            for ($row = $top+1;$row <= $bottom;$row++) { // 列
                $order[] = $matrix[$row][$right];
            }
            if ($left < $right && $top < $bottom) {
                for ($column = $right -1;$column > $left; $column--) { // 倒行
                    $order[] = $matrix[$bottom][$column];
                }
                for ($row = $bottom;$row > $top;$row--) {  // 倒列
                    $order[] = $matrix[$row][$left];
                }
            }
            $left++;
            $right--;
            $top++;
            $bottom--;
        }
        return $order;
    }
}