<?php

// 120. 三角形最小路径和
// 给定一个三角形，找出自顶向下的最小路径和。每一步只能移动到下一行中相邻的结点上。

// 相邻的结点 在这里指的是 下标 与 上一层结点下标 相同或者等于 上一层结点下标 + 1 的两个结点。
// 例如，给定三角形：

// [
//      [2],
//     [3,4],
//    [6,5,7],
//   [4,1,8,3]
// ]
// 自顶向下的最小路径和为 11（即，2 + 3 + 5 + 1 = 11）。

// 说明：

// 如果你可以只使用 O(n) 的额外空间（n 为三角形的总行数）来解决这个问题，那么你的算法会很加分。

class Solution {
    /**
     * @param Integer[][] $triangle
     * @return Integer
     */
    function minimumTotal($triangle) {
        // 动态规划
        $n = count($triangle);
        for ($i=$n-2; $i >= 0; $i--) { // 从倒数第二次开始循环
            for ($j=0; $j < count($triangle[$i]); $j++) { // 循环没有值
                $triangle[$i][$j] += min($triangle[$i+1][$j],$triangle[$i+1][$j+1]); // 根据规则选择小值相加
            }
        }
        return $triangle[0][0];
    }

}
$arr = [
     [2],
    [3,4],
   [6,5,7],
  [4,1,8,3]
];
$n = new Solution();
echo $n->minimumTotal($arr);