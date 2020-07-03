<?php
class Solution {
    /**
     * @param Integer[] $g
     * @param Integer[] $s
     * @return Integer
     */
    function findContentChildren($g, $s) {
        // 贪心算法 最优解
        // 对数据进行排序
        sort($g);
        sort($s);
        $g_l = count($g);
        $s_l = count($s);
        $res = 0;
        $i = 0;
        $j = 0;
        while ($i < $g_l && $j < $s_l) {
            if ($g[$i] <= $s[$j]) {
                $res++;
                $i++;
                $j++;
            } else {
                $j ++;
            }
        }
        return $res;
    }
}
$n = new Solution();
echo $n->findContentChildren([1,2,3], [1,2,3]);