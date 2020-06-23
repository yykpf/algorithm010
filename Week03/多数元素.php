<?php

// class Solution {

//     /**
//      * @param Integer[] $nums
//      * @return Integer
//      */
//     function majorityElement($nums)
//     {
//         // Stack 开心消消乐
//         $stack = [];
//         foreach ($nums as $num) {
//             if (empty($stack) || end($stack) == $num) {
//                 $stack[] = $num;
//             } else {
//                 array_pop($stack);
//             }
//         }
//         return end($stack);
//     }
// }

// 投票算法
// class Solution {
//     /**
//      * @param Integer[] $nums
//      * @return Integer
//      */
//     function majorityElement($nums) {
//         $candidate = 0;
//         $count     = 0;
//         foreach ($nums as $num) {
//             if ($count == 0)  $candidate = $num;
//             $count += ($num == $candidate)?1:-1;
//         }
//         return $candidate;
//     }
// }

// 分治
class Solution {
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function majorityElement($nums) {
        return $this->_majority($nums,0,count($nums)-1);
    }

    function _majority($nums,$lo,$hi) {
        if ($lo == $hi) return $nums[$lo];

        $mid = floor((($hi-$lo)/2)+$lo);
        $left = $this->_majority($nums,$lo,$mid);
        $right = $this->_majority($nums,$mid+1,$hi);
        if ($left == $right) return $left;

        $leftCount = $this->majorityCount($nums,$left,$lo,$hi);
        $rightCount = $this->majorityCount($nums,$right,$lo,$hi);

        return ($leftCount > $rightCount)?$left:$right;
    }
    function majorityCount($nums,$num,$lo,$hi) {
        $count = 0;
        for ($i=$lo; $i <= $hi; $i++) {
            if ($nums[$i] == $num) $count++;
        }
        return $count;
    }
}
$n =new Solution();
echo $n->majorityElement([1,2,1,2,1,2,1]);