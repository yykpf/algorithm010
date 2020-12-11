<?php

// 面试题 08.07. 无重复字符串的排列组合
// 无重复字符串的排列组合。编写一种方法，计算某字符串的所有排列组合，字符串每个字符均不相同。

// 示例1:

//  输入：S = "qwe"
//  输出：["qwe", "qew", "wqe", "weq", "ewq", "eqw"]
// 示例2:

//  输入：S = "ab"
//  输出：["ab", "ba"]
// 提示:

// 字符都是英文字母。
// 字符串长度在[1, 9]之间。
// 通过次数12,357提交次数15,

class Solution {

    /**
     * @param String $S
     * @return String[]
     */
    public function permutation($s)
    {
        // 字符串转换为数组
        // $a = str_split($s);
        $a = explode(',', $s);
        $ret = [];
        // 调用perm函数
        $this->perm($a, 0,count($a) - 1,$ret);
        return $ret;
    }
    function perm(&$ar, $k, $m,&$ret){
        // 初始值是否等于最大值
        if ($k == $m) {
            // 将数组转换为字符串
            $ret[] = join(',', $ar);
        } else {
            // 循环调用函数
            for ($i = $k; $i <= $m; $i++) {
                // 调用swap函数
                $this->swap($ar[$k], $ar[$i]);
                // 递归调用自己
                $this->perm($ar, $k + 1, $m,$ret);
                // 再次调用swap函数
                $this->swap($ar[$k], $ar[$i]);
            }
        }
    }
    function swap(&$a, &$b){
        $c = $a;
        $a = $b;
        $b = $c;
    }
}

$n = new Solution();
var_dump($n->permutation('7,8,9,10,11'));