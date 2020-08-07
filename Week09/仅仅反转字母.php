<?php

// 917. 仅仅反转字母
// 给定一个字符串 S，返回 “反转后的” 字符串，其中不是字母的字符都保留在原地，而所有字母的位置发生反转。

// 示例 1：

// 输入："ab-cd"
// 输出："dc-ba"
// 示例 2：

// 输入："a-bC-dEf-ghIj"
// 输出："j-Ih-gfE-dCba"
// 示例 3：

// 输入："Test1ng-Leet=code-Q!"
// 输出："Qedo1ct-eeLg=ntse-T!"


// 提示：

// S.length <= 100
// 33 <= S[i].ASCIIcode <= 122
// S 中不包含 \ or "

class Solution {
    /**
     * @param String $S
     * @return String
     */
    function reverseOnlyLetters($S) {
        $right = strlen($S)-1;
        $left = 0;
        while ($left < $right) {
            if ((ord($S[$left]) < 65 || ord($S[$left]) > 90) && (ord($S[$left]) < 97 || ord($S[$left]) > 122)) {
                $left++;
                continue;
            }
            if ((ord($S[$right]) < 65 || ord($S[$right]) > 90) && (ord($S[$right]) < 97 || ord($S[$right]) > 122)) {
                $right--;
                continue;
            }
            list($S[$left++],$S[$right--]) = [$S[$right],$S[$left]];
        }
        return $S;
    }
}
$n = new Solution();
var_dump($n->reverseOnlyLetters("7_28]"));