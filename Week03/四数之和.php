<?php
// 18. 四数之和
// 给定一个包含 n 个整数的数组 nums 和一个目标值 target，判断 nums 中是否存在四个元素 a，b，c 和 d ，使得 a + b + c + d 的值与 target 相等？找出所有满足条件且不重复的四元组。

// 注意：

// 答案中不可以包含重复的四元组。

// 示例：

// 给定数组 nums = [1, 0, -1, 0, -2, 2]，和 target = 0。

// 满足要求的四元组集合为：
// [
//   [-1,  0, 0, 1],
//   [-2, -1, 1, 2],
//   [-2,  0, 0, 2]
// ]
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[][]
     */
    function fourSum($nums, $target) {
        $count = count($nums);
        if ($count < 4) return [];
        $res = []; //结果数组
        sort($nums);
        for ($k=0; $k <= $count-4; $k++) {
            if ($k && $nums[$k] == $nums[$k-1]) continue; // 跳过重复项
            for ($k1=$k+1; $k1 <= $count-3; $k1++) {
                $i = $k1+1;
                $j = $count-1;
                if ($k1 > $k+1 && $nums[$k1] == $nums[$k1-1]) continue; // 跳过重复项
                while ($i < $j) {
                    $sum = $nums[$i]+$nums[$j]+$nums[$k]+$nums[$k1];
                    if ($target == $sum) {
                        $res[] = [$nums[$i],$nums[$j],$nums[$k],$nums[$k1]];
                        // 一下两个循环为跳出重复项
                        while ($i < $j && $nums[$i] == $nums[++$i]);
                        while ($i < $j && $nums[$j] == $nums[--$j]);
                    } elseif($target < $sum) {
                        $j--; // 右移
                    } else {
                        $i++;
                    }
                }
            }
        }
        return $res;
    }
}