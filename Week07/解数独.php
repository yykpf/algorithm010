<?php
// 37. 解数独
// 编写一个程序，通过已填充的空格来解决数独问题。

// 一个数独的解法需遵循如下规则：

// 数字 1-9 在每一行只能出现一次。
// 数字 1-9 在每一列只能出现一次。
// 数字 1-9 在每一个以粗实线分隔的 3x3 宫内只能出现一次。
// 空白格用 '.' 表示。
// 一个数独。
// 答案被标成红色。

// Note:

// 给定的数独序列只包含数字 1-9 和字符 '.' 。
// 你可以假设给定的数独只有唯一解。
// 给定数独永远是 9x9 形式的。

class Solution {

    /**
     * @param String[][] $board
     * @return NULL
     */
    public function solveSudoku(&$board) {
        $this->_solve($board);
    }
    private function _solve(&$board) {
        for ($i=0; $i < 9; $i++) {
            for ($j=0; $j < 9; $j++) {
                if ($board[$i][$j] == '.') {
                    for ($k=1; $k <= 9; $k++) {  // 试验 1-9那个数字可以使用
                        if ($this->isValidSudoku($board,$i,$j,$k)) { // 剪枝
                            $board[$i][$j] = (string)$k;
                            if ($this->_solve($board)) {
                                return true;
                            }
                            $board[$i][$j] = '.'; // 回溯
                        }
                    }
                    return false;
                }
            }
        }
        return true;
    }
    // 验证是否合法
    private function isValidSudoku($board,$row,$col,$k) {
        for ($i = 0; $i < 9; $i++) {
            if ($board[$i][$col] == $k) return false; // 当前列没有重复
            if ($board[$row][$i] == $k) return false; // 当前行没有重复

            // 当前 3x3 宫内
            $x = 3 * floor($row / 3) + floor($i / 3);
            $y = 3 * floor($col / 3) + floor($i % 3);
            if ($board[$x][$y] == $k) return false;
        }
        return true;
    }
}

$m = [
  ["5","3",".",".","7",".",".",".","."],
  ["6",".",".","1","9","5",".",".","."],
  [".","9","8",".",".",".",".","6","."],
  ["8",".",".",".","6",".",".",".","3"],
  ["4",".",".","8",".","3",".",".","1"],
  ["7",".",".",".","2",".",".",".","6"],
  [".","6",".",".",".",".","2","8","."],
  [".",".",".","4","1","9",".",".","5"],
  [".",".",".",".","8",".",".","7","9"]
];
$n = new Solution();
$n->solveSudoku($m);
var_dump($m);
