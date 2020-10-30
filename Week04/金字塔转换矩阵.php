<?php
// 756. 金字塔转换矩阵
// 现在，我们用一些方块来堆砌一个金字塔。 每个方块用仅包含一个字母的字符串表示。

// 使用三元组表示金字塔的堆砌规则如下：

// 对于三元组(A, B, C) ，“C”为顶层方块，方块“A”、“B”分别作为方块“C”下一层的的左、右子块。当且仅当(A, B, C)是被允许的三元组，我们才可以将其堆砌上。

// 初始时，给定金字塔的基层 bottom，用一个字符串表示。一个允许的三元组列表 allowed，每个三元组用一个长度为 3 的字符串表示。

// 如果可以由基层一直堆到塔尖就返回 true ，否则返回 false 。

// 示例 1：

// 输入：bottom = "BCD", allowed = ["BCG", "CDE", "GEA", "FFF"]
// 输出：true
// 解析：
// 可以堆砌成这样的金字塔:
//     A
//    / \
//   G   E
//  / \ / \
// B   C   D

// 因为符合('B', 'C', 'G'), ('C', 'D', 'E') 和 ('G', 'E', 'A') 三种规则。
// 示例 2：

// 输入：bottom = "AABA", allowed = ["AAA", "AAB", "ABA", "ABB", "BAC"]
// 输出：false
// 解析：
// 无法一直堆到塔尖。
// 注意, 允许存在像 (A, B, C) 和 (A, B, D) 这样的三元组，其中 C != D。

// 提示：

// bottom 的长度范围在 [2, 8]。
// allowed 的长度范围在[0, 200]。
// 方块的标记字母范围为{'A', 'B', 'C', 'D', 'E', 'F', 'G'}

class Solution {
    private $T = []; // 左右子节点对应的所有父节点
    private $seen = []; // 已经使用的

    public function pyramidTransition($bottom, $allowed) {
        $this->T = array_fill(0, 7, array_fill(0, 7, 0));
        foreach ($allowed as $a) {
          $this->T[ord($a[0]) - ord('A')][ord($a[1]) - ord('A')] |= 1 << (ord($a[2]) - ord('A'));
        }

        $N = strlen($bottom);
        $A = array_fill(0, $N, array_fill(0, $N, 0)); // 层级
        $t = 0;
        for ($i=0; $i < $N; $i++) {
            $A[$N-1][$t++] = ord($bottom[$i]) - ord('A'); // 最下层
        }
        return $this->solve($A, 0, $N-1, 0);
    }

    //A[i]——金字塔的第i排
    //R-表示金字塔当前行的整数
    //N-当前计算的那一层
    //i-当前层的那个节点
    //返回真if金字塔可以被建立
    public function solve($A, $R, $N, $i) {
        if ($N == 1 && $i == 1) { // If successfully placed entire pyramid
            return true;
        } else if ($i == $N) {
            if (in_array($R,$this->seen)) return false; // If we've already tried this row, give up
            $this->seen[] = $R; // Add row to cache
            return $this->solve($A, 0, $N-1, 0); // Calculate next row
        } else {
            // w's jth bit is true iff block #j could be
            // a parent of A[N][i] and A[N][i+1]
            $w = $this->T[$A[$N][$i]][$A[$N][$i+1]]; // 第N层的父级
            // for each set bit in w...
            for ($b = 0; $b < 7; ++$b) { // ABCDEFG 减去 A 之后的值
                if ((($w >> $b) & 1) != 0) {
                    $A[$N-1][$i] = $b; //set parent to be equal to block #b
                    //If rest of pyramid can be built, return true
                    //R represents current row, now with ith bit set to b+1
                    // in base 8.

                    if ($this->solve($A, $R * 8 + ($b+1), $N, $i+1)) return true;
                }
            }
            return false;
        }
    }
}

$n = new Solution();
$bottom = "BCD";
$allowed = ["BCG", "CDE", "GEA", "FFF"];
echo $n->pyramidTransition($bottom,$allowed),PHP_EOL;

echo decbin(16);