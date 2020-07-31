<?php
// 面试题 08.03. 魔术索引
// 魔术索引。 在数组A[0...n-1]中，有所谓的魔术索引，满足条件A[i] = i。给定一个有序整数数组，编写一种方法找出魔术索引，若有的话，在数组A中找出一个魔术索引，如果没有，则返回-1。若有多个魔术索引，返回索引值最小的一个。

// 示例1:

//  输入：nums = [0, 2, 3, 4, 5]
//  输出：0
//  说明: 0下标的元素为0
// 示例2:

//  输入：nums = [1, 1, 1]
//  输出：1
// 说明:

// nums长度在[1, 1000000]之间
// 此题为原书中的 Follow-up，即数组中可能包含重复元素的版本
class Solution {
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    // function findMagicIndex($nums) {
    //     return $this->help($nums,0,count($nums)-1);
    // }

    // private function help($nums,$l,$r) {
    //     if ($l > $r) return -1;
    //     $mid = ($l+$r)>>1;
    //     $res = $this->help($nums,$l,$mid-1);
    //     if ($res != -1) return $res;
    //     if ($nums[$mid] == $mid) return $mid;
    //     return $this->help($nums,$mid+1,$r);
    // }

    // 遍历加跳跃
    function findMagicIndex($nums) {
        for ($i=0; $i < count($nums); $i++) {
            if ($nums[$i] == $i) return $i;

            // 比如第 0项是100 ，那么索引为100以下的肯定就不符合
            if ($nums[$i] > $i+1) {
                $i = $nums[$i]-1;
            }
        }
        return -1;
    }
}
$n = new Solution();
echo $n->findMagicIndex([1, 2, 2]);