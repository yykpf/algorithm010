<?php

class Solution {

    /**
     * @param Integer $m
     * @param Integer $n
     * @return Integer
     */
    function uniquePaths($m, $n) {
        $f = array_fill(0,$n,0);
        $f[0] = 1;
        for ($i=0; $i < $m; $i++) {
            for ($j=0; $j < $n; $j++) {
                if ($j-1 >= 0) {
                    $f[$j] += $f[$j-1];
                }
            }
        }
        return $f[$n-1];
    }
}

$n = new Solution();
echo $n->uniquePaths(3,2);