<?php
class Solution {
    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
        // 如果第二天比第一天的价格高那就可以在当天买入，明天卖出
        $total = 0;
        for ($i=0; $i < count($prices)-1; $i++) {
            if ($prices[$i+1] > $prices[$i]) $total+= $prices[$i+1]-$prices[$i];
        }
        return $total;
    }
}

$n = new Solution();
echo $n->maxProfit([7,1,5,3,6,4]);