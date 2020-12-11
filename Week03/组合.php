<?php
// 组合
class Solution {
    public $result = [];
    /**
     * @param Integer $n
     * @param Integer $k
     * @return Integer[][]
     */
    // function combine($n, $k) {
    //     if ($n <= 0 || $k <= 0 || $n < $k) return [];
    //     $this->_combine($n,$k,[],1);
    //     return $this->result;
    // }
    function combine($n, $k) {
        $len = count($n);
        if ($len <= 0 || $k <= 0 || $len < $k) return [];
        $this->_combine($n,$k,[],0);
        return $this->result;
    }
    // 回溯解法
    function _combine($n,$k,$list,$start) {
        if (count($list) == $k) {
            $this->result[] = $list;
            return;
        }
        $len = count($n)-1;
        for($i=$start;($len-$i+1) >= $k-count($list);$i++) {
            $list[] = $n[$i];
            $this->_combine($n,$k,$list,$i+1);
            array_pop($list);
        }
        // for($i=$start;($n-$i+1) >= $k-count($list);$i++) {
        //     $list[] = $i;
        //     $this->_combine($n,$k,$list,$i+1);
        //     array_pop($list);
        // }
    }
}
$n = new Solution();
// $a = $n->combine(11,5);
$a = $n->combine([2,4,6,8,10],4);
$b = [];
foreach ($a as $value) {
    $b[] = implode(',', $value);
}
// var_dump(count($a));
var_dump($b);
