<?php

// 面试题 01.01. 判定字符是否唯一
// 实现一个算法，确定一个字符串 s 的所有字符是否全都不同。

// 示例 1：

// 输入: s = "leetcode"
// 输出: false
// 示例 2：

// 输入: s = "abc"
// 输出: true
// 限制：

// 0 <= len(s) <= 100
// 如果你不使用额外的数据结构，会很加分。

class Solution {

    /**
     * @param String $astr
     * @return Boolean
     */
    function isUnique($astr) {
        $mark = 0;
        for ($i=0; $i < strlen($astr); $i++) {
            $move_bit = ord($astr[$i])-ord('a');
            if (($mark & (1 << $move_bit)) != 0) return false;
            $mark |= (1 << $move_bit);
        }
        return true;
    }
}
$n = new Solution();
// echo $n->isUnique("letcode");
