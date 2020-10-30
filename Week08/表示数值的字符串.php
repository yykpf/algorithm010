<?php
// 剑指 Offer 20. 表示数值的字符串
// 请实现一个函数用来判断字符串是否表示数值（包括整数和小数）。例如，字符串"+100"、"5e2"、"-123"、"3.1416"、"-1E-16"、"0123"都表示数值，但"12e"、"1a3.14"、"1.2.3"、"+-5"及"12e+5.4"都不是。

// https://leetcode-cn.com/problems/biao-shi-shu-zhi-de-zi-fu-chuan-lcof/solution/mian-shi-ti-20-biao-shi-shu-zhi-de-zi-fu-chuan-y-2/

class Solution {
    /**
     * @param String $s
     * @return Boolean
     */
    function isNumber($s) {
        // $s = trim($s," ");
        // return is_numeric($s);
        // 有限状态自动机
        $states = [
            [' '=> 0, 's'=>1,'d'=>2,'.'=>4],
            ['d'=> 2, '.'=> 4],
            ['d'=> 2, '.'=> 3, 'e'=> 5, ' '=> 8],
            ['d'=> 3, 'e'=> 5, ' '=> 8],
            ['d'=> 3],
            ['s'=> 6, 'd'=> 7],
            ['d'=> 7],
            ['d'=> 7, ' '=> 8],
            [' '=> 8],
        ];
        $p = 0;
        for ($i=0; $i < strlen($s); $i++) {
            $c = $s[$i];
            if($c >= '0' && $c <= '9') $t = 'd';
            else if($c == '+' || $c == '-') $t = 's';
            else if($c == 'e' || $c == 'E') $t = 'e';
            else if($c == '.' || $c == ' ') $t = $c;
            else $t = '?';
            if (!isset($states[$p][$t])) return false;
            $p = $states[$p][$t];
        }
        return $p == 2 || $p == 3 || $p == 7 || $p == 8;
    }
}
$n = new Solution();
echo$n->isNumber(" 0");
