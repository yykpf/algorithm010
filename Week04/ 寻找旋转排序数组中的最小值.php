<?php

// 153. 寻找旋转排序数组中的最小值
// 假设按照升序排序的数组在预先未知的某个点上进行了旋转。

// ( 例如，数组 [0,1,2,4,5,6,7] 可能变为 [4,5,6,7,0,1,2] )。

// 请找出其中最小的元素。

// 你可以假设数组中不存在重复元素。

// 示例 1:

// 输入: [3,4,5,1,2]
// 输出: 1
// 示例 2:

// 输入: [4,5,6,7,0,1,2]
// 输出: 0

class Solution {
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findMin($nums) {
        $count = count($nums);
        if ($count == 1) return $nums[0];
        if ($nums[0] < $nums[$count-1]) { // 是否有序数组
            return $nums[0];
        }
        $left = 1; $right = $count-2;
        while ($left <= $right) {
            $mid = floor(($right+$left)/2);
            if ($nums[$mid-1] < $nums[$mid] && $nums[$mid+1] < $nums[$mid]) { // 找到有标识位的中间值 比如: 6,7,0
                return $nums[$mid+1];
            }
            if ($nums[$mid] > $nums[$mid-1] && $nums[$mid] < $nums[$mid+1] && $nums[$mid] > $nums[$count-1]) { // 找到需要的范围
                $left = $mid+1;
            }else {
                $right = $mid-1;
            }
        }
        return $nums[$left];
    }
}

$n = new Solution();
echo $n->findMin([9,0,2,7,8]);
// echo $n->findMin([4,5,6,7,0,1,2]);