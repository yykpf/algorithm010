<?php
// 52. N皇后 II
// n 皇后问题研究的是如何将 n 个皇后放置在 n×n 的棋盘上，并且使皇后彼此之间不能相互攻击。

// 上图为 8 皇后问题的一种解法。

// 给定一个整数 n，返回 n 皇后不同的解决方案的数量。

// 示例:

// 输入: 4
// 输出: 2
// 解释: 4 皇后问题存在如下两个不同的解法。
// [
//  [".Q..",  // 解法 1
//   "...Q",
//   "Q...",
//   "..Q."],

//  ["..Q.",  // 解法 2
//   "Q...",
//   "...Q",
//   ".Q.."]
// ]


// 提示：

// 皇后，是国际象棋中的棋子，意味着国王的妻子。皇后只做一件事，那就是“吃子”。当她遇见可以吃的棋子时，就迅速冲上去吃掉棋子。当然，她横、竖、斜都可走一或七步，可进可退。（引用自 百度百科 - 皇后 ）

class Solution {

    private $count = 0; // 总数
    private $size = 0;
    /**
     * @param Integer $n
     * @return Integer
     */
    public function totalNQueens($n) {
        $this->size = (1 << $n)-1; // 总列数 标识：1未被占用
        $this->_solve(0,0,0);
        return $this->count;
    }

    private function _solve($row,$ld,$rd) {
        if ($row == $this->size) {
            $this->count++;
            return;
        }
        $pos = $this->size & (~($row|$ld|$rd)); // 找出当前未被占用(1)的位置
        while ($pos != 0) {  // 找到可以放置下一个皇后的列
            $p = $pos & (-$pos); // 在该列我们放置当前皇后
            $pos -= $p;
            $this->_solve($row|$p,($ld|$p)<<1,($rd|$p)>>1);
        }
    }
}

$n = new Solution();
echo $n->totalNQueens(4);
