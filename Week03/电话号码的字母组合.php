<?php
class Solution {
    /**
     * @param Integer $n
     * @return String[]
     */
    public $result    = [];
    public $hashMap   = [
        2 => 'abc',
        3 => 'def',
        4 => 'ghi',
        5 => 'jkl',
        6 => 'mno',
        7 => 'pqrs',
        8 => 'tuv',
        9 => 'wxyz',
    ];// 初始化数据
    function letterCombinations($digits) {
        if (empty($digits)) return $this->result;
        $this->_generate(0,$digits,'');
        return $this->result;
    }
    // 用来递归生成函数
    function _generate($i,$digits,$s) {
        // 1、递归终止条件
        if ($i == strlen($digits)) {
            $this->result[] = $s;
            return;
        }
        // 2、逻辑处理
        $letters = $this->hashMap[$digits[$i]];
        for ($j=0; $j < strlen($letters); $j++) {
        // 3、递归
            $this->_generate($i+1,$digits,$s.$letters[$j]);
        }
    }
}

$n = new Solution();
var_dump($n->letterCombinations('23'));