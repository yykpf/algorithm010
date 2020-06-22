<?php
class Solution {
    public $result = [];
    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permuteUnique($nums) {
        $visited = array_fill(0, count($nums), false);
        $this->_permute($nums,[],count($nums),$visited);
        return $this->result;
    }
    function _permute($nums,$ret,$n,$visited) {
        if (count($ret) == $n) {
            $this->result[] = $ret;
            return;
        }
        for($i=0;$i<$n;$i++) {
            if ($visited[$i]) continue; //已经遍历
            if ($i > 0 && $visited[$i-1] && $nums[$i] == $nums[$i-1]) continue; // 相等元素跳过
            $ret[] = $nums[$i];
            $visited[$i] = true;
            $this->_permute($nums,$ret,$n,$visited);
            array_pop($ret); // 回溯
            $visited[$i] = false;
        }
    }
}

$n = new Solution();
var_dump($n->permuteUnique([1,2,3]));