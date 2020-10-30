<?php
// 三数之和
class Solution {
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function threeSumClosest($nums, $target) {
        sort($nums);
        $ans = $nums[0]+$nums[1]+$nums[2]; // 初始化一个数
        for ($i=0; $i < count($nums); $i++) {
            [$start,$end] = [$i+1,count($nums)-1]; //初始化两个指针
            while ($start < $end) {
                echo $nums[$start],$nums[$end],$nums[$i],PHP_EOL;
                $sum = $nums[$start]+$nums[$end]+$nums[$i];
                if (abs($target-$sum) < abs($target-$ans)) $ans = $sum; // 找到最接近的数，也就是相减比例最小的
                if ($sum > $target) {
                    $end--;
                }elseif ($sum < $target) {
                    $start++;
                }else{
                    return $ans;
                }
            }
        }
        return $ans;
    }
}
$n = new Solution();
var_dump($n->threeSumClosest([-3,-2,-5,3,-4],-1));