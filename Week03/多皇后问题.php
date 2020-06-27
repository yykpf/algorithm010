<?php
class Solution {

    // 定义之前的皇后可以攻击到的范围
    public $cols = [];
    public $pie  = [];
    public $na   = [];

    public $result = []; //返回值
    public $output = []; //输出
    /**
     * @param Integer $n
     * @return String[][]
     */
    function solveNQueens($n) {
        $this->_solve(0,$n,'');
        // 调用输出格式函数
        $this->_output($n);
        return $this->output;
    }

    // 处理函数
    function _solve($row,$n,$s) {
        if ($row >= $n) {
            $this->result[] = $s;
            return;
        }
        // 逻辑
        for ($col=1; $col <= $n; $col++) {
            // 如果当前在上一个皇后的可攻击范围内，则进行下一次查找
            if (in_array($col,$this->cols) || in_array($row+$col,$this->pie) || in_array($row-$col,$this->na)) continue;
            $this->cols[] = $col;
            $this->pie[]  = $row+$col;
            $this->na[]   = $row-$col;

            // 递归调用
            $this->_solve($row+1,$n,$s.$col);

            // 回溯
            array_pop($this->cols);
            array_pop($this->pie);
            array_pop($this->na);
        }
    }

    // 输出格式化
    function _output($n) {
        foreach ($this->result as $value) {
            $arr = [];
            for ($i=0; $i < strlen($value); $i++) {
                $row = '';
                for ($j=1; $j <= $n; $j++) {
                    ($j == $value[$i])?$row .= 'Q':$row .= '.';
                }
                $arr[] = $row;
            }
            $this->output[] = $arr;
        }
    }

}
$n = new Solution();
var_dump($n->solveNQueens(4));