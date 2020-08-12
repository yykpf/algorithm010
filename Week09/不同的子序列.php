<?php

// 115. 不同的子序列
// 给定一个字符串 S 和一个字符串 T，计算在 S 的子序列中 T 出现的个数。

// 一个字符串的一个子序列是指，通过删除一些（也可以不删除）字符且不干扰剩余字符相对位置所组成的新字符串。（例如，"ACE" 是 "ABCDE" 的一个子序列，而 "AEC" 不是）

// 题目数据保证答案符合 32 位带符号整数范围。

// 示例 1：

// 输入：S = "rabbbit", T = "rabbit"
// 输出：3
// 解释：

// 如下图所示, 有 3 种可以从 S 中得到 "rabbit" 的方案。
// (上箭头符号 ^ 表示选取的字母)

// rabbbit
// ^^^^ ^^
// rabbbit
// ^^ ^^^^
// rabbbit
// ^^^ ^^^
// 示例 2：

// 输入：S = "babgbag", T = "bag"
// 输出：5
// 解释：

// 如下图所示, 有 5 种可以从 S 中得到 "bag" 的方案。
// (上箭头符号 ^ 表示选取的字母)

// babgbag
// ^^ ^
// babgbag
// ^^    ^
// babgbag
// ^    ^^
// babgbag
//   ^  ^^
// babgbag
//     ^^^

class Solution {
    /**
     * @param String $s
     * @param String $t
     * @return Integer
     */
    function numDistinct($s, $t) {
        $n = strlen($s);
        $m = strlen($t);
        // 初始化
        $dp = array_fill(0,$n+1,array_fill(0,$m+1,0));
        for ($i=0; $i <= $n; $i++) {
            $dp[$i][0] = 1; // 默认第一个空字符串是所有字符的子序列
        }
        for ($i=1; $i < $n+1; $i++) { // s的前i个字符
            for ($j=1; $j < $m+1; $j++) {
                if ($s[$i-1]== $t[$j-1]) {
                    $dp[$i][$j] = $dp[$i-1][$j]+$dp[$i-1][$j-1];
                } else {
                    $dp[$i][$j] = $dp[$i-1][$j]; // 从i-1推算过来
                }
            }
        }
        return $dp[$n][$m];
    }
}
$n = new Solution();
echo $n->numDistinct("babgbag","b");