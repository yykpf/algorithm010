<?php
// 剑指 Offer 47. 礼物的最大价值
// 在一个 m*n 的棋盘的每一格都放有一个礼物，每个礼物都有一定的价值（价值大于 0）。你可以从棋盘的左上角开始拿格子里的礼物，并每次向右或者向下移动一格、直到到达棋盘的右下角。给定一个棋盘及其上面的礼物的价值，请计算你最多能拿到多少价值的礼物？

// 示例 1:

// 输入:
// [
//   [1,3,1],
//   [1,5,1],
//   [4,2,1]
// ]
// 输出: 12
// 解释: 路径 1→3→5→2→1 可以拿到最多价值的礼物

// 提示：

// 0 < grid.length <= 200
// 0 < grid[0].length <= 200

class Solution
{

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function maxValue($grid)
    {
        $m = count($grid);
        if ($m == 0) {
            return 0;
        }
        $n = count($grid[0]);
        // 初始化第一行
        for ($i=1; $i < $n; $i++) {
            $grid[0][$i] += $grid[0][$i-1];
        }
        // 初始化第一列
        for ($j=1; $j < $m; $j++) {
            $grid[$j][0] += $grid[$j-1][0];
        }

        // 开始遍历规划
        for ($i=1; $i < $m; $i++) {
            for ($j=1; $j < $n; $j++) {
                $grid[$i][$j] += max($grid[$i][$j-1],$grid[$i-1][$j]);
            }
        }
        return $grid[$m-1][$n-1];
    }
}

$data = [
  [1,3,1],
  [1,5,1],
  [4,2,1]
];
$n = new Solution();
echo $n->maxValue($data);