<?php
// 767. 重构字符串
// 给定一个字符串S，检查是否能重新排布其中的字母，使得两相邻的字符不同。

// 若可行，输出任意可行的结果。若不可行，返回空字符串。

// 示例 1:

// 输入: S = "aab"
// 输出: "aba"
// 示例 2:

// 输入: S = "aaab"
// 输出: ""
// 注意:

// S 只包含小写字母并且长度在[1, 500]区间内。


class Solution {

    /**
     * @param String $S
     * @return String
     */
    function reorganizeString($S) {
        $total = strlen($S);

        $stat = [];
        for ($i=0; $i < $total; $i++) {
            if (!isset($stat[$S[$i]])) {
                $stat[$S[$i]] = 1;
            } else {
                $stat[$S[$i]]++;
            }
        }
        arsort($stat);
        reset($stat);
        $first = current($stat);
        if ($first > ceil($total / 2)) {
            return '';
        }

        $k = 0;
        foreach ($stat as $s => $num) {
            while ($num > 0) {
                $S[$k] = $s;
                $num--;
                $k += 2;
                if ($k >= $total) {
                    $k = 1;
                }
            }
        }

        return $S;
    }
}
$n = new Solution();
var_dump($n->reorganizeString("zrhmhyevkojpsegvwolkpystdnkyhcjrdvqtyhucxdcwm"));