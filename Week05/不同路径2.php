<?php

// 63. 不同路径 II
// 一个机器人位于一个 m x n 网格的左上角 （起始点在下图中标记为“Start” ）。
// 现在考虑网格中有障碍物。那么从左上角到右下角将会有多少条不同的路径？

// 网格中的障碍物和空位置分别用 1 和 0 来表示。

// 说明：m 和 n 的值均不超过 100。

// 示例 1:

// 输入:
// [
//   [0,0,0],
//   [0,1,0],
//   [0,0,0]
// ]
// 输出: 2
// 解释:
// 3x3 网格的正中间有一个障碍物。
// 从左上角到右下角一共有 2 条不同的路径：
// 1. 向右 -> 向右 -> 向下 -> 向下
// 2. 向下 -> 向下 -> 向右 -> 向右

class Solution {

    // public $original = [];
    // public $endX     = 0; // 结束X
    // public $endY     = 0; // 结束Y
    // public $level    = 0;
    // /**
    //  * @param Integer[][] $obstacleGrid
    //  * @return Integer
    //  */
    // function uniquePathsWithObstacles($obstacleGrid) {
    //     $this->original = $obstacleGrid;
    //     $this->endX = count($obstacleGrid)-1;
    //     $this->endY = count($obstacleGrid[0])-1;
    //     // 广度优先遍历
    //     $this->BFS(0,0);
    //     return $this->level;
    // }

    // function BFS($startX,$startY) {
    //     // 到达结束点
    //     if ($startX == $this->endX && $startY == $this->endY && 1 != $this->original[$startX][$startY]) {
    //         $this->level++;
    //         return;
    //     }
    //     // 超出边界
    //     if ($startX > $this->endX || $startY > $this->endY) {
    //         return;
    //     }
    //     if (0 == $this->original[$startX][$startY]) {
    //         // 向左
    //         $this->BFS($startX+1,$startY);

    //     }
    //     if (0 == $this->original[$startX][$startY]) {
    //         // 向下
    //         $this->BFS($startX,$startY+1);
    //     }
    // }

    // 动态规划
    function uniquePathsWithObstacles($obstacleGrid) {
        $row    = count($obstacleGrid); // 行
        $column = count($obstacleGrid[0]); // 列

        // 利用动态规划路径 从坐标 (0,0) 到坐标 (i,j) 的路径总数的值只取决于从坐标 (0,0) 到坐标 (i−1,j)    的路径总数和从坐标 (0,0) 到坐标 (i, j - 1)的路径总数
        $f = array_fill(0,$column,0);

        if ($obstacleGrid[0][0] == 0) $f[0] = 1;
        for ($i=0; $i < $row; $i++) {
            for ($j=0; $j < $column; $j++) {
                if ($obstacleGrid[$i][$j] == 1) {
                    $f[$j] = 0;
                    continue;
                }
                if ($j-1 >= 0 && $obstacleGrid[$i][$j-1] == 0) {
                    $f[$j] += $f[$j-1];
                }
            }
        }
        return $f[count($f)-1];
    }
}
$arr = [
  [0,0,0],
  [0,1,0],
  [0,0,0]
];
// $arr = [
//     [1]
// ];
$n = new Solution();
echo $n->uniquePathsWithObstacles($arr);