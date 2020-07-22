<?php
// 130. 被围绕的区域
// 给定一个二维的矩阵，包含 'X' 和 'O'（字母 O）。

// 找到所有被 'X' 围绕的区域，并将这些区域里所有的 'O' 用 'X' 填充。

// 示例:

// X X X X
// X O O X
// X X O X
// X O X X
// 运行你的函数后，矩阵变为：

// X X X X
// X X X X
// X X X X
// X O X X
// 解释:

// 被围绕的区间不会存在于边界上，换句话说，任何边界上的 'O' 都不会被填充为 'X'。 任何不在边界上，或不与边界上的 'O' 相连的 'O' 最终都会被填充为 'X'。如果两个元素在水平或垂直方向相邻，则称它们是“相连”的。
class UnionFind {
    private  $count = 0;
    public   $parent;
    public function __construct($n) {
        $this->count = $n;
        for ($i = 0; $i < $n; $i++) {
            $this->parent[$i] = $i;
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
    public function isConnected($node1, $node2) {
        return $this->find($node1) == $this->find($node2);
    }

}
class Solution {

    private $cols;
    /**
     * @param String[][] $board
     * @return NULL
     */
    function solve(&$board) {
        if ($board == null || count($board) == 0)
            return;

        $rows = count($board);
        $cols = $this->cols = count($board[0]);

        // 用一个虚拟节点, 边界上的O 的父节点都是这个虚拟节点
        $uf = new UnionFind($rows * $cols + 1);
        $dummyNode = $rows * $cols;

        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $cols; $j++) {
                if ($board[$i][$j] == 'O') {
                    // 遇到O进行并查集操作合并
                    if ($i == 0 || $i == $rows - 1 || $j == 0 || $j == $cols - 1) {
                        // 边界上的O,把它和dummyNode 合并成一个连通区域.
                        $uf->union($this->node($i, $j), $dummyNode);
                    } else {
                        // 和上下左右合并成一个连通区域.
                        if ($i > 0 && $board[$i - 1][$j] == 'O')
                            $uf->union($this->node($i, $j), $this->node($i - 1, $j));
                        if ($i < $rows - 1 && $board[$i + 1][$j] == 'O')
                            $uf->union($this->node($i, $j), $this->node($i + 1, $j));
                        if ($j > 0 && $board[$i][$j - 1] == 'O')
                            $uf->union($this->node($i, $j), $this->node($i, $j - 1));
                        if ($j < $cols - 1 && $board[$i][$j + 1] == 'O')
                            $uf->union($this->node($i, $j), $this->node($i, $j + 1));
                    }
                }
            }
        }

        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $cols; $j++) {
                if ($uf->isConnected($this->node($i, $j), $dummyNode)) {
                    // 和dummyNode 在一个连通区域的,那么就是O；
                    $board[$i][$j] = 'O';
                } else {
                    $board[$i][$j] = 'X';
                }
            }
        }
        var_dump($uf->parent);
    }

    public function node($i, $j) {
        return $i * $this->cols + $j;
    }
}

$m = [
    ['X', 'X', 'X', 'X'],
    ['X', 'O', 'O','X'],
    ['X', 'X', 'O','X'],
    ['X', 'O', 'O','X'],
];
$n = new Solution();
$n->solve($m);
var_dump($m);