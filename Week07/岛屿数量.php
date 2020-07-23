<?php
// 并查集
// 200. 岛屿数量
// 给你一个由 '1'（陆地）和 '0'（水）组成的的二维网格，请你计算网格中岛屿的数量。

// 岛屿总是被水包围，并且每座岛屿只能由水平方向或竖直方向上相邻的陆地连接形成。

// 此外，你可以假设该网格的四条边均被水包围。



// 示例 1:

// 输入:
// [
// ['1','1','1','1','0'],
// ['1','1','0','1','0'],
// ['1','1','0','0','0'],
// ['0','0','0','0','0']
// ]
// 输出: 1
// 示例 2:

// 输入:
// [
// ['1','1','0','0','0'],
// ['1','1','0','0','0'],
// ['0','0','1','0','0'],
// ['0','0','0','1','1']
// ]
// 输出: 3
// 解释: 每座岛屿只能由水平和/或竖直方向上相邻的陆地连接而成。
// 并查集
class UnionFind {
    private  $count = 0;
    public $parent;
    public function __construct($grid) {
        $line = count($grid);
        $col = count($grid[0]);
        for ($i = 0; $i < $line; $i++) {
            for ($j = 0; $j < $col; $j++) {
                if ($grid[$i][$j] == 1) {
                    // 二维转一维
                    $this->parent[$i*$col+$j] = $i*$col+$j;
                    $this->count++;
                }
            }
        }
    }
    public function find($p) {
        while ($p != $this->parent[$p]) {
            $this->parent[$p] = $this->parent[$this->parent[$p]];
            $p = $this->parent[$p];
        }
        return $p;
    }
    public function union($p, $q) {
        $rootP = $this->find($p);
        $rootQ = $this->find($q);
        if ($rootP == $rootQ) return;
        $this->parent[$rootP] = $rootQ;
        $this->count--;
    }
    public function getCount() {
        return $this->count;
    }
}

class Solution {

    /**
     * @param String[][] $grid
     * @return Integer
     */
    function numIslands($grid) {
        $line = count($grid);
        $col = count($grid[0]);
        $uf = new UnionFind($grid);

        for ($i = 0; $i < $line; $i++) {
            for ($j = 0; $j < $col; $j++) {
                if ($grid[$i][$j] == '1') {
                    //二维矩阵m*n,z在一维数组的位置是：（第几行×矩阵宽度）+ 在第几列
                    //前面已经执行过，不用往回查
                    if ($i + 1 < $line && $grid[$i+1][$j] == '1') {
                        $uf->union($i * $col + $j, ($i+1) * $col + $j);
                    }
                    if ($j + 1 < $col && $grid[$i][$j+1] == '1') {
                        $uf->union($i * $col + $j, $i * $col + $j + 1);
                    }
                }
            }
        }
        return $uf->getCount();
    }
}
// $m =[
//     ['1','1','0','0','0'],
//     ['1','1','0','0','0'],
//     ['0','0','1','0','0'],
//     ['0','0','0','1','1']
// ];

$m =[["1","0","1","1","0","1","1"]];
$n = new Solution();
echo $n->numIslands($m);