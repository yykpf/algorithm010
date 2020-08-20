<?php

// 221. 最大正方形
// 在一个由 0 和 1 组成的二维矩阵内，找到只包含 1 的最大正方形，并返回其面积。

// 示例:

// 输入:

// 1 0 1 0 0
// 1 0 1 1 1
// 1 1 1 1 1
// 1 0 0 1 0

// 输出: 4

class Solution {
    /**
     * @param String[][] $matrix
     * @return Integer
     */
    function maximalSquare($matrix) {
        $n = count($matrix);
        if ($n == 0) return 0;

        $m = count($matrix[0]);
        if ($m == 0) return 0;

        $dp = array_flip(0,$n,array_flip(0,$m,0)); // 二维填充
        // 填充行
        for ($i=0; $i < $n; $i++) {
            $dp[$i][0] = $matrix[$i][0];
        }
        // 填充列
        for ($j=0; $j < $m; $j++) {
            $dp[0][$j] = $matrix[0][$j];
        }
        $result  = 0; // 默认最大面积
        for ($i=0; $i < $n; $i++) {
            for ($j=0; $j < $m; $j++) {
                if ($matrix[$i][$j] == 1) {
                    $dp[$i][$j] = min($dp[$i-1][$j],$dp[$i][$j-1],$dp[$i-1][$j-1])+1;
                    $result = max($dp[$i][$j],$result);
                }
            }
        }
        return $result*$result;
    }
}