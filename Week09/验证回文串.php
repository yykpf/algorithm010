<?php

// 125. 验证回文串
// 给定一个字符串，验证它是否是回文串，只考虑字母和数字字符，可以忽略字母的大小写。

// 说明：本题中，我们将空字符串定义为有效的回文串。

// 示例 1:

// 输入: "A man, a plan, a canal: Panama"
// 输出: true
// 示例 2:

// 输入: "race a car"
// 输出: false

class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function isPalindrome($s) {
        $right = strlen($s)-1;
        $left = 0;
        while ($left < $right) {
            $lO = ord($s[$left]);
            $rO = ord($s[$right]);
            if (($lO < 48 || $lO > 57) && ($lO < 65 || $lO > 90) && ($lO < 97 || $lO > 122)) {
                $left++;
                continue;
            }
            if (($rO < 48 || $rO > 57) && ($rO < 65 || $rO > 90) && ($rO < 97 || $rO > 122)) {
                $right--;
                continue;
            }
            if (strtolower($s[$left]) != strtolower($s[$right])) return false;
            $left++;$right--;
        }
        return true;
    }
}
$n = new Solution();
// var_dump($n->isPalindrome("ra cr"));

$a = 'ba';
sort($a);
echo $a;
