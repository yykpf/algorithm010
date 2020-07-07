<?php

// 给定一个字符串，请你找出其中不含有重复字符的 最长子串 的长度。

// 示例 1:

// 输入: "abcabcbb"
// 输出: 3
// 解释: 因为无重复字符的最长子串是 "abc"，所以其长度为 3。
// 示例 2:

// 输入: "bbbbb"
// 输出: 1
// 解释: 因为无重复字符的最长子串是 "b"，所以其长度为 1。
// 示例 3:

// 输入: "pwwkew"
// 输出: 3
// 解释: 因为无重复字符的最长子串是 "wke"，所以其长度为 3。
//      请注意，你的答案必须是 子串 的长度，"pwke" 是一个子序列，不是子串。


class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s)
    {
        $max  = 0;
        $left = 0; // 指向重复数下标最大的元素
        $hash = [];
        $len = strlen($s);
        for ($i=0; $i < $len; $i++) {
            $si = $s[$i];
            if (isset($hash[$si])) {
                $left = max($left,$hash[$si]);
            }
            $hash[$si] = $i+1;
            $max = max($max,$i-$left+1);
        }
        return $max;
    }
}