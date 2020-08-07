<?php
// 541. 反转字符串 II
// 给定一个字符串 s 和一个整数 k，你需要对从字符串开头算起的每隔 2k 个字符的前 k 个字符进行反转。

// 如果剩余字符少于 k 个，则将剩余字符全部反转。
// 如果剩余字符小于 2k 但大于或等于 k 个，则反转前 k 个字符，其余字符保持原样。


// 示例:

// 输入: s = "abcdefg", k = 2
// 输出: "bacdfeg"


// 提示：

// 该字符串只包含小写英文字母。
// 给定字符串的长度和 k 在 [1, 10000] 范围内。

class Solution {
    /**
     * @param String $s
     * @param Integer $k
     * @return String
     */
    function reverseStr($s, $k) {
        for ($start = 0; $start < strlen($s); $start += 2 * $k) {
            $i = $start;
            $j = min($start + $k - 1, strlen($s) - 1);
            while ($i < $j) {
                list($s[$i++],$s[$j--]) = [$s[$j],$s[$i]];
            }
        }
        return $s;
    }

}
$n = new Solution();
echo $n->reverseStr("abcdefgh",3);
