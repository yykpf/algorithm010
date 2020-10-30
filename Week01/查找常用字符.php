<?php
// 1002. 查找常用字符
// 给定仅有小写字母组成的字符串数组 A，返回列表中的每个字符串中都显示的全部字符（包括重复字符）组成的列表。例如，如果一个字符在每个字符串中出现 3 次，但不是 4 次，则需要在最终答案中包含该字符 3 次。

// 你可以按任意顺序返回答案。

// 示例 1：

// 输入：["bella","label","roller"]
// 输出：["e","l","l"]
// 示例 2：

// 输入：["cool","lock","cook"]
// 输出：["c","o"]


// 提示：

// 1 <= A.length <= 100
// 1 <= A[i].length <= 100
// A[i][j] 是小写字母
class Solution {

    /**
     * @param String[] $A
     * @return String[]
     */
    function commonChars($A) {
        $minfreq = array_fill(0, 26, PHP_INT_MAX);
        foreach ($A as $word) {
            $freq = array_fill(0, 26, 0);
            $length = strlen($word);
            for ($i = 0; $i < $length; ++$i) {
                $ch = ord($word[$i]);
                ++$freq[$ch - 97];
            }
            for ($i = 0; $i < 26; ++$i) {
                $minfreq[$i] = min($minfreq[$i], $freq[$i]);
            }
        }

        $ans = [];
        for ($i = 0; $i < 26; ++$i) {
            for ($j = 0; $j < $minfreq[$i]; ++$j) {
                $ans[] = chr($i+97);
            }
        }
        return $ans;
    }
}
$n = new Solution();
var_dump($n->commonChars(["cool","loock","cook"]));