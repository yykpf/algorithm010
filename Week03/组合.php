<?php
class Solution {
    public $result = [];
    /**
     * @param Integer $n
     * @param Integer $k
     * @return Integer[][]
     */
    function combine($n, $k) {
        if ($n <= 0 || $k <= 0 || $n < $k) return [];
        $this->_combine($n,$k,[],1);
        return $this->result;
    }
    // 回溯解法
    function _combine($n,$k,$list,$start) {
        if (count($list) == $k) {
            $this->result[] = $list;
            return;
        }
        for($i=$start;($n-$i+1) >= $k-count($list);$i++) {
            $list[] = $i;
            $this->_combine($n,$k,$list,$i+1);
            array_pop($list);
        }
    }
}
$n = new Solution();
var_dump($n->combine(5,2));