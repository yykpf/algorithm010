<?php
// 统计所有小于非负整数 n 的质数的数量。

// 示例 1：

// 输入：n = 10
// 输出：4
// 解释：小于 10 的质数一共有 4 个, 它们是 2, 3, 5, 7 。
// 示例 2：

// 输入：n = 0
// 输出：0
// 示例 3：

// 输入：n = 1
// 输出：0
//  

// 提示：

// 0 <= n <= 5 * 106

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function countPrimes($n) {
        $isPrime = array_fill(0, $n, 1);
        $ans = 0;
        for ($i=2; $i < $n; $i++) {
            if ($isPrime[$i]) {
                $ans += 1;
                for ($j=$i*$i; $j < $n; $j+=$i) {
                    $isPrime[$j] = 0;
                }
            }
        }
        return $ans;
    }
}
$n = new Solution();
echo $n->countPrimes(5);