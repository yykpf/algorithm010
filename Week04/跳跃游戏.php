<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function canJump($nums) {
        if (count($nums) <= 0) {
            return false;
        }
        $endReachable = count($nums)-1;
        for ($i=count($nums)-1; $i >= 0 ; $i--) {
            var_dump($endReachable);
            if ($nums[$i]+$i >= $endReachable) {
                // 4 +4 >= 4 4
                // 1 +3 >= 4 3
                // 1 +2 >= 3 2
                // 3 +1 >= 2 1
                // 2+0  >= 1
                $endReachable = $i;
            }
        }
        return $endReachable == 0;
    }
}

$n = new Solution();
echo $n->canJump([3,2,1,0,4]);