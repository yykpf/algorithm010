<?php
// 面试题60. n个骰子的点数
// 把n个骰子扔在地上，所有骰子朝上一面的点数之和为s。输入n，打印出s的所有可能的值出现的概率。

// 你需要用一个浮点数数组返回答案，其中第 i 个元素代表这 n 个骰子所能掷出的点数集合中第 i 小的那个的概率。

// 示例 1:

// 输入: 1
// 输出: [0.16667,0.16667,0.16667,0.16667,0.16667,0.16667]
// 示例 2:

// 输入: 2
// 输出: [0.02778,0.05556,0.08333,0.11111,0.13889,0.16667,0.13889,0.11111,0.08333,0.05556,0.02778]

// 限制：

// 1 <= n <= 11

class Solution {

    /**
     * @param Integer $n
     * @return Float[]
     */
    function dicesProbability($n) {
        $dp = array_fill(0, ($n*6+1), 0);
        for ($i=1; $i <= 6; $i++) {
            $dp[$i] = 1;
        }
        for ($i = 2; $i <= $n; $i ++) {
            for ($j = 6*$i; $j >= $i; $j--) {
                $dp[$j] = 0;
                for ($cur = 1; $cur <= 6; $cur ++) {
                    if ($j - $cur < $i-1) {
                        break;
                    }
                    $dp[$j] += $dp[$j-$cur];
                }
            }
        }
        $all = pow(6, $n);
        $ret = [];
        for ($i = $n; $i <= 6 * $n; $i ++) {
            $ret[] = $dp[$i] * 1.0 / $all;
        }
        return $ret;
    }
}
$n = new Solution();
var_dump($n->dicesProbability(2));