<?php
// 39. 组合总和
// 给定一个无重复元素的数组 candidates 和一个目标数 target ，找出 candidates 中所有可以使数字和为 target 的组合。

// candidates 中的数字可以无限制重复被选取。

// 说明：

// 所有数字（包括 target）都是正整数。
// 解集不能包含重复的组合。
// 示例 1：

// 输入：candidates = [2,3,6,7], target = 7,
// 所求解集为：
// [
//   [7],
//   [2,2,3]
// ]
// 示例 2：

// 输入：candidates = [2,3,5], target = 8,
// 所求解集为：
// [
//   [2,2,2,2],
//   [2,3,3],
//   [3,5]
// ]


// 提示：

// 1 <= candidates.length <= 30
// 1 <= candidates[i] <= 200
// candidate 中的每个元素都是独一无二的。
// 1 <= target <= 500
// https://leetcode-cn.com/problems/combination-sum/solution/hui-su-suan-fa-jian-zhi-python-dai-ma-java-dai-m-2/
class Solution {

    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    function combinationSum($candidates, $target) {
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
            $combin[] = $candidates[$i];
            // 下探到下一层
            $this->DFS($candidates,$i,$len,$target-$candidates[$i],$combin,$ans);
            array_pop($combin); // 清理当前层
        }
    }
}

$n = new Solution();
var_dump($n->combinationSum([2,3,5],8));