<?php
// 40. 组合总和 II
// 给定一个数组 candidates 和一个目标数 target ，找出 candidates 中所有可以使数字和为 target 的组合。

// candidates 中的每个数字在每个组合中只能使用一次。

// 说明：

// 所有数字（包括目标数）都是正整数。
// 解集不能包含重复的组合。
// 示例 1:

// 输入: candidates = [10,1,2,7,6,1,5], target = 8,
// 所求解集为:
// [
//   [1, 7],
//   [1, 2, 5],
//   [2, 6],
//   [1, 1, 6]
// ]
// 示例 2:

// 输入: candidates = [2,5,2,1,2], target = 5,
// 所求解集为:
// [
//   [1,2,2],
//   [5]
// ]

class Solution {

    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    function combinationSum2($candidates, $target) {
        $ans = $combin = [];
        $len = count($candidates);
        sort($candidates); // 剪枝使用
        $this->DFS($candidates, 0, $len, $target, $combin, $ans);
        return $ans;
    }
    // 回溯
    private function DFS($candidates, $begin, $len, $target, $combin, &$ans) {
        // 终止条件
        if ($target == 0) {
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
            $this->DFS($candidates,$i+1,$len,$target-$candidates[$i],$combin,$ans);
            array_pop($combin); // 清理当前层
        }
    }
}
$n = new Solution();
var_dump($n->combinationSum2([10,1,2,7,6,1,5],8));