<?php
class Solution {
    /**
     * @param Integer $x
     * @return Integer
     */
    // 牛顿迭代法
    // function mySqrt($x) {
    //     if ($x == 0) return 0;
    //     $r = $x;
    //     while ($r*$r > $x) {
    //         $r = floor($r + $x/$r)/2;
    //     }
    //     return (int)$r;
    // }

    // 二分法
    function mySqrt($x) {
        if ($x == 0) return 0;
        $left = 1; $right = $x;
        $mid = 1;
        while ($left <= $right) {
            $mid = $left+floor(($right-$left)/2);
            if ($mid * $mid > $x) {
                $right = $mid-1;
            } else {
                $left = $mid+1;
            }
        }
        return (int)$right;
    }
}
$n = new Solution();
echo $n->mySqrt(9);
