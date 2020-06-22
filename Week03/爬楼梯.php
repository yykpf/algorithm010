<?php
// 爬楼梯 https://leetcode-cn.com/problems/climbing-stairs/
// class Solution {
//     /**
//      * @param Integer $n
//      * @return Integer
//      */
//     function climbStairs($n) {
//         $first = 1;
//         $second = 2;
//         if ($n == $first) return $first;
//         for ($i=3;$i<=$n;$i++) {
//             $third = $first+$second;
//             $first = $second;
//             $second= $third;
//         }
//         return $second;
//     }
// }

// function test($n)
// {
//     $first = 1;
//     $seced = 2;
//     if ($n == 0) return 0;
//     if ($n == 1) return $first;
//     if ($n == 2) return $seced;
//     $t     = 4;
//     for ($i=4; $i<=$n; $i++) {
//         $f = $t+$seced+$first;
//         $first = $seced;
//         $seced = $t;
//         $t = $f;
//     }
//     return $t;
// }

// function test($n)
// {
//     if ($n < 0) return 0;
//     if ($n == 0 || $n == 1) return 1;
//     if ($n == 2) return 2;
//     return test($n-1)+test($n-2)+test($n-3);
// }
echo test(5);