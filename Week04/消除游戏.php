<?php
// 390. 消除游戏
// 给定一个从1 到 n 排序的整数列表。
// 首先，从左到右，从第一个数字开始，每隔一个数字进行删除，直到列表的末尾。
// 第二步，在剩下的数字中，从右到左，从倒数第一个数字开始，每隔一个数字进行删除，直到列表开头。
// 我们不断重复这两步，从左到右和从右到左交替进行，直到只剩下一个数字。
// 返回长度为 n 的列表中，最后剩下的数字。

// 示例：

// 输入:
// n = 9,
// 1 2 3 4 5 6 7 8 9
// 2 4 6 8
// 2 6
// 6

// 输出:
// 6
// https://leetcode-cn.com/problems/elimination-game/solution/mei-ri-suan-fa-day-85-tu-jie-suan-fa-yi-xing-dai-m/
//
// class Solution {

//     /**
//      * @param Integer $n
//      * @return Integer
//      */
//     function lastRemaining($n) {
//         // $n/2 是因为 奇偶数一样
//         return $n == 1 ? 1 : (2*(floor($n/2)-($this->lastRemaining(floor($n/2)))+1));
//     }
// }

// 比较好理解 https://leetcode-cn.com/problems/elimination-game/solution/zhao-gui-lu-by-yuruiyin/
class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function lastRemaining($n) {
        $count = $n;
        $first = 1;
        $diff = 1;
        $isFromLeft = true;
        while ($count > 1) {
            if ($isFromLeft) {
                $first += $diff;
            } else {
                if (($count & 1) == 1) {
                    $first += $diff;
                }
            }

            $count >>= 1;
            $diff <<= 1;
            $isFromLeft = !$isFromLeft;
        }

        return $first;
    }
}

$n = new Solution();
echo $n->lastRemaining(9);
