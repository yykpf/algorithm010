<?php
// 216. 组合总和 III
// 找出所有相加之和为 n 的 k 个数的组合。组合中只允许含有 1 - 9 的正整数，并且每种组合中不存在重复的数字。

// 说明：

// 所有数字都是正整数。
// 解集不能包含重复的组合。
// 示例 1:

// 输入: k = 3, n = 7
// 输出: [[1,2,4]]
// 示例 2:

// 输入: k = 3, n = 9
// 输出: [[1,2,6], [1,3,5], [2,3,4]]
class Solution {

    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    function combinationSum3($k, $n) {
        $ans = $combin = [];
        $candidates = [1,2,3,4,5,6,7,8,9];
        $this->DFS($candidates, 0, 9, $n, $combin, $ans,$k);
        return $ans;
    }
    // 回溯
    private function DFS($candidates, $begin, $len, $target, $combin, &$ans,$k) {
        // 终止条件
        if ($target == 0 && count($combin) == $k) {
            $ans[] = $combin;
            return;
        }
        // 处理当前层逻辑
        for ($i=$begin; $i < $len; $i++) {
            if ($target < $candidates[$i]) break; // 剪枝
            // 小剪枝：同一层相同数值的结点，从第 2 个开始，候选数更少，结果一定发生重复，因此跳过，用 continue
            if ($i > $begin && $candidates[$i] == $candidates[$i - 1]) continue;

            $combin[] = $candidates[$i];
            // 下探到下一层
            $this->DFS($candidates,$i+1,$len,$target-$candidates[$i],$combin,$ans,$k);
            array_pop($combin); // 清理当前层
        }
    }
}
$n = new Solution();
var_dump($n->combinationSum3(3,9));