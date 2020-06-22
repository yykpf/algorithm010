<?php
// Pow(x, n) https://leetcode-cn.com/problems/powx-n/
// 通过二分法 递归实现 比如：2的10次方=》2的5次方*2的5次方
// 如果最后是奇数需要*当前积
class Solution {
    /**
     * @param Float $x
     * @param Integer $n
     * @return Float
     */
    function myPow($x, $n) {
        return $n >= 0? $this->recursionMyPow($x,$n):1/$this->recursionMyPow($x,-$n);
    }
    function recursionMyPow($x, $n) {
        if ($n == 0) return 1;
        $haft = $this->recursionMyPow($x,$n >> 1);
        return ($n%2 == 0)? $haft*$haft:$haft*$haft*$x;
    }
}
$n = new Solution();
echo $n->myPow(2.00000,-2);