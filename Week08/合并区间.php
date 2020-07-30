<?php
// 56. 合并区间
// 给出一个区间的集合，请合并所有重叠的区间。

// 示例 1:

// 输入: [[1,3],[2,6],[8,10],[15,18]]
// 输出: [[1,6],[8,10],[15,18]]
// 解释: 区间 [1,3] 和 [2,6] 重叠, 将它们合并为 [1,6].
// 示例 2:

// 输入: [[1,4],[4,5]]
// 输出: [[1,5]]
// 解释: 区间 [1,4] 和 [4,5] 可被视为重叠区间。
class Solution {
    /**
     * @param Integer[][] $intervals
     * @return Integer[][]
     */
    function merge($intervals) {
        usort($intervals, function($a,$b){
            if ($a[0] > $b[0]) return 1;
        });
        $merge = [];
        foreach ($intervals as $interval) {
            if (empty($merge) || end($merge)[1] < $interval[0]) {
                array_push($merge, $interval);
            } else {
                $merge[count($merge)-1][1] = max($merge[count($merge)-1][1],$interval[1]);
            }
        }
        return $merge;
    }
}
$n = new Solution();
var_dump($n->merge([[1,4],[4,5]]));

echo  100000 >> 4;