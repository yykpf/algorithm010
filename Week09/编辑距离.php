<?php

// dp方程
// word1[i] == word2[j] 是相等字符 dp[i][j] = $dp[$i - 1][$j - 1]
// 不相等
// $dp[$i - 1][$j]+1 // 要不 word1减一个单词
// $dp[$i][$j-1]+1   // 要不 word2减一个单词
// $dp[$i - 1][$j-1]+1 // 要不相等同时减
class Solution {
  public function minDistance($word1, $word2) {
    $n = strlen($word1);
    $m = strlen($word2);

    // 有一个字符串为空串
    if ($n * $m == 0) return $n + $m;

    // DP 数组
    $D = array_fill(0, $n+1, array_fill(0, $m+1, 0));

    // 边界状态初始化
    for ($i = 0; $i < $n + 1; $i++) {
        $D[$i][0] = $i;
    }
    for ($j = 0; $j < $m + 1; $j++) {
        $D[0][$j] = $j;
    }
    // 计算所有 DP 值
    for ($i = 1; $i < $n + 1; $i++) {
        for ($j = 1; $j < $m + 1; $j++) {
            if ($word1[$i - 1] == $word2[$j - 1]) {
                $D[$i][$j] = $D[$i - 1][$j - 1];
            } else {
                $D[$i][$j] = min($D[$i - 1][$j - 1], min($D[$i - 1][$j], $D[$i][$j - 1]))+1;
            }
        }
    }
    return $D[$n][$m];
  }
}
$n = new Solution();
echo $n->minDistance("horse","ros");