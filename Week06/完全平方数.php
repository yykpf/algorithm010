<?php

// 279. 完全平方数
// 给定正整数 n，找到若干个完全平方数（比如 1, 4, 9, 16, ...）使得它们的和等于 n。你需要让组成和的完全平方数的个数最少。

// 示例 1:

// 输入: n = 12
// 输出: 3
// 解释: 12 = 4 + 4 + 4.
// 示例 2:

// 输入: n = 13
// 输出: 2
// 解释: 13 = 4 + 9.
class Solution {

    // public function numSquares($n) {
    //     $maxNum = 1<<32;
    //     $dp = array_fill(0, $n+1, $maxNum);
    //     // bottom case
    //     $dp[0] = 0;

    //     // pre-calculate the square numbers.
    //     $max_square_index = floor(sqrt($n)) + 1;
    //     $square_nums = array_fill(0, $max_square_index, 0);
    //     for ($i = 1; $i < $max_square_index; ++$i) {
    //         $square_nums[$i] = $i * $i;
    //     }
    //     for ($i = 1; $i <= $n; ++$i) {
    //         for ($s = 1; $s < $max_square_index; ++$s) {
    //             if ($i < $square_nums[$s]) break;

    //             $dp[$i] = min($dp[$i], $dp[$i - $square_nums[$s]] + 1);
    //         }
    //     }

    //     return $dp[$n];
    // }

    // 转移方程 dp[$i] = min($dp[$i],$dp[$i-$j*$j]+1)
    // public function numSquares($n) {
    //     $dp = array_fill(0,$n+1,0);
    //     for ($i=1; $i <= $n; $i++) {
    //         $dp[$i] = $i; // 最坏情况 比如 dp[4] = 1+1+1+1
    //         for ($j=1; ($i - $j*$j) >= 0; $j++) { // 必须小于或等于一个数的平方
    //             $dp[$i] = min($dp[$i],$dp[$i-$j*$j]+1);
    //         }
    //     }

    //     return $dp[$n];
    // }

    // BFS
    // public function numSquares($n) {
    //     $neightbor = [];
    //     $queue = [0];
    //     for ($i = 1; $i*$i <= $n; $i++) {
    //         $neightbor[] = $i*$i;
    //     }
    //     $count = 0;
    //     while (count($queue)) {
    //         $nextSet = [];
    //         $count++;
    //         foreach ($queue as $v) {
    //             foreach ($neightbor as $c) {
    //                 $add = $v + $c;
    //                 if ($add === $n) return $count;
    //                 if ($add > $n) break;
    //                 $nextSet[$add] = $add;
    //             }
    //         }
    //         $queue = $nextSet;
    //     }
    //     return $count;
    // }
    public $sqLists = [];
    // 贪心
    public function numSquares($n)
    {
        for ($i = 1; $i*$i <= $n; $i++) {
            $this->sqLists[$i*$i] = $i*$i;
        }
        //根据定律，一个数都能表示成四个数的平方数之和
        //所以count值1,2,3,4这四种情况
        //状态有限用贪心，状态无限用动态规划
        //count最大就是4
        for ($count = 1; $count <= 4; $count++) {
            if ($this->isCanDivide($n, $count)) {
                return $count;
            }
        }
        return $count;
    }

    private function isCanDivide($number, $count) {
            if ($count == 1) {
                return isset($this->sqLists[$number])?true:false;
            }
            foreach ($this->sqLists as $s) {
                if ($this->isCanDivide($number - $s, $count - 1)) {
                    return true;
                }
            }
            return false;
    }

}
$n = new Solution();
echo $n->numSquares(7);