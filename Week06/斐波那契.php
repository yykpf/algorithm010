<?php
class Solution {

    /**
     * @param Integer $N
     * @return Integer
     */
    // 记忆化自顶向下
    function fib($N) {
        $a[0] = 0;
        $a[1] = 1;
        for ($i=2;$i<=$N;$i++) {
            $a[$i] = $a[$i-1]+$a[$i-2];
            // $a[$i] %= 1000000007;
        }
        return $a[$N];
    }

    // 自底向上进行迭代
    // function fib($N) {
    //     if ($N <= 1) return $N;
    //     if ($N == 2) return 1;

    //     $prev1 = 1;
    //     $prev2 = 1;
    //     for ($i = 3; $i <= $N; $i++) {
    //         $current = $prev1 + $prev2;
    //         $prev1 = $prev2;
    //         $prev2 = $current;
    //     }
    //     return $prev2;
    // }

}