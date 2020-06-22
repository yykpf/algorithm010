<?php
class Solution {
    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permute($nums) {
        $ret = [];
        $this->_permute($nums,0,count($nums)-1,$ret);
        return $ret;
    }
    function _permute($nums,$k,$n,&$ret) {
        if ($k == $n) {
            $ret[] = $nums;
            return;
        }
        for($i=$k;$i<=$n;$i++) {
            list($nums[$k],$nums[$i]) = [$nums[$i],$nums[$k]];
            $this->_permute($nums,$k+1,$n,$ret);
            list($nums[$k],$nums[$i]) = [$nums[$i],$nums[$k]];
        }
    }
}

$n = new Solution();
var_dump($n->permute([1,2,3]));