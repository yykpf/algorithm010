<?php
// 300. 最长上升子序列
// 给定一个无序的整数数组，找到其中最长上升子序列的长度。

// 示例:

// 输入: [10,9,2,5,3,7,101,18]
// 输出: 4
// 解释: 最长的上升子序列是 [2,3,7,101]，它的长度是 4。
// 说明:

// 可能会有多种最长上升子序列的组合，你只需要输出对应的长度即可。
// 你算法的时间复杂度应该为 O(n2) 。
// 进阶: 你能将算法的时间复杂度降低到 O(n log n) 吗?

//详解
// https://leetcode-cn.com/problems/longest-increasing-subsequence/solution/zui-chang-shang-sheng-zi-xu-lie-dong-tai-gui-hua-2/
// https://leetcode-cn.com/problems/longest-increasing-subsequence/solution/yi-bu-yi-bu-tui-dao-chu-guan-fang-zui-you-jie-fa-x/


class Solution {
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    // 贪心算法加二分查找
    // 主要就是dp方程 dp 插入的顺序是从小到大插入
    function lengthOfLIS($nums) {
        $len = 1;
        $n = count($nums);
        if ($n == 0) return 0;
        $d = array_fill(0,$n+1,0);
        $d[$len] = $nums[0];
        for ($i=1; $i < $n; $i++) {
            if ($nums[$i] > $d[$len]) {
                $d[++$len] = $nums[$i]; //如果大于直接插入
            } else {
                $l = 1;$r = $len;$pos = 0;
                while ($l <= $r) {
                    $mid = ($l+$r) >> 1;
                    if ($d[$mid] < $nums[$i]) {
                        $pos = $mid;
                        $l = $mid+1;
                    } else {
                        $r = $mid-1;
                    }
                }
                $d[$pos+1] = $nums[$i]; // 小于当前的数的值得后一个数需要替换掉
            }
        }
        return $len;
    }
}
$n = new Solution();
echo $n->lengthOfLIS([10,9,2,5,3,7,101,18]);