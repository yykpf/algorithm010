<?php

// 1143. 最长公共子序列
// 给定两个字符串 text1 和 text2，返回这两个字符串的最长公共子序列的长度。

// 一个字符串的 子序列 是指这样一个新的字符串：它是由原字符串在不改变字符的相对顺序的情况下删除某些字符（也可以不删除任何字符）后组成的新字符串。
// 例如，"ace" 是 "abcde" 的子序列，但 "aec" 不是 "abcde" 的子序列。两个字符串的「公共子序列」是这两个字符串所共同拥有的子序列。

// 若这两个字符串没有公共子序列，则返回 0。
// 示例 1:

// 输入：text1 = "abcde", text2 = "ace"
// 输出：3
// 解释：最长公共子序列是 "ace"，它的长度为 3。
// 示例 2:

// 输入：text1 = "abc", text2 = "abc"
// 输出：3
// 解释：最长公共子序列是 "abc"，它的长度为 3。

// class Solution {
//     /**
//      * @param String $text1
//      * @param String $text2
//      * @return Integer
//      */
//     function longestCommonSubsequence($text1, $text2) {
//         // 动态规划 状态转移方程 可以画表(table 二维数组)来模拟
//         $m = strlen($text1);
//         $n = strlen($text2);
//         // 构建dp数组
//         $dp  = array_fill(0, $m+1, array_fill(0, $n+1, 0));
//         // 进行状态转移
//         for ($i=1; $i < $m+1; $i++) {
//             for ($j=1; $j < $n+1; $j++) {
//                 if ($text1[$i-1] == $text2[$j-1]) {
//                     $dp[$i][$j] = 1+$dp[$i-1][$j-1];
//                 } else {
//                     $dp[$i][$j] = max($dp[$i][$j-1],$dp[$i-1][$j]);
//                 }
//             }
//         }

//         return $dp[$i-1][$j-1];
//     }
// }
// $n = new Solution();
// echo $n->longestCommonSubsequence('abc','a');
$aa = [
    'aa' => 'c'
];

$bb = [
    'aa' => 'd'
];
var_dump(array_merge($aa,$bb));