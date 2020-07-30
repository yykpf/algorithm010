<?php
class Solution {

    /**
     * @param Integer $n
     * @return Boolean
     */
    function isPowerOfTwo($n) {
        //二进制位有且仅有1个1
       return $n != 0 && (($n&($n-1))==0);
    }
}