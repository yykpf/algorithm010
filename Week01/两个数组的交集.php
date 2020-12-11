<?php
// 349. 两个数组的交集
// 给定两个数组，编写一个函数来计算它们的交集。

// 示例 1：

// 输入：nums1 = [1,2,2,1], nums2 = [2,2]
// 输出：[2]
// 示例 2：

// 输入：nums1 = [4,9,5], nums2 = [9,4,9,8,4]
// 输出：[9,4]

// 说明：

// 输出结果中的每个元素一定是唯一的。
// 我们可以不考虑输出结果的顺序

class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    // function intersection($nums1, $nums2) {
    //     $map = [];
    //     for ($i=0; $i < count($nums1); $i++) {
    //         if (!isset($map[$nums1[$i]])) $map[$nums1[$i]] = $nums1[$i];
    //     }
    //     $intersect = [];
    //     for ($i=0; $i < count($nums2); $i++) {
    //         if (isset($map[$nums2[$i]]) && !isset($intersect[$nums2[$i]])) $intersect[$nums2[$i]] = $nums2[$i];
    //     }
    //     return $intersect;
    // }
    function intersection($nums1, $nums2) {
        sort($nums1);
        sort($nums2);
        $length1 = count($nums1);
        $length2 = count($nums2);

        $intersection = array_fill(0, $length1+$length2, 0);
        $index = $index1 = $index2 = 0;
        while ($index1 < $length1 && $index2 < $length2) {
            $num1 = $nums1[$index1];
            $num2 = $nums2[$index2];

            if ($num1 == $num2) {
                if ($index == 0 || $num1 != $intersection[$index-1]) {
                    $intersection[$index++] = $num1;
                }
                $index1++;
                $index2++;
            } elseif($num1 < $num2) {
                $index1++;
            } else {
                $index2++;
            }
        }
        return array_slice($intersection, 0,$index);
    }
}
$n = new Solution();
var_dump($n->intersection([4,9,5],[9,4,9,8,4]));


$a = [
    "type" => 0
];

echo $a["type"]??99;

