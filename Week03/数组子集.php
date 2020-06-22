<?php
// 数组的所有子集
// 1、迭代法 https://leetcode-cn.com/problems/subsets/
// class Solution {
//     /**
//      * @param Integer[] $nums
//      * @return Integer[][]
//      */
//     function subsets($nums) {
//         $count = count($nums);
//         $ret[] = []; //定义原始子集
//         if ($count == 0) return $ret;
//         foreach ($nums as  $v1) {
//             foreach ($ret as $v2) { // 循环已有数据，进行追加
//                 $tmp   = $v2;
//                 $tmp[] = $v1;
//                 $ret[] = $tmp;
//             }
//         }
//         return $ret;
//     }
// }

// 2、递归回溯
class Solution {
    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    public $ret = [];
    function subsets($nums) {
        $list = [];
        $this->subs($nums,$list,0);
        $this->ret[] = [];
        return $this->ret;
    }
    // 递归调用
    function subs($nums,$list,$start) {
        if (count($list) == count($nums)) return; //回溯出口
        for ($i=$start; $i < count($nums); $i++) {
            $list[] = $nums[$i];
            $this->ret[] = $list;
            $this->subs($nums,$list,++$start);
            array_pop($list);
        }
    }
}