<?php
// 198. 打家劫舍
// 你是一个专业的小偷，计划偷窃沿街的房屋。每间房内都藏有一定的现金，影响你偷窃的唯一制约因素就是相邻的房屋装有相互连通的防盗系统，如果两间相邻的房屋在同一晚上被小偷闯入，系统会自动报警。

// 给定一个代表每个房屋存放金额的非负整数数组，计算你 不触动警报装置的情况下 ，一夜之内能够偷窃到的最高金额。



// 示例 1：

// 输入：[1,2,3,1]
// 输出：4
// 解释：偷窃 1 号房屋 (金额 = 1) ，然后偷窃 3 号房屋 (金额 = 3)。
//      偷窃到的最高金额 = 1 + 3 = 4 。
// 示例 2：

// 输入：[2,7,9,3,1]
// 输出：12
// 解释：偷窃 1 号房屋 (金额 = 2), 偷窃 3 号房屋 (金额 = 9)，接着偷窃 5 号房屋 (金额 = 1)。
//      偷窃到的最高金额 = 2 + 9 + 1 = 12 。


// 提示：

// 0 <= nums.length <= 100
// 0 <= nums[i] <= 400

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    // 动态规划
    // dp[i][0] 当前房子不偷
    // dp[i][1] 当前房子偷
    function rob($nums) {
        if (count($nums) == 0) return 0;
        $n = count($nums);
        $a = array_fill(0, $n, array_fill(0, 2, 0));

        $a[0][0] = 0; // 不偷
        $a[0][1] = $nums[0]; // 偷

        for ($i = 1;$i<$n;$i++) {
            $a[$i][0] = max($a[$i-1][0],$a[$i-1][0]);
            $a[$i][1] = $a[$i-1][0]+$nums[$i];
        }
        return max($a[$n-1][0],$a[$n-1][1]);
    }

    // a[i]:0..i天，且nums[i]必偷得到最大值
    // a[i] = max(a[i-1],a[i-2]+nums[i])
    function rob2($nums) {
        if (count($nums) == 0) return 0;
        if (count($nums) == 1) return $nums[1];
        $n = count($nums);
        $a = array_fill(0, $n, 0);

        $a[0] = $nums[0];
        $a[1] = max($nums[0],$nums[1]); // 偷
        $res = max($a[0],$a[1]);
        for ($i = 2;$i<$n;$i++) {
            $a[$i] = max($a[$i-1],$a[$i-2]+$nums[$i]);
            $res = max($res,$a[$i]);
        }
        return $res;
    }

    // 不需要开数组，只需要定义前一个和当前最大值
    function rob2($nums) {
        $curr = 0; // 前一个总金额 (k-1)
        $pre  = 0; // 当前元素前两个的总金额 (k-2)
        foreach ($nums as $key => $value) {
            $temp = max($curr,($value+$pre));
            $pre = $curr;
            $curr = $temp;
        }
        return $curr;
    }
}

