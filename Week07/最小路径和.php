<?php
// 64. 最小路径和
// 给定一个包含非负整数的 m x n 网格，请找出一条从左上角到右下角的路径，使得路径上的数字总和为最小。

// 说明：每次只能向下或者向右移动一步。

// 示例:

// 输入:
// [
//   [1,3,1],
//   [1,5,1],
//   [4,2,1]
// ]
// 输出: 7
// 解释: 因为路径 1→3→1→1→1 的总和最小。

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function minPathSum($grid) {
        // 动态规划
        if (empty($grid)) return 0;
        $row = count($grid);
        $col = count($grid[0]);
        $dp = array_fill(0, $row, array_fill(0, $col, 0));
        $dp[0][0] = $grid[0][0];
        for ($i=1; $i < $row; $i++) {
            $dp[$i][0] = $dp[$i-1][0]+$grid[$i][0];
        }
        for ($j=1; $j < $col; $j++) {
            $dp[0][$j] = $dp[0][$j-1]+$grid[0][$j];
        }
        for ($i=1; $i < $row; $i++) {
            for ($j=1; $j < $col; $j++) {
                $dp[$i][$j] = min($dp[$i-1][$j],$dp[$i][$j-1])+$grid[$i][$j];
            }
        }
        return $dp[$row-1][$col-1];
    }
}

$m = [
  [1,3,1],
  [1,5,1],
  [4,2,1]
];
$n = new Solution();
echo $n->minPathSum($m);