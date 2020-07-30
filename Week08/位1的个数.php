<?php
class Solution {
    /**
     * @param Integer $n
     * @return Integer
     */
    function hammingWeight($n) {
        $count = 0;
        while ($n != 0) {
            $count++;
            $n = $n&($n-1);
        }
        return $count;
    }
}
