<?php

// 14. 最长公共前缀
// 编写一个函数来查找字符串数组中的最长公共前缀。

// 如果不存在公共前缀，返回空字符串 ""。

// 示例 1:

// 输入: ["flower","flow","flight"]
// 输出: "fl"
// 示例 2:

// 输入: ["dog","racecar","car"]
// 输出: ""
// 解释: 输入不存在公共前缀。
// 说明:

// 所有输入只包含小写字母 a-z 。

class Solution {
    /**
     * @param String[] $strs
     * @return String
     */
    function longestCommonPrefix($strs) {
        $count = count($strs);
        if ($count <= 0) return '';
        $start = $strs[0];
        $len = strlen($start);
        $iu = 0;
        while ($i < $len) {
            for ($j=1; $j < $count; $j++) {
                if (!isset($strs[$j][$i]) || $start[$i] != $strs[$j][$i]) {
                    return substr($start, 0,$i);
                }
            }
            $i++;
        }
        return $start;
    }
}
echo 81*9;
