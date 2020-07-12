<?php
// 深度优先
// class Solution {
//     /**
//      * @param Integer $n
//      * @return String[]
//      */
//     public $result = [];
//     function generateParenthesis($n) {
//         // 生成有效的括号必须满足
//         $this->_generate(0,0,$n,'');
//         return $this->result;
//     }
//     // 用来递归生成函数
//     function _generate($left,$right,$n,$s) {
//         // 1、递归终止条件
//         if ($left == $n && $right == $n) {
//             $this->result[] = $s;
//             return;
//         }
//         // 2、逻辑处理
//         $l = $s.'(';
//         $r = $s.')';
//         // 3、递归
//         // 左括号小于n，右括号小于左括号的数量
//         if ($left < $n) $this->_generate($left+1,$right,$n,$l);
//         if ($right < $left) $this->_generate($left,$right+1,$n,$r);
//     }
// }

// $n = new Solution();
// var_dump($n->generateParenthesis(3));

// 广度优先
class Solution {
    /**
     * @param Integer $n
     * @return String[]
     */
    function generateParenthesis($n) {
        // 生成有效的括号必须满足
        $node = ['s'=>"",'l'=>$n,'r'=>$n]; // 初始化
        $queue = new SplQueue();
        $queue->enqueue($node);
        $ans = [];
        while (!$queue->isEmpty()) {
            $curNode = $queue->dequeue();
            if ($curNode['l'] == 0 && $curNode['r'] == 0) $ans[]= $curNode['s'];
            if ($curNode['l'] > 0)
                $queue->enqueue(
                    [
                        's'=>$curNode['s'].'(',
                        'l'=>$curNode['l']-1,
                        'r'=>$curNode['r']
                    ]
                );
            if ($curNode['r'] > 0  && $curNode['l'] < $curNode['r'])
                $queue->enqueue(
                    [
                        's'=>$curNode['s'].')',
                        'l'=>$curNode['l'],
                        'r'=>$curNode['r']-1
                        ]
                );
        }
        return $ans;
    }
}

$n = new Solution();
var_dump($n->generateParenthesis(3));