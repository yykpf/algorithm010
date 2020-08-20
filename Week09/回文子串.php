<?php

// 647. 回文子串
// 给定一个字符串，你的任务是计算这个字符串中有多少个回文子串。

// 具有不同开始位置或结束位置的子串，即使是由相同的字符组成，也会被视作不同的子串。


// 示例 1：

// 输入："abc"
// 输出：3
// 解释：三个回文子串: "a", "b", "c"
// 示例 2：

// 输入："aaa"
// 输出：6
// 解释：6个回文子串: "a", "a", "a", "aa", "aa", "aaa"


// 提示：

// 输入的字符串长度不会超过 1000 。
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    // public function countSubstrings($s) {
    //     if(!$s) return 0;
    //     $n = strlen($s);
    //     $dp = array_fill(0,$n,array_fill(0,$n,false));
    //     $result = $n; // 最小数就等于字符串长度
    //     for($i = 0; $i<$n; $i++) $dp[$i][$i] = true; // 只有一个字母肯定是回文子串
    //     for($i = $n-1; $i>=0; $i--){ // 从右下角开始比较
    //         for($j = $i+1; $j<$n; $j++){
    //             if($s[$i] == $s[$j]) {
    //                 if($j-$i == 1){ // 最后两个字符
    //                     $dp[$i][$j] = true;
    //                 }else{
    //                     $dp[$i][$j] = $dp[$i+1][$j-1];
    //                 }
    //             }else{
    //                 $dp[$i][$j] = false;
    //             }
    //             if($dp[$i][$j]){
    //                 $result++;
    //             }
    //         }
    //     }
    //     return $result;
    // }

    // 暴力
    public function countSubstrings($s) {
        $n = strlen($s);
        $ans = 0;
        for ($i = 0; $i < 2 * $n - 1; $i++) {
            $l = intval($i / 2); // 对于字符串而言 而对于键值是bool, double, null的情况, 将会和以前保持一致, 不过会抛出一个Notice信息.
            $r = intval($i / 2 + $i % 2);
            while($l >= 0 && $r < $n && ($s[$l] == $s[$r])) { //PHP Notice:  String offset cast occured
                $l--;
                $r++;
                $ans++;
            }
        }
        return $ans;
    }

}
$n = new Solution();
echo $n->countSubstrings('aba');