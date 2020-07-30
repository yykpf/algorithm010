<?php

// 493. 翻转对
// 给定一个数组 nums ，如果 i < j 且 nums[i] > 2*nums[j] 我们就将 (i, j) 称作一个重要翻转对。

// 你需要返回给定数组中的重要翻转对的数量。

// 示例 1:

// 输入: [1,3,2,3,1]
// 输出: 2
// 示例 2:

// 输入: [2,4,3,5,1]
// 输出: 3
// 注意:

// 给定数组的长度不会超过50000。
// 输入数组中的所有数字都在32位整数的表示范围内。

/**
 * 1、暴力循环   O(n^2)
 * 2、merge sort O(nlogn)
 * 3、树状数组   O(nlogn)
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    public function reversePairs($nums) {
        if (empty($nums)) return 0;
        return $this->mergeSort($nums,0,count($nums)-1);
    }

    private function mergeSort(&$nums,$l,$r) {
        if ($l>=$r) return 0;
        $mid = ($r+$l)>>1;
        $count = $this->mergeSort($nums,$l,$mid)+$this->mergeSort($nums,$mid+1,$r);
        $i = $l;$t = $l;
        $cache = [];
        for ($j=$mid+1; $j <= $r; $j++) {
            while ($i <= $mid && $nums[$i] <= 2*$nums[$j]) $i++; // 不符合的数据的个数
            while ($t <= $mid && $nums[$t] < $nums[$j]) $cache[] = $nums[$t++]; // 左半部分小于当前的j的加入到有序数组中
            $cache[] = $nums[$j]; //右半部分依次加入有序数组
            $count += $mid-$i+1;
        }
        while ($t <= $mid) $cache[] = $nums[$t++];// 左数组还有较大的数
        //将$arrC内排序好的部分，写入到$arr内：
        for($k=0, $len=count($cache); $k<$len; $k++) {
            $nums[$l+$k] = $cache[$k];
        }
        return $count;
    }
}

$n = new Solution();
echo $n->reversePairs([1,3,2,3,1]);