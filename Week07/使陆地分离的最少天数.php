<?php
// 1568. 使陆地分离的最少天数
// 给你一个由若干 0 和 1 组成的二维网格 grid ，其中 0 表示水，而 1 表示陆地。岛屿由水平方向或竖直方向上相邻的 1 （陆地）连接形成。

// 如果 恰好只有一座岛屿 ，则认为陆地是 连通的 ；否则，陆地就是 分离的 。

// 一天内，可以将任何单个陆地单元（1）更改为水单元（0）。

// 返回使陆地分离的最少天数。



// 示例 1：



// 输入：grid = [[0,1,1,0],[0,1,1,0],[0,0,0,0]]
// 输出：2
// 解释：至少需要 2 天才能得到分离的陆地。
// 将陆地 grid[1][1] 和 grid[0][2] 更改为水，得到两个分离的岛屿。
// 示例 2：

// 输入：grid = [[1,1]]
// 输出：2
// 解释：如果网格中都是水，也认为是分离的 ([[1,1]] -> [[0,0]])，0 岛屿。
// 示例 3：

// 输入：grid = [[1,0,1,0]]
// 输出：0
// 示例 4：

// 输入：grid = [[1,1,0,1,1],
//              [1,1,1,1,1],
//              [1,1,0,1,1],
//              [1,1,0,1,1]]
// 输出：1
// 示例 5：

// 输入：grid = [[1,1,0,1,1],
//              [1,1,1,1,1],
//              [1,1,0,1,1],
//              [1,1,1,1,1]]
// 输出：2


// 提示：

// 1 <= grid.length, grid[i].length <= 30
// grid[i][j] 为 0 或 1

class Solution {

    private $dx = [0,1,0,-1];
    private $dy = [1,0,-1,0];
    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function minDays($grid)
    {
        $n = count($grid);
        $m = count($grid[0]);
        if ($this->ct($grid,$n,$m) != 1) {
            return 0;
        }
        for ($i = 0; $i < $n; ++$i) {
            for ($j = 0; $j < $m; ++$j) {
                if ($grid[$i][$j]) {
                    $grid[$i][$j] = 0;
                    if ($this->ct($grid, $n, $m) != 1) {
                        // 更改一个陆地单元为水单元后陆地分离
                        return 1;
                    }
                    $grid[$i][$j] = 1;
                }
            }
        }

        return 2;
    }

    // 获取需要修改的数量
    private function ct($grid,$n,$m)
    {
        $cnt = 0;
        for($i = 0;$i < $n;$i++) {
            for($j=0;$j<$m;$j++) {
                if ($grid[$i][$j] == 1) {
                    $cnt++;
                    $this->dfs($i,$j,$grid,$n,$m);
                }
            }
        }
        // 还原
        for($i = 0;$i < $n;$i++) {
            for($j=0;$j<$m;$j++) {
                if ($grid[$i][$j] == 2) {
                    $grid[$i][$j] = 1;
                }
            }
        }

        return $cnt;
    }

    // 递归 验证是否可以全部连通
    private function dfs($x,$y,&$grid,$n,$m)
    {
        $grid[$x][$y] = 2;
        for ($i=0; $i < 4; $i++) {
            $tx = $this->dx[$i]+$x;
            $ty = $this->dy[$i]+$y;
            if ($tx < 0 || $tx >= $n || $ty < 0 || $ty >= $m || $grid[$tx][$ty] !=1) {
                continue;
            }
            $this->dfs($tx,$ty,$grid,$n,$m);
        }
    }
}