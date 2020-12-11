<?php
// 659. 分割数组为连续子序列
// 给你一个按升序排序的整数数组 num（可能包含重复数字），请你将它们分割成一个或多个子序列，其中每个子序列都由连续整数组成且长度至少为 3 。

// 如果可以完成上述分割，则返回 true ；否则，返回 false 。

// 示例 1：

// 输入: [1,2,3,3,4,5]
// 输出: True
// 解释:
// 你可以分割出这样两个连续子序列 :
// 1, 2, 3
// 3, 4, 5

// 示例 2：

// 输入: [1,2,3,3,4,4,5,5]
// 输出: True
// 解释:
// 你可以分割出这样两个连续子序列 :
// 1, 2, 3, 4, 5
// 3, 4, 5

// 示例 3：

// 输入: [1,2,3,4,4,5]
// 输出: False

// 提示：

// 输入的数组长度范围为 [1, 10000]

class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    // function isPossible($nums) {
    //     $map = [];
    //     foreach ($nums as $x) {
    //         if (!isset($map[$x])) {
    //             $map[$x] = new \SplMinHeap();
    //         }
    //         if (isset($map[$x-1])) {
    //             $prevLength = $map[$x-1]->extract();
    //             if ($map[$x-1]->isEmpty()) {
    //                 unset($map[$x-1]);
    //             }
    //             $map[$x]->insert($prevLength+1);
    //         } else {
    //             $map[$x]->insert(1);
    //         }
    //     }
    //     foreach ($map as $key => $queue) {
    //         if ($queue->top() < 3) {
    //             return false;
    //         }
    //     }
    //     return true;
    // }
    function isPossible($nums) {
        $countMap = [];
        $endMap = [];
        foreach ($nums as $x) {
            $countMap[$x] = (isset($countMap[$x])?$countMap[$x]:0)+1;
        }
        foreach ($nums as $x) {
            $count = isset($countMap[$x])?$countMap[$x]:0;
            if ($count > 0) {
                $prevEndCount = isset($endMap[$x-1])?$endMap[$x-1]:0;
                if ($prevEndCount > 0) {
                    $countMap[$x] = $count-1;
                    $endMap[$x-1] = $prevEndCount-1;
                    $endMap[$x] = (isset($endMap[$x])?$endMap[$x]:0)+1;
                } else {
                    $count1 = isset($countMap[$x+1])?$countMap[$x+1]:0;
                    $count2 = isset($countMap[$x+2])?$countMap[$x+2]:0;
                    if ($count1 > 0 && $count2 > 0) {
                        $countMap[$x] = $count-1;
                        $countMap[$x+1] = $count1-1;
                        $countMap[$x+2] = $count2-1;
                        $endMap[$x+2] = (isset($endMap[$x+2])?$endMap[$x+2]:0)+1;
                    } else {
                        return false;
                    }
                }
            }
        }
        return true;
    }
}
$n = new Solution();
var_dump($n->isPossible([1,2,3,3,4,5]));