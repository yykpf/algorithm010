<?php

// 1122. 数组的相对排序
// 给你两个数组，arr1 和 arr2，

// arr2 中的元素各不相同
// arr2 中的每个元素都出现在 arr1 中
// 对 arr1 中的元素进行排序，使 arr1 中项的相对顺序和 arr2 中的相对顺序相同。未在 arr2 中出现过的元素需要按照升序放在 arr1 的末尾。



// 示例：

// 输入：arr1 = [2,3,1,3,2,4,6,7,9,2,19], arr2 = [2,1,4,3,9,6]
// 输出：[2,2,2,1,4,3,3,9,6,7,19]


// 提示：

// arr1.length, arr2.length <= 1000
// 0 <= arr1[i], arr2[i] <= 1000
// arr2 中的元素 arr2[i] 各不相同
// arr2 中的每个元素 arr2[i] 都出现在 arr1 中

// 计数排序
// class Solution {
//     /**
//      * @param Integer[] $arr1
//      * @param Integer[] $arr2
//      * @return Integer[]
//      */
//     function relativeSortArray($arr1, $arr2) {
//         $count = array_fill(0, 1001, 0);
//         for ($i=0; $i < count($arr1); $i++) {
//             isset($count[$arr1[$i]])?$count[$arr1[$i]]++:$count[$arr1[$i]]=1;
//         }
//         $k = 0;
//         // 排2中的数据
//         for ($i=0; $i < count($arr2); $i++) {
//             while ($count[$arr2[$i]] > 0) {
//                 $arr1[$k++] = $arr2[$i];
//                 $count[$arr2[$i]]--;
//             }
//         }
//         foreach ($count as $key => $value) {
//             while ($count[$key] > 0) {
//                 $arr1[$k++] = $key;
//                 $count[$key]--;
//             }
//         }
//         return $arr1;
//     }
// }

// hash + 快排
class Solution {
    /**
     * @param Integer[] $arr1
     * @param Integer[] $arr2
     * @return Integer[]
     */
    function relativeSortArray($arr1, $arr2) {
        sort($arr1);
        $new = [];
        foreach ($arr2 as $v) {
            while (true) {
                if (!in_array($v, $arr1)) break;
                $index = array_search($v, $arr1);
                unset($arr1[$index]);
                $new[] = $v;
            }
        }
        return array_merge($new, $arr1);
    }
}
$n = new Solution();
var_dump($n->relativeSortArray([28,6,22,8,44,17],[22,28,8,6]));
