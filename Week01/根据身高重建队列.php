<?php
// 406. 根据身高重建队列
// 假设有打乱顺序的一群人站成一个队列。 每个人由一个整数对(h, k)表示，其中h是这个人的身高，k是排在这个人前面且身高大于或等于h的人数。 编写一个算法来重建这个队列。

// 注意：
// 总人数少于1100人。

// 示例

// 输入:
// [[7,0], [4,4], [7,1], [5,0], [6,1], [5,2]]
// [[7,0], [7,1], [6,1], [5,0], [5,2], [4,4]]

// 输出:
// [[5,0], [7,0], [5,2], [6,1], [4,4], [7,1]]
class Solution {

    /**
     * @param Integer[][] $people
     * @return Integer[][]
     */
    function reconstructQueue($people) {
        usort($people, function($people1,$people2) {
            if ($people1[0] != $people2[0]) {
                return $people2[0]-$people1[0];
            } else {
                return $people1[1]-$people2[1];
            }
        });
        $len = count($people);
        foreach ($people as $v) {
            $idx = $v[1];
            array_splice($people, $idx, 0, [$v]);
        }
        $people = array_slice($people, 0,$len);

        return $people;
    }
}
$n = new Solution();
$people = [[7,0], [4,4], [7,1], [5,0], [6,1], [5,2]];
$n->reconstructQueue($people);
