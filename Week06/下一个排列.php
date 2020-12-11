<?php
// 31. 下一个排列
// 实现获取下一个排列的函数，算法需要将给定数字序列重新排列成字典序中下一个更大的排列。

// 如果不存在下一个更大的排列，则将数字重新排列成最小的排列（即升序排列）。

// 必须原地修改，只允许使用额外常数空间。

// 以下是一些例子，输入位于左侧列，其相应输出位于右侧列。
// 1,2,3 → 1,3,2
// 3,2,1 → 1,2,3
// 1,1,5 → 1,5,1

class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function nextPermutation(&$nums)
    {
        $i = count($nums)-2;
        // 第一遍找到右侧 符合条件的 i < i+1
        // 第一遍扫描找到的 i 右侧的数肯定都是降序排列的
        while ($i >= 0 && $nums[$i] >= $nums[$i+1]) {
            $i--;
        }
        if ($i >= 0) {
            // 查找右侧大于 i的最小数
            $j = count($nums)-1;
            while ($j >= 0 && $nums[$i] >= $nums[$j]) {
                $j--;
            }
            list($nums[$i],$nums[$j]) = [$nums[$j],$nums[$i]];
        }

        // 右侧从小到大排序
        $this->reverse($nums,$i+1);
    }

    public function reverse(&$nums,$start)
    {
        $left = $start;
        $right = count($nums)-1;
        while ($left < $right) {
            list($nums[$left],$nums[$right]) = [$nums[$right],$nums[$left]];
            $left++;
            $right--;
        }
    }
}
$n = new Solution();
$nums = [3,2,1];
$n->nextPermutation($nums);
var_dump($nums);