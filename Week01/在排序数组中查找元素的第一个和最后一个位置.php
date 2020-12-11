<?php
// 34. 在排序数组中查找元素的第一个和最后一个位置
// 给定一个按照升序排列的整数数组 nums，和一个目标值 target。找出给定目标值在数组中的开始位置和结束位置。

// 如果数组中不存在目标值 target，返回 [-1, -1]。

// 进阶：

// 你可以设计并实现时间复杂度为 O(log n) 的算法解决此问题吗？


// 示例 1：

// 输入：nums = [5,7,7,8,8,10], target = 8
// 输出：[3,4]
// 示例 2：

// 输入：nums = [5,7,7,8,8,10], target = 6
// 输出：[-1,-1]
// 示例 3：

// 输入：nums = [], target = 0
// 输出：[-1,-1]


// 提示：

// 0 <= nums.length <= 105
// -109 <= nums[i] <= 109
// nums 是一个非递减数组
// -109 <= target <= 109

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    public function searchRange($nums, $target) {
        $leftIdx = $this->binarySearch($nums, $target, true);
        $rightIdx = $this->binarySearch($nums, $target, false) - 1;
        if ($leftIdx <= $rightIdx && $rightIdx < count($nums)&& $nums[$leftIdx] == $target && $nums[$rightIdx] == $target) {
            return [$leftIdx, $rightIdx];
        }
        return [-1, -1];
    }
    private function binarySearch($nums, $target, $lower) {
        $left = 0; $right = count($nums) - 1; $ans = count($nums);
        while ($left <= $right) {
            $mid = ceil(($left + $right) / 2);
            if ($nums[$mid] > $target || ($lower && $nums[$mid] >= $target)) {
                $right = $mid - 1;
                $ans = $mid;
            } else {
                $left = $mid + 1;
            }
        }

        return $ans;
    }

}
$n = new Solution();
var_dump($n->searchRange([1,8,8,10,11],8));