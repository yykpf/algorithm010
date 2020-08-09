<?php

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
            $left = $D[$i - 1][$j] + 1;
            $down = $D[$i][$j - 1] + 1;
            $left_down = $D[$i - 1][$j - 1];
            if ($word1[$i - 1] != $word2[$j - 1]) $left_down += 1;
            $D[$i][$j] = min($left, min($down, $left_down));
        }
    }
    return $D[$n][$m];
  }
}
$n = new Solution();
echo $n->minDistance("horse","ros");