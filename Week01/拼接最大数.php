<?php

// 给定长度分别为 m 和 n 的两个数组，其元素由 0-9 构成，表示两个自然数各位上的数字。现在从这两个数组中选出 k (k <= m + n) 个数字拼接成一个新的数，要求从同一个数组中取出的数字保持其在原数组中的相对顺序。

// 求满足该条件的最大数。结果返回一个表示该最大数的长度为 k 的数组。

// 说明: 请尽可能地优化你算法的时间和空间复杂度。

// 示例 1:

// 输入:
// nums1 = [3, 4, 6, 5]
// nums2 = [9, 1, 2, 5, 8, 3]
// k = 5
// 输出:
// [9, 8, 6, 5, 3]
// 示例 2:

// 输入:
// nums1 = [6, 7]
// nums2 = [6, 0, 4]
// k = 5
// 输出:
// [6, 7, 6, 0, 4]
// 示例 3:

// 输入:
// nums1 = [3, 9]
// nums2 = [8, 9]
// k = 3
// 输出:
// [9, 8, 9]
class Solution {
    public function maxNumber($nums1, $nums2, $k) {
        $m = count($nums1);
        $n = count($nums2);
        $maxSubsequence = array_fill(0, $k, 0);
        $start = max(0, $k - $n);
        $end = min($k, $m);
        for ($i = $start; $i <= $end; $i++) {
            $subsequence1 = $this->maxSubsequence($nums1, $i);
            $subsequence2 = $this->maxSubsequence($nums2, $k - $i);
            $curMaxSubsequence = $this->merge($subsequence1, $subsequence2);
            if ($this->compare($curMaxSubsequence, 0, $maxSubsequence, 0) > 0) {
                $maxSubsequence = $curMaxSubsequence;
            }
        }
        return $maxSubsequence;
    }

    public function maxSubsequence($nums, $k) {
        $length = count($nums);
        $stack = array_fill(0, $k, 0);
        $top = -1;
        $remain = $length - $k;
        for ($i = 0; $i < $length; $i++) {
            $num = $nums[$i];
            while ($top >= 0 && $stack[$top] < $num && $remain > 0) {
                $top--;
                $remain--;
            }
            if ($top < $k - 1) {
                $stack[++$top] = $num;
            } else {
                $remain--;
            }
        }
        return $stack;
    }

    public function merge($subsequence1, $subsequence2) {
        $x = count($subsequence1);
        $y = count($subsequence2);
        if ($x == 0) {
            return $subsequence2;
        }
        if ($y == 0) {
            return $subsequence1;
        }
        $mergeLength = $x + $y;
        $merged = array_fill(0, $mergeLength, 0);
        $index1 = 0;
        $index2 = 0;
        for ($i = 0; $i < $mergeLength; $i++) {
            if ($this->compare($subsequence1, $index1, $subsequence2, $index2) > 0) {
                $merged[$i] = $subsequence1[$index1++];
            } else {
                $merged[$i] = $subsequence2[$index2++];
            }
        }
        return $merged;
    }

    public function compare($subsequence1,$index1,$subsequence2, $index2) {
        $x = count($subsequence1);
        $y = count($subsequence2);
        while ($index1 < $x && $index2 < $y) {
            $difference = $subsequence1[$index1] - $subsequence2[$index2];
            if ($difference != 0) {
                return $difference;
            }
            $index1++;
            $index2++;
        }
        return ($x - $index1) - ($y - $index2);
    }
}