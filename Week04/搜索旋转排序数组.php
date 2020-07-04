<?php

// 33. 搜索旋转排序数组
// 假设按照升序排序的数组在预先未知的某个点上进行了旋转。

// ( 例如，数组 [0,1,2,4,5,6,7] 可能变为 [4,5,6,7,0,1,2] )。

// 搜索一个给定的目标值，如果数组中存在这个目标值，则返回它的索引，否则返回 -1 。

// 你可以假设数组中不存在重复的元素。

// 你的算法时间复杂度必须是 O(log n) 级别。

// 示例 1:

// 输入: nums = [4,5,6,7,0,1,2], target = 0
// 输出: 4
// 示例 2:

// 输入: nums = [4,5,6,7,0,1,2], target = 3
// 输出: -1

// 要求时间复杂度是 O(log n) 那首先想到的就是二分法
class Solution {
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function search($nums, $target) {
        $count = count($nums);
        $lo = 0;
        $hi = $count-1;
        while ($lo <= $hi) {
            // 查找有序的部分
            // 首元素小于中间元素 代表 左半部分有序
            $mid = floor(($hi+$lo)/2);
            if ($nums[$mid] == $target) return $mid;
            if ($nums[0] <= $nums[$mid] && ($target >$nums[$mid] || $target < $nums[0])) { // 向后续约
                $lo = $mid+1;
            } elseif ($nums[0] > $nums[$mid] && $target > $nums[$mid] && $target < $nums[0]) {
                $lo = $mid+1;
            } else {
                $hi = $mid-1;
            }
        }
        return -1;
    }
}

$n = new Solution();
echo $n->search([2,1],1);