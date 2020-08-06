<?php
// 709. 转换成小写字母
// 实现函数 ToLowerCase()，该函数接收一个字符串参数 str，并将该字符串中的大写字母转换成小写字母，之后返回新的字符串。



// 示例 1：

// 输入: "Hello"
// 输出: "hello"
// 示例 2：

// 输入: "here"
// 输出: "here"
// 示例 3：

// 输入: "LOVELY"
// 输出: "lovely"

class Solution {
    /**
     * @param String $str
     * @return String
     */
    function toLowerCase($str) {
        if (strlen($str) == 0) return $str;
        for ($i=0; $i < strlen($str); $i++) {
            $o = ord($str[$i]);
            if ($o >= 65 && $o <= 90) {
                $o+=32;
                $str[$i] = chr($o);
            }
        }
        return $str;
    }
}

$n = new Solution();
echo $n->toLowerCase("LOVELY");